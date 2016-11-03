<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\ItemGroup;

class ItemGroupsController extends Controller
{
    public function index() {
		$results = ItemGroup::whereStatus(1)->with('creator')->orderBy('name', 'DESC')->paginate(20);
		return view('admin.item_groups.index', compact('results'));
	}

	public function create() {
    	$results = ItemGroup::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.item_groups.create', compact('results'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), ItemGroup::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message = '';
    	if(ItemGroup::create($data)) {
            $message .= 'Item Group Added Successfully !';
        }else{
            $message .= 'Unable to Add Item Group !';
        }

        return Redirect::route('item_group.index')->with('message', $message);
    }

    public function edit( $id ) {
    	$id         = Crypt::decrypt($id);
    	$item_group = ItemGroup::findOrFail($id);
    	return view('admin.item_groups.edit', compact('item_group'));
    }

    public function update( $id, Request $request) { 
        $id 	= Crypt::decrypt($id); 
        $rules 	= ItemGroup::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;
        $rules['item_group_code']   = $rules['item_group_code'] . ',id,' . $id;

    	$validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $item_group = ItemGroup::findOrFail($id);

        $message = '';

        $item_group->fill($data);
        if($item_group->save()) {
            $message .= 'Item Group Updated successfully !';
        }else{
            $message .= 'Unable to update Item Group !';
        }
        return Redirect::route('item_group.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $item_group = ItemGroup::findOrFail($id);
        $message = '';
        //change the status of item group to 0
        $item_group->status = 0;
        if($item_group->save()) {
            $message .= 'Item Group removed Successfully !';
        }else{
            $message .= 'Unable to remove  Item Group !';
        }

        return Redirect::route('item_group.index')->with('message', $message);
    }

}
