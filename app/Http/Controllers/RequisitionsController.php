<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;
use App\Requisition, App\RequisitionItem, App\ChargeableAccount, App\ItemMeasurement, App\MeasurementUnit, App\Department,App\DepartmentUser,App\PurchaseIndent;

class RequisitionsController extends Controller
{
    public function __construct() {
        $this->_department_user = Auth::guard('department_user')->user();
    }

    public function create() {
        //if($this->_department_user->can(['create_requisition'])) {
            $chargeable_accounts  = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            $item_measurements  = [''=> 'Select Item'] + ItemMeasurement::whereStatus(1)->orderBy('item_name', 'DESC')->lists('item_name', 'id')->toArray();

            $units  = ['' => 'Select Unit'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            //requisition number generate
            $requisition_number = $this->generate_requisition_number();
            $requisition_number = 'REQ_'.$requisition_number;

            $financial_year = $this->calculateFiscalYear();
            return view('department_user.requisitions.create', compact('chargeable_accounts', 'item_measurements', 'units', 'requisition_number', 'financial_year'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // }
    }


    function calculateFiscalYear($inputDate = NULL){
      if($inputDate == NULL) {
        $inputDate = date('Y-m-d');
      }
      $financial_year_date = date('31-3-'.date('Y', strtotime($inputDate)));

      if(strtotime($financial_year_date) >= strtotime($inputDate)) {
        return (date('Y',strtotime($financial_year_date))-1).'-'.date('y',strtotime($financial_year_date));
      }else{
        return date('Y',strtotime($financial_year_date)).'-'.(date('y',strtotime($financial_year_date))+1);
      }
    }


    public function store(Request $request) {
        //if($this->_department_user->can(['create_requisition'])) {
            $message = '';
            DB::beginTransaction();
            /* Insert data to requisitions table */
            try {
                // Validate, then create if valid
                $validator = Validator::make($data = $request->all(), Requisition::$rules);
                if ($validator->fails()) return Redirect::back(); //Redirect::back()->withErrors($validator)->withInput();
                $data['department_id']  = Auth::guard('department_user')->user()->department_id;
                $data['raised_by']      = Auth::guard('department_user')->user()->id;

                $requisition = Requisition::create( $data );
            }catch(ValidationException $e)
            {
                return Redirect::back();
            }
            try {
                //loop through the items entered
                for($i = 0; $i < count($request->store_description); $i++) {
                    $item_data['item_measurement_id']   = $request->item_measurement_id[$i];
                    $item_data['store_description']     = $request->store_description[$i];
                    $item_data['measurement_unit_id']   = $request->measurement_unit_id[$i];
                    $item_data['quantity_demanded']     = $request->quantity_demanded[$i];
                    $item_data['rate']                  = $request->rate[$i];

                    $validator = Validator::make($item_data, RequisitionItem::$rules);
                    if ($validator->fails()) return Redirect::back(); //Redirect::back()->withErrors( $validator )->withInput();
                    $item_data['requisition_id']    = $requisition->id;
                    $requisition_item = RequisitionItem::create( $item_data );
                }
                // Validate, then create if valid
            } catch(ValidationException $e)
            {
                // Back to form
                return Redirect::back();
            }
            // Commit the queries!
            DB::commit();
            $message .= 'Requisition successfully generated !';
            return Redirect::route('requisition.create')->with('message', $message);
        //}
    }

    private function generate_requisition_number() {
      //latest requisition number
      $requisition = Requisition::select('id')->orderBy('id', 'DESC')->first();
      if($requisition) {
        return $requisition->id+1;
      }
      return 1;
    }


    public function index(Request $request) {
        //if($this->_department_user->can(['view_requisitions'])) {
            $username = Auth::guard('department_user')->user()->username;
            $user     = DepartmentUser::where('username', $username)->first();
            $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
            $chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            $where = [];
            if($request->department_id) {
                $where['department_id'] = $request->department_id;
            }
            if($request->chargeable_account_id) {
                $where['chargeable_account_id'] = $request->chargeable_account_id;
            }
             if($request->requisition_number) {
                $where['requisition_number'] = $request->requisition_number;
            }
             if($request->Approval) {
                $where['hod'] = $request->Approval;
            }
            $where['status'] = 1;

            $results = Requisition::where($where)->with(['department', 'chargeable_account'])->orderBy('created_at', 'DESC')->paginate(20);

            return view('department_user.requisitions.index', compact('departments','chargeable_accounts', 'results','user'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        //  //$this->isViewAuthorized();

        //     $username = Auth::guard('department_user')->user()->username;
        //     $user     = DepartmentUser::where('username', $username)->first();
        //     $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        //     $chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        //     $where = [];
        //     if($request->department_id) {
        //         $where['department_id'] = $request->department_id;
        //     }
        //     if($request->chargeable_account_id) {
        //         $where['chargeable_account_id'] = $request->chargeable_account_id;
        //     }
        //      if($request->requisition_number) {
        //         $where['requisition_number'] = $request->requisition_number;
        //     }
        //      if($request->Approval) {
        //         $where['hod'] = $request->Approval;
        //     }
        // }
    }

   //requisition approve process by hod of the departments
    public function view_all_requisitions(Request $request) {
        //if($this->_department_user->can(['requisition_check_user'])) {
            $username = Auth::guard('department_user')->user()->username;
            $user     = DepartmentUser::where('username', $username)->first();
            $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
            $chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            $where = [];

            $where['hod']    = NULL;
            $where['status'] = 1;

            $results = Requisition::where($where)->with(['department_user', 'department', 'chargeable_account'])->orderBy('created_at', 'DESC')->paginate(20);

            return view('department_user.requisitions.approve_requisitions', compact('departments','chargeable_accounts', 'results','user'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // }
    }

    public function approveRequisition($id)
    {
        //if($this->_department_user->can(['requisition_check_user'])) {
            $id                 = Crypt::decrypt($id);
            $requisitions       = Requisition::findOrFail($id);
            $requisitions->hod  = Auth::guard('department_user')->user()->id;
            $requisitions->hod_approve_date  = date('Y-m-d H:i:s');
           if($requisitions->save()){
            $requisition_number = $requisitions->requisition_number;
                return view('department_user.requisitions.success', compact('requisition_number'));
                //return redirect()->route('requisition.approve.success')->with(['requisition_number', $requisitions->requisition_]);
            }else{
                return redirect()->back()->with('message', 'Unable to process your request. Please try again or contact TechSupport.');
            }
        //}
    }
    public function view_approved(Request $request) {
        $username = Auth::guard('department_user')->user()->username;
        $user     = DepartmentUser::where('username', $username)->first();
        $departments            = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $where = [];
        $where['status'] = 1;
        $results = Requisition::where($where)->where('hod', '!=', NULL)->where('receive_date', NULL)->with(['department_user', 'department', 'chargeable_account'])->orderBy('created_at', 'DESC')->paginate(20);

        foreach($results as $k => $v) {
            $check_if_indent_prepared = PurchaseIndent::where('requisition_id', $v->id)->count();
            if($check_if_indent_prepared) unset($results[$k]);
        }

        return view('department_user.requisitions.view_approved', compact('departments','chargeable_accounts', 'results','user'));
    }


    public function edit( $id ) {
        $username = Auth::guard('department_user')->user()->username;
        $user     = DepartmentUser::where('username', $username)->first();
        $id                 = Crypt::decrypt($id);
        $requisitions       = Requisition::findOrFail($id);
        $requisition_id     = $requisitions->id;
        $requisition_items  = RequisitionItem::where('requisition_id', $requisition_id)->get();
        $chargeable_accounts  = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        $item_measurements    = [''=> 'Select Item'] + ItemMeasurement::whereStatus(1)->orderBy('item_name', 'DESC')->lists('item_name', 'id')->toArray();

        $units    = ['' => 'Select Unit'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        return view('department_user.requisitions.edit', compact('units', 'item_measurements', 'chargeable_accounts', 'requisitions','requisition_items','user'));
    }



    public function update($id , Request $request) {
        $id    = Crypt::decrypt($id);
        $rules = Requisition::$rules;
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $requisition    = Requisition::findOrFail($id);
        $requisition_id = $requisition->id;

       $message = '';
        DB::beginTransaction();
        /* Insert data to requisitions table */
        try {

            $data['department_id']  = Auth::guard('department_user')->user()->department_id;
            $data['issue_date']     = date('Y-m-d');
            $data['raised_by']      = Auth::guard('department_user')->user()->id;
            $requisition->fill($data);

            $requisition = $requisition->save();
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }

        try{

            for($i = 0; $i < count($request->store_description); $i++) {

                $item_details = RequisitionItem::where('id', $data['id'][$i])->where('requisition_id',
                    $requisition_id)->first();
                $item_details->item_measurement_id = $request->item_measurement_id[$i];
                $item_details->store_description   = $request->store_description[$i];
                $item_details->measurement_unit_id = $request->measurement_unit_id[$i];
                $item_details->quantity_demanded   = $request->quantity_demanded[$i];
                $item_details->rate                = $request->rate[$i];
                $item_details->save();
            }
        }
        catch(ValidationException $e)
        {
            return Redirect::back();
        }

       // Commit the queries!
        DB::commit();
        $message .= 'Requisition successfully updated !';
        return Redirect::route('requisition.index')->with('message', $message);
    }


    public function disable($id ) {
        $id           = Crypt::decrypt($id);
        $requisitions = Requisition::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $requisitions->status = 0;
        if($requisitions->save()) {
            $message .= 'Requisition removed successfully !';
        }else{
            $message .= 'Unable to remove Requisition !';
        }

        return Redirect::route('requisition.index')->with('message', $message);
    }


    public function view( $id ) {
        $username = Auth::guard('department_user')->user()->username;
        $user     = DepartmentUser::where('username', $username)->first();
        $id       = Crypt::decrypt($id);
        $info     = Requisition::where('id', $id)->with('department', 'chargeable_account')->first();
        $requisition_items  = RequisitionItem::where('requisition_id', $id)->with(['item_measurement', 'item_measurement.measurement_unit'])->get();// dump($requisition_items);
        return view('department_user.requisitions.view',compact('info','requisition_items','user'));
    }

    public function receiveRequisition( $id ) {
        //if($this->_department_user->can(['receive_requisition'])) {
            $id       = Crypt::decrypt($id);
            $info     = Requisition::where('id', $id)->with('department', 'chargeable_account')->first();
            $requisition_items  = RequisitionItem::where('requisition_id', $id)->where('quantity_issued', 0)->where('issued_by', NULL)->where('issued_date', NULL)->with(['measurement_unit', 'item_measurement'])->where('status',1)->get();
                return view('department_user.requisitions.receive',compact('info','requisition_items','user'));
            return Redirect::route('requisition.view_approved')->with('message', $message);
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // }
    }

    public function requisition_issue_view( $requisition_id = NULL, $requisition_item_id = NULL) {
        $requisition_id = Crypt::decrypt($requisition_id);
        $requisition_item_id = Crypt::decrypt($requisition_item_id);

        $requisition_item = RequisitionItem::findOrFail($requisition_item_id );
        $item_measurement_id = $requisition_item->item_measurement_id;

        $requisition    = Requisition::findOrFail($requisition_id);
        $item           = ItemMeasurement::where(['id' => $item_measurement_id])->with(['item_group', 'item_sub_group', 'measurement_unit', 'location', 'rack'])->first();
        return view('department_user.requisitions.requisition_issue_view',compact('item', 'requisition', 'requisition_item'));
    }

    public function requisition_issue(Request $request) {
        $requisition_item_id = $request->requisition_item_id;
        $requisition_item = RequisitionItem::findOrFail($requisition_item_id );

        $requisition_item->quantity_issued  = $request->quantity_issued;
        $requisition_item->remarks          = $request->remarks;
        $requisition_item->issued_by        = Auth::guard('department_user')->user()->id;
        $requisition_item->issued_date      = date('Y-m-d');

        if($requisition_item->save()) {
            $message = '';
            $message .= 'Successfully Issued !';
            return Redirect::route('requisition.view_approved')->with(['message' => $message, 'alert-class' => 'alert-success']);
        }else{
            $message = '';
            $message .= 'Issue was not successfull !';
            return Redirect::route('requisition.view_approved')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        }
    }
}
