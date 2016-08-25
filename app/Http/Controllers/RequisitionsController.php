<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;
use App\Requisition, App\RequisitionItem, App\ChargeableAccount, App\ItemMeasurement, App\MeasurementUnit;

class RequisitionsController extends Controller
{
    public function create() {
    	$chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	$item_measurements    = [''=> 'Select Item'] + ItemMeasurement::whereStatus(1)->orderBy('item_name', 'DESC')->lists('item_name', 'id')->toArray();

    	$units    = ['' => 'Select Unit'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	return view('department_user.requisitions.create', compact('chargeable_accounts', 'item_measurements', 'units'));
    }

    public function store(Request $request) {  
    	$message = '';
    	DB::beginTransaction();
    	/* Insert data to requisitions table */
    	try {
		    // Validate, then create if valid
		    $validator = Validator::make($data = $request->all(), Requisition::$rules);
        	if ($validator->fails()) return 'error !'; //Redirect::back()->withErrors($validator)->withInput();
        	$data['department_id'] 	= Auth::guard('department_user')->user()->department_id;
        	$data['issue_date'] 	= date('Y-m-d'); 
        	$data['raised_by'] 		= Auth::guard('department_user')->user()->id;
		    $requisition = Requisition::create( $data );
		}catch(ValidationException $e)
		{
		    return Redirect::back()->withErrors($e->getErrors())->withInput();
		}
		try {
			//loop through the items entered
			for($i = 0; $i < count($request->store_description); $i++) {
	    		$item_data['item_measurement_id'] 	= $request->item_measurement_id[$i];
	    		$item_data['store_description'] 	= $request->store_description[$i];
	    		$item_data['measurement_unit_id'] 	= $request->measurement_unit_id[$i];
	    		$item_data['quantity_demanded'] 	= $request->quantity_demanded[$i];
	    		$item_data['rate'] 					= $request->rate[$i];

	    		$validator = Validator::make($item_data, RequisitionItem::$rules);
	        	if ($validator->fails()) return 'Error !'; //Redirect::back()->withErrors( $validator )->withInput();
	        	$item_data['requisition_id'] 	= $requisition->id;
			    $requisition_item = RequisitionItem::create( $item_data );
	    	}
		    // Validate, then create if valid
		} catch(ValidationException $e)
		{
		    // Back to form with errors
		    return Redirect::back()->withErrors($e->getErrors())->withInput();
		}
		// Commit the queries!
		DB::commit();

		return 'Success !';
    }
}
