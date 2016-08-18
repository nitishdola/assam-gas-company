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
    	$item_groups	= [''=> 'Select Item Group'] + ItemGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$item_sub_groups	= [''=> 'Select Item Sub Group'] + ItemSubGroup::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$measurement_units	= [''=> 'Select Unit of Measurement'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$locations	= [''=> 'Select Location'] + Location::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$racks	= [''=> 'Select Rack'] + Rack::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

    	return view('department_user.item_measurements.create', compact('item_groups', 'item_sub_groups', 'measurement_units', 'locations', 'racks'));
    }
}
