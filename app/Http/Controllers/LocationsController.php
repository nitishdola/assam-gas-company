<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Location;

class LocationsController extends Controller
{
    public function index() {
		$results = Location::whereStatus(1)->orderBy('name', 'DESC')->paginate(20);
		return view('admin.locations.index', compact('results'));
	}

    public function create() {
    	$results = Location::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.locations.create', compact('results'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Location::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	if(Location::create($data)) {
            $message .= 'Location added successfully !';
        }else{
            $message .= 'Unable to add Location !';
        }

        return Redirect::route('location.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id       = Crypt::decrypt($id);
    	$location = Location::findOrFail($id);
    	return view('admin.locations.edit', compact('location'));
    }

    public function update( $id, Request $request) { 
        $id    = Crypt::decrypt($id); 
        $rules = Location::$rules;

        $rules['name']	= $rules['name'] . ',id,' . $id;
        
    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $location = Location::findOrFail($id);

        $message = '';

        $location->fill($data);
        if($location->save()) {
            $message .= 'Location edited successfully !';
        }else{
            $message .= 'Unable to edit  location !';
        }

        return Redirect::route('location.index')->with('message', $message);
    }

    public function disable($id ) {
        $id       = Crypt::decrypt($id); 
        $location = Location::findOrFail($id);
        $message  = '';
        //change the status of department to 0
        $location->status = 0;
        if($location->save()) {
            $message .= 'location removed successfully !';
        }else{
            $message .= 'Unable to remove  location !';
        }

        return Redirect::route('location.index')->with('message', $message);
    }
}
