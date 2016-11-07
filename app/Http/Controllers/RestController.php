<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\ChargeableAccount,App\ItemSubGroup, App\Rack, App\Section, App\Department, App\ItemMeasurement;

class RestController extends Controller
{
   
    public function getSections(){
    	if(isset($_GET['department_id']) && $_GET['department_id'] != '') {
    		$department_id = $_GET['department_id'];	
    		$sections = DB::table("sections")->where("department_id",$department_id)
                    ->lists("name","id");
                     return json_encode($sections);
    	}
    }


    /**********casecading dropdown for location to rack**********/
     public function getRacks(){
        if(isset($_GET['location_id']) && $_GET['location_id'] != '') {
            $location_id = $_GET['location_id'];    
            $racks = DB::table("racks")->where("location_id",$location_id)
                    ->lists("name","id");
                     return json_encode($racks);
             }
   }
    /**********casecading dropdown for location to rack**********/
     public function getSubgroups(){
        if(isset($_GET['item_group_id']) && $_GET['item_group_id'] != '') {
            $item_group_id = $_GET['item_group_id'];    
            $item_sub_groups = DB::table("item_sub_groups")->where("item_group_id",$item_group_id)
                    ->lists("name","id");
                     return json_encode($item_sub_groups);
             }
   }


     public function itemValues() {
        if(isset($_GET['item_measurement_id']) && $_GET['item_measurement_id'] != '') {
            return ItemMeasurement::where('id', $_GET['item_measurement_id'])->select(['latest_rate', 'stock_in_hand', 'item_code'])->first();
        }
    }
}
