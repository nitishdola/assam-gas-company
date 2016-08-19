<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ItemGroup,App\ItemSubGroup,App\MeasurementUnit,App\Location, App\Rack;

use DB, Validator, Redirect, Auth, Crypt;

use App\ItemMeasurement;

class ItemMeasurementsController extends Controller
{
    public function create() {
    	$item_groups	      = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$item_sub_groups	  = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$measurement_units	  = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$locations	          = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$racks	              = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	return view('department_user.item_measurements.create', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks'));
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
            $message .= 'Unable to add item !';
        }

        return Redirect::route('item_measurement.index')->with('message', $message);
    }

    public function index(Request $request) {

        $where = [];
        if($request->item_group_id) {
            $where['item_group_id'] = $request->item_group_id;
        }

        if($request->item_sub_group_id) {
            $where['item_sub_group_id'] = $request->item_sub_group_id;
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

        if($request->status) {
            $where['status'] = $request->status;
        }

        $item_groups    = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $item_sub_groups    = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $measurement_units  = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $locations  = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $racks  = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray(); 

		$results = ItemMeasurement::where($where)->with(['item_group', 'item_sub_group', 'measurement_unit', 'location_id', 'rack_id', 'creator'])->orderBy('item_name', 'DESC')->paginate(20);
		return view('department_user.item_measurements.index', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks', 'results'));
	}
}
