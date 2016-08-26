<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\Designation;

class DesignationController extends Controller
{
       public function index() {
		$results = Designation::whereStatus(1)->orderBy('name', 'DESC')->paginate(20);
		return view('admin.designation.index', compact('results'));
	}

    public function create() {
    	$results = Designation::whereStatus(1)->orderBy('name', 'DESC')->paginate(20);
        
    	return view('admin.designation.create', compact('results'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Designation::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
       	$message = '';
    	if(Designation::create($data)) {
            $message .= 'Designation added successfully !';
        }else{
            $message .= 'Unable to add Designation !';
        }

        return Redirect::route('designation.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id = Crypt::decrypt($id);
    	$rack = Rack::findOrFail($id);
        $locations    = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'ASC')->lists('name', 'id')->toArray();
    	return view('admin.racks.edit', compact('rack', 'locations'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Rack::$rules;

        $rules['name']	= $rules['name'] . ',id,' . $id;
        
    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $rack = Rack::findOrFail($id);

        $message = '';

        $rack->fill($data);
        if($rack->save()) {
            $message .= 'Rack edited successfully !';
        }else{
            $message .= 'Unable to edit  rack !';
        }

        return Redirect::route('rack.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $designation = Designation::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $rack->status = 0;
        if($rack->save()) {
            $message .= 'rack removed successfully !';
        }else{
            $message .= 'Unable to remove  rack !';
        }

        return Redirect::route('rack.index')->with('message', $message);
    }
}
