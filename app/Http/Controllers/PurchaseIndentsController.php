<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\BudgetHead, App\RequisitionItem;
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

            return view('department_user.purchase_indents.create', compact('budget_heads', 'requisition_items'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // } 
    }

    public function store(Request $request) { dd($request);
        //if($this->_department_user->can(['create_requisition'])) {  
            $message = '';
            DB::beginTransaction();
            /* Insert data to requisitions table */
            try {
                // Validate, then create if valid
                $validator = Validator::make($data = $request->all(), PurchaseIndent::$rules);
                if ($validator->fails()) return Redirect::back(); 
                //Redirect::back()->withErrors($validator)->withInput();
                $data['created_on']     = date('Y-m-d');
                $data['created_by']     = Auth::guard('department_user')->user()->id;

                $data['purchase_indent_date'] = date('Y-m-d', strtotime($request->purchase_indent_date));
                $data['reference_date']       = date('Y-m-d', strtotime($request->reference_date));

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
}
