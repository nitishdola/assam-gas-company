<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ItemGroup,App\ItemSubGroup,App\MeasurementUnit,App\Location, App\Rack,App\DepartmentUser;
use DB, Validator, Redirect, Auth, Crypt;
use App\ItemMeasurement;

class ItemMeasurementsController extends Controller
{
    public function create() {
        $username = Auth::guard('department_user')->user()->username;
        $user = DepartmentUser::where('username', $username)->first();
    	$item_groups	      = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$item_sub_groups	  = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$measurement_units	  = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$locations	          = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$racks	              = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	return view('department_user.item_measurements.create', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks','user'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), ItemMeasurement::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['expiry_date'] 	= date('Y-m-d', strtotime( $data['expiry_date'] ));
        $data['wef'] 			= date('Y-m-d', strtotime( $data['wef'] ));
        $data['created_by'] 	= Auth::guard('department_user')->user()->id; 

    	$message = '';
    	if(ItemMeasurement::create($data)) {
            $message .= 'Item added successfully !';
        }else{
            $message .= 'Unable to save item !';
        }

        return Redirect::route('item_measurement.index')->with('message', $message);
    }

    public function index(Request $request) {
        $username = Auth::guard('department_user')->user()->username;
        $user = DepartmentUser::where('username', $username)->first();

        $where = [];
        if($request->item_group_id) {
            $where['item_group_id'] = $request->item_group_id;
        }

        if($request->part_number) {
            $where['part_number'] = $request->part_number;
        }

        if($request->measurement_unit_id) {
            $where['measurement_unit_id'] = $request->measurement_unit_id;
        }

        if($request->location_id) {
            $where['location_id'] = $request->location_id;
        }

        if($request->rack_id) {
            $where['rack_id'] = $request->rack_id;
        }

        /*if($request->status) {
            $where['status'] = $request->status;
        }*/

        if($request->item_code) {
            $where['item_code'] = $request->item_code;
        }

        $where['status']   = 1;
        $item_groups       = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $item_sub_groups   = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $measurement_units = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $locations  = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $racks      = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray(); 
       $results     = ItemMeasurement::where($where)->with(['item_group', 'item_sub_group', 'measurement_unit', 'location_id', 'rack_id', 'creator'])->orderBy('item_name', 'DESC')->paginate(20);
		return view('department_user.item_measurements.index', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks', 'results','user'));
	}


    public function edit( $id ) {
        $username = Auth::guard('department_user')->user()->username;
        $user = DepartmentUser::where('username', $username)->first();
        $id = Crypt::decrypt($id);
        $item_measurement = ItemMeasurement::findOrFail($id);

        $item_groups          = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $item_sub_groups      = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $measurement_units    = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $locations            = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $racks                = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        $item_measurement['expiry_date']    = date('d-m-Y', strtotime( $item_measurement['expiry_date'] ));
        $item_measurement['wef']            = date('d-m-Y', strtotime( $item_measurement['wef'] ));

        return view('department_user.item_measurements.edit', compact('item_measurement','item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks','user'));
    }

     public function view( $id ) {
        $username = Auth::guard('department_user')->user()->username;
        $user = DepartmentUser::where('username', $username)->first();
        $id   = Crypt::decrypt($id);
      
       $info  = ItemMeasurement::where('id', $id)->with('item_group', 'item_sub_group', 'measurement_unit', 'location_id','rack_id')->first();
       return view('department_user.item_measurements.view', compact('info','user'));
    }

    public function update($id , Request $request) {
        $id    = Crypt::decrypt($id); 
        $rules = ItemMeasurement::$rules;

        $rules['item_code']  = $rules['item_code'] . ',id,' . $id;
        
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $item_measurement = ItemMeasurement::findOrFail($id);

        $message = '';

        $data['expiry_date']    = date('Y-m-d', strtotime( $data['expiry_date'] ));
        $data['wef']            = date('Y-m-d', strtotime( $data['wef'] ));

        $item_measurement->fill($data);
        if($item_measurement->save()) {
            $message .= 'Item edited successfully !';
        }else{
            $message .= 'Unable to edit  item !';
        }

        return Redirect::route('item_measurement.index')->with('message', $message);
    }

    public function disable($id ) {
        $id      = Crypt::decrypt($id); 
        $item_measurement = ItemMeasurement::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $item_measurement->status = 0;
        if($item_measurement->save()) {
            $message .= 'Item removed successfully !';
        }else{
            $message .= 'Unable to remove item !';
        }

        return Redirect::route('item_measurement.index')->with('message', $message);
    }
}
