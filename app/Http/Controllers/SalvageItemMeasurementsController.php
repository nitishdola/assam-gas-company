<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ItemGroup,App\ItemSubGroup,App\MeasurementUnit,App\Location, App\Rack;

use DB, Validator, Redirect, Auth, Crypt;

use App\SalvageItemMeasurement;

class SalvageItemMeasurementsController extends Controller
{
    public function create() {
    	$item_groups	      = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$item_sub_groups	  = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$measurement_units	  = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$locations	          = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$racks	              = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	return view('department_user.salvage_item_measurements.create', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), SalvageItemMeasurement::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['expiry_date'] 	= date('Y-m-d', strtotime( $data['expiry_date'] ));
        $data['wef'] 			= date('Y-m-d', strtotime( $data['wef'] ));
        $data['created_by'] 	= Auth::guard('department_user')->user()->id; 

    	$message = '';
    	if(SalvageItemMeasurement::create($data)) {
            $message .= 'Item added successfully !';
        }else{
            $message .= 'Unable to add item !';
        }

        return Redirect::route('salvage_item_measurement.index')->with('message', $message);
    }

    public function index(Request $request) {

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

        $where['status'] = 1;
        $item_groups    = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $item_sub_groups    = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $measurement_units  = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $locations  = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $racks  = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray(); 
		$results = SalvageItemMeasurement::where($where)->with(['item_group', 'item_sub_group', 'measurement_unit', 'location_id', 'rack_id', 'creator'])->orderBy('item_name', 'DESC')->paginate(20);
		return view('department_user.salvage_item_measurements.index', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks', 'results'));
	}

    public function view( $id ) {
        $id = Crypt::decrypt($id);
      
       $info = SalvageItemMeasurement::where('id', $id)->with('item_group', 'item_sub_group', 'measurement_unit', 'location_id','rack_id')->first();
       return view('department_user.salvage_item_measurements.view', compact('info'));
    }

    public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $salvage_item_measurement = SalvageItemMeasurement::findOrFail($id);

        $item_groups          = [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $item_sub_groups      = [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $measurement_units    = [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $locations            = [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $racks                = [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        $salvage_item_measurement['expiry_date']    = date('d-m-Y', strtotime( $salvage_item_measurement['expiry_date'] ));
        $salvage_item_measurement['wef']            = date('d-m-Y', strtotime( $salvage_item_measurement['wef'] ));

        return view('department_user.salvage_item_measurements.edit', compact('salvage_item_measurement','item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks'));
    }

    public function update($id , Request $request) {
        $id = Crypt::decrypt($id); 
        $rules = SalvageItemMeasurement::$rules;

        $rules['item_code']  = $rules['item_code'] . ',id,' . $id;
        
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $item_measurement = SalvageItemMeasurement::findOrFail($id);

        $message = '';

        $data['expiry_date']    = date('Y-m-d', strtotime( $data['expiry_date'] ));
        $data['wef']            = date('Y-m-d', strtotime( $data['wef'] ));

        $item_measurement->fill($data);
        if($item_measurement->save()) {
            $message .= 'Item  Edited successfully !';
        }else{
            $message .= 'Unable to edit  item !';
        }

        return Redirect::route('salvage_item_measurement.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $item_measurement = SalvageItemMeasurement::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $item_measurement->status = 0;
        if($item_measurement->save()) {
            $message .= 'Item removed successfully !';
        }else{
            $message .= 'Unable to remove item !';
        }

        return Redirect::route('salvage_item_measurement.index')->with('message', $message);
    }
}
