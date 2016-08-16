<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Department;

class DepartmentsController extends Controller
{
	public function index() {
		$results = Department::whereStatus(1)->with('creator')->orderBy('name', 'DESC')->paginate(20);
		return view('admin.departments.index', compact('results'));
	}

    public function create() {
    	$results = Department::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.departments.create', compact('results'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Department::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	if($renter = Department::create($data)) {
            $message .= 'Department added successfully !';
        }else{
            $message .= 'Unable to add department !';
        }

        return Redirect::route('department.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id = Crypt::decrypt($id);
    	$department = Department::findOrFail($id);
    	return view('admin.departments.edit', compact('department'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Department::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;
        $rules['department_code']   = $rules['department_code'] . ',id,' . $id;

    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $department = Department::findOrFail($id);

        $message = '';

        $department->fill($data);
        if($department->save()) {
            $message .= 'Department edited successfully !';
        }else{
            $message .= 'Unable to edit  Department !';
        }

        return Redirect::route('department.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $department = Department::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $department->status = 0;
        if($department->save()) {
            $message .= 'Department removed successfully !';
        }else{
            $message .= 'Unable to remove  Department !';
        }

        return Redirect::route('department.index')->with('message', $message);
    }
}
