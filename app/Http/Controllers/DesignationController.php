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
            $message .= 'Unable to add designation !';
        }

        return Redirect::route('designation.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id = Crypt::decrypt($id);
    	$designation = Designation::findOrFail($id);
        
    	return view('admin.designation.edit', compact('designation'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Designation::$rules;
        $rules['name']	= $rules['name'] . ',id,' . $id;
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $designation = Designation::findOrFail($id);
        $message = '';
        $designation->fill($data);
        if($designation->save()) {
            $message .= 'Designation updated successfully !';
        }else{
            $message .= 'Unable to update designation !';
        }

        return Redirect::route('designation.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $designation = Designation::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $designation->status = 0;
        if($designation->save()) {
            $message .= 'Designation removed successfully !';
        }else{
            $message .= 'Unable to remove successfully !';
        }

        return Redirect::route('designation.index')->with('message', $message);
    }
}
