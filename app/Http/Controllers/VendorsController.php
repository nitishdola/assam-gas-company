<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Vendor;

class VendorsController extends Controller
{
    public function create() {
    	return view('admin.vendors.create');
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), Vendor::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id; 
        if($data['latest_po_date'] != ''): 
        $data['latest_po_date'] = date('Y-m-d', strtotime($data['latest_po_date']));
    	endif;

    	$message = '';
    	if(Vendor::create($data)) {
            $message .= 'Supplier/Vendor added successfully !';
        }else{
            $message .= 'Unable to add Vendor !';
        }

        return Redirect::route('admin.vendor.index')->with('message', $message);
    }
    public function index(Request $request) { 
        $where = [];
        if($request->vendor_code) {
            $where['vendor_code'] = $request->vendor_code;
        }

        if($request->mobile) {
            $where['mobile'] = $request->mobile;
        }

        if($request->phone) {
            $where['phone'] = $request->phone;
        }

        if($request->name) {
            $where['name'] = $request->name;
        }
        $where['status']   = 1;
        
        $results = Vendor::where($where)->with(['creator'])->orderBy('name')->paginate(20);
        return view('admin.vendors.index', compact('results'));
    }

    public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $vendor = Vendor::findOrFail($id);
        if($vendor['latest_po_date'] != '0000-00-00'):
        $vendor['latest_po_date'] = date('d-m-Y', strtotime($vendor['latest_po_date']));
        else:
        $vendor['latest_po_date'] = '';
        endif;

        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = Vendor::$rules;

        $rules['vendor_code']   = $rules['vendor_code'] . ',id,' . $id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $vendor = Vendor::findOrFail($id);

        $message = '';

        $vendor->fill($data);
        if($vendor->save()) {
            $message .= 'Vendor edited successfully !';
        }else{
            $message .= 'Unable to edit  vendor !';
        }

        return Redirect::route('admin.vendor.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $vendor = Vendor::findOrFail($id);
        $message = '';
        //change the status of vendor to 0
        $vendor->status = 0;
        if($vendor->save()) {
            $message .= 'Vendor removed successfully !';
        }else{
            $message .= 'Unable to remove  vendor !';
        }

        return Redirect::route('admin.vendor.index')->with('message', $message);
    }
}
