<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Section, App\Department;

use DB, Validator, Redirect, Auth, Crypt;

class SectionsController extends Controller
{
    public function index() {
    	$results = Section::whereStatus(1)->with('creator', 'department')->orderBy('name', 'DESC')->paginate(20);
		return view('admin.sections.index', compact('results'));
    }

    public function create() {
    	$departments	= [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$results = Section::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.sections.create', compact('results', 'departments'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Section::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	if(Section::create($data)) {
            $message .= 'Section added successfully !';
        }else{
            $message .= 'Unable to add section !';
        }

        return Redirect::route('section.index')->with('message', $message);
    }

    public function edit( $id ) {
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $id = Crypt::decrypt($id);
        $section = Section::findOrFail($id);
        return view('admin.sections.edit', compact('section', 'departments'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Section::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;
        $rules['section_code']      = $rules['section_code'] . ',id,' . $id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $section = Section::findOrFail($id);

        $message = '';

        $section->fill($data);
        if($section->save()) {
            $message .= 'Section edited successfully !';
        }else{
            $message .= 'Unable to edit  Section !';
        }

        return Redirect::route('section.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $section = Section::findOrFail($id);
        $message = '';
        //change the status of section to 0
        $section->status = 0;
        if($section->save()) {
            $message .= 'Section removed successfully !';
        }else{
            $message .= 'Unable to remove  Section !';
        }

        return Redirect::route('section.index')->with('message', $message);
    }

}
