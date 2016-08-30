<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ItemGroup, App\ItemSubGroup;

use DB, Validator, Redirect, Auth, Crypt;

class ItemSubGroupsController extends Controller
{
    public function index() {
    	$results = ItemSubGroup::whereStatus(1)->with('creator', 'item_group')->orderBy('name', 'DESC')->paginate(20);
		return view('admin.item_sub_groups.index', compact('results'));
    }

    public function create() {
    	$item_groups	= [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$results = ItemSubGroup::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('admin.item_sub_groups.create', compact('results', 'item_groups'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), ItemSubGroup::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id;  
    	$message   = '';
    	if(ItemSubGroup::create($data)) {
            $message .= 'Item Sub Group added successfully !';
        }else{
            $message .= 'Unable to add Item Sub Group !';
        }

        return Redirect::route('item_sub_group.index')->with('message', $message);
    }

    public function edit( $id ) {
        $item_groups    = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $id  = Crypt::decrypt($id);
        $item_sub_group = ItemSubGroup::findOrFail($id);
        return view('admin.item_sub_groups.edit', compact('item_sub_group', 'item_groups'));
    }

    public function update( $id, Request $request) { 
        $id    = Crypt::decrypt($id); 
        $rules = ItemSubGroup::$rules;

        $rules['name']                      = $rules['name'] . ',id,' . $id;
        $rules['item_sub_group_code']       = $rules['item_sub_group_code'] . ',id,' . $id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $item_sub_group = ItemSubGroup::findOrFail($id);

        $message = '';

        $item_sub_group->fill($data);
        if($item_sub_group->save()) {
            $message .= 'Item sub group edited successfully !';
        }else{
            $message .= 'Unable to edit  item sub group !';
        }

        return Redirect::route('item_sub_group.index')->with('message', $message);
    }

    public function disable($id ) {
        $id  = Crypt::decrypt($id); 
        $item_sub_group = ItemSubGroup::findOrFail($id);
        $message = '';
        //change the status of section to 0
        $item_sub_group->status = 0;
        if($item_sub_group->save()) {
            $message .= 'Section removed successfully !';
        }else{
            $message .= 'Unable to remove  Section !';
        }

        return Redirect::route('item_sub_group.index')->with('message', $message);
    }
}
