<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\MeasurementUnit;

class MeasurementUnitsController extends Controller
{

    public function index() {
		$results = MeasurementUnit::whereStatus(1)->with('creator')->orderBy('name', 'DESC')->paginate(20);
		return view('admin.measurement_units.index', compact('results'));
	}

    public function create() {
    	$results = MeasurementUnit::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.measurement_units.create', compact('results'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), MeasurementUnit::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	if(MeasurementUnit::create($data)) {
            $message .= 'Unit added successfully !';
        }else{
            $message .= 'Unable to add unit !';
        }

        return Redirect::route('measurement_unit.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id = Crypt::decrypt($id);
    	$measurement_unit = MeasurementUnit::findOrFail($id);
    	return view('admin.measurement_units.edit', compact('measurement_unit'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = MeasurementUnit::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;
        $rules['measurement_code']  = $rules['measurement_code'] . ',id,' . $id;

    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $measurement_unit = MeasurementUnit::findOrFail($id);

        $message = '';

        $measurement_unit->fill($data);
        if($measurement_unit->save()) {
            $message .= 'Unit edited successfully !';
        }else{
            $message .= 'Unable to edit  unit !';
        }

        return Redirect::route('measurement_unit.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $measurement_unit = MeasurementUnit::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $measurement_unit->status = 0;
        if($measurement_unit->save()) {
            $message .= 'Unit removed successfully !';
        }else{
            $message .= 'Unable to remove  unit !';
        }

        return Redirect::route('measurement_unit.index')->with('message', $message);
    }


}
