<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\BudgetHead, App\RequisitionItem, App\PurchaseIndent, App\PurchaseIndentItem, App\Vendor, App\QuotationValue;
class PurchaseIndentsController extends Controller
{
    public function __construct() {
        $this->_department_user = Auth::guard('department_user')->user();
    }

    public function create($requisition_id = null) {
        //if($this->_department_user->can(['create_purchase_indent'])) {
        	$requisition_id = Crypt::decrypt($requisition_id);
        	$requisition_items = RequisitionItem::with(['measurement_unit', 'item_measurement'])->where('requisition_id', $requisition_id)->where('quantity_issued', 0)->where('issued_by', NULL)->where('issued_date', NULL)->get();

            $budget_heads  	= BudgetHead::whereStatus(1)->orderBy('name', 'DESC')->lists('budget_head_code', 'id')->toArray();

            return view('department_user.purchase_indents.create', compact('budget_heads', 'requisition_items', 'requisition_id'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // }
    }

    public function store(Request $request) {
        //if($this->_department_user->can(['create_requisition'])) {
            $message = '';
            DB::beginTransaction();
            /* Insert data to requisitions table */
            try {
                // Validate, then create if valid
                $data = $request->all();
                $data['created_on']     = date('Y-m-d');
                $data['created_by']     = Auth::guard('department_user')->user()->id;
                $data['purchase_indent_date'] = date('Y-m-d', strtotime($request->purchase_indent_date));
                $data['reference_date']       = date('Y-m-d', strtotime($request->reference_date));

                $validator = Validator::make($data, PurchaseIndent::$rules);
                if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
                //Redirect::back()->withErrors($validator)->withInput();

                $purchase_indent = PurchaseIndent::create( $data );
            }catch(ValidationException $e)
            {
                return Redirect::back();
            }
            try {
                //loop through the items entered
                for($i = 0; $i < count($request->requisition_item_ids); $i++) {
                    $item_data['purchase_indent_id']   = $purchase_indent->id;
                    $item_data['requisition_item_id']  = $request->requisition_item_ids[$i];

                    $validator = Validator::make($item_data, PurchaseIndentItem::$rules);
                    if ($validator->fails()) return Redirect::back(); //Redirect::back()->withErrors( $validator )->withInput();
                    $requisition_item = PurchaseIndentItem::create( $item_data );
                }
                // Validate, then create if valid
            } catch(ValidationException $e)
            {
                // Back to form
                return Redirect::back();
            }
            // Commit the queries!
            DB::commit();
            $message .= 'Indent successfully generated !';
            return Redirect::route('purchase_indent.details', Crypt::encrypt($purchase_indent->id))->with('message', $message);
        //}
    }

    public function index() {
        $results = PurchaseIndent::with(['creator', 'requisition', 'budget_head', 'checker', 'approved_by', 'requisition.department'])->paginate(20);

        return view('department_user.purchase_indents.index', compact('results'));
    }

    public function details($id = null) {
        $id = Crypt::decrypt($id);
        $info = PurchaseIndent::with(['creator', 'requisition', 'budget_head', 'checker', 'approved_by', 'requisition.department', 'requisition.chargeable_account', 'requisition.department_user'])->whereId($id)->first();

        $purchase_indent_items = PurchaseIndentItem::where('purchase_indent_id', $id)->with('purchase_indent', 'requisition_item')->get();
        $add_quotation_values = false;
        if($info->approval_hod_id != NULL && $info->approval_hod_date) {
          $add_quotation_values = true;
        }
        return view('department_user.purchase_indents.details', compact('info', 'purchase_indent_items', 'add_quotation_values'));
    }

    public function check($id = null) {
        $id   = Crypt::decrypt($id);
        $info = PurchaseIndent::findOrFail($id);

        $info->checked_by = Auth::guard('department_user')->user()->id;
        $info->checked_on = date('Y-m-d');

        $info->save();
        $message = '';
        $message .= 'Indent is checked by user '.Auth::guard('department_user')->user()->username;
            return Redirect::route('purchase_indent.details', Crypt::encrypt($info->id))->with('message', $message);
    }

    public function approve($id = null) {
        $id = Crypt::decrypt($id);
        $info = PurchaseIndent::findOrFail($id);

        $info->approval_hod_id      = Auth::guard('department_user')->user()->id;
        $info->approval_hod_date    = date('Y-m-d');

        $info->save();
        $message = '';
        $message .= 'Indent is verified by HOD with username '.Auth::guard('department_user')->user()->username;
            return Redirect::route('purchase_indent.details', Crypt::encrypt($info->id))->with('message', $message);
    }

    //add qoutation values
    public function add_qoutation_value( $id = NULL ) {
        $id   = Crypt::decrypt($id);
        $info = PurchaseIndentItem::whereId($id)->with('requisition_item', 'requisition_item.item_measurement')->first();

        $vendors  	= Vendor::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        return view('department_user.purchase_indents.qoutation.add_qoutation_value', compact('info', 'id', 'vendors'));
    }
    //store qoutation values
    public function store_qoutation_value(Request $request) {
      $message = '';
      $class   = '';

      if( count($request->vendor_id) == count($request->value)) {
        for($i = 0; $i < count($request->vendor_id); $i++) {
            $item_data['purchase_indent_item_id']     = $request->purchase_indent_item_id;
            $item_data['vendor_id']                   = $request->vendor_id[$i];
            $item_data['value']                       = $request->value[$i];
            $validator = Validator::make($item_data, QuotationValue::$rules);
            if ($validator->fails()) return Redirect::back();
            $requisition_item = QuotationValue::create( $item_data );
        }
        $class   .= 'alert-success';
        $message .= '<b>'. count($request->vendor_id).'</b> Vendor values added !';
      }else{
        $class   = 'alert-danger';
        $message .= 'Token mismatch !';
      }
      return Redirect::route('quotation_values.create', Crypt::encrypt( $request->purchase_indent_item_id ))->with(['message' => $message, 'alert-class' => $class]);
    }

    public function view_qoutation_valus( $purchase_indent_item_id = NULL ) {

    }
}
