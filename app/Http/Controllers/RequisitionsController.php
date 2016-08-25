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
    	
    	$item_data = '';
    	for($i = 0; $i < count($request->item_measurement_id); $i++) {
    		echo $request->item_measurement_id[$i];
    	}
    dd($item_data);
        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	Auth::guard('accounts_user')->user()->id;

    	DB::beginTransaction();
    	/* Insert data to requisitions table */
    	try {
		    // Validate, then create if valid
		    $validator = Validator::make($data = $request->all(), Requisition::$rules);
        	if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

		    $requisition = Requisition::create( $data );
		} catch(ValidationException $e)
		{
		    return Redirect::back()->withErrors($e->getErrors())->withInput();
		}

		try {

			//loop through the items entered
			for($i = 0; $i < count($request->item_measurement_id); $i++) {
				$item_data = '';
				$validator = Validator::make($item_data = $request->all(), Requisition::$rules);
	        	if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

			    $requisition_items = User::create([
			        'username' => Input::get('username'),
			        'account_id' => $requisition->id
			    ]);	
			}
		    // Validate, then create if valid
		} catch(ValidationException $e)
		{
		    // Back to form with errors
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		}
		// Commit the queries!
		DB::commit();
    }
}
