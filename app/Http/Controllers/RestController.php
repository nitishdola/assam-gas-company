<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\ChargeableAccount,App\ItemSubGroup, App\Rack, App\Section, App\Department, App\ItemMeasurement,App\RequisitionItem;

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

    public function approveRequisition()
    {
        //if($this->_department_user->can(['requisition_check_user'])) {
        if(isset($_GET['item_id']) && $_GET['item_id'] != '') {
            //return $id                 = Crypt::decrypt($_GET['item_id']);
            $id                 = $_GET['item_id'];
            $requisition_item   = RequisitionItem::findOrFail($id);
            $requisition_item->authorized_by    = Auth::guard('material_user')->user()->id;
            $requisition_item->authorized_date  = date('Y-m-d');
            $requisition_item->current_status   = 'authorized_for_issue';
            if($requisition_item->save()){
                return 'Approved';
            }else{
                return 'Unable to approve ! Please try again';
            }
        //}
        }
    }

    public function rejectRequisition() {
        if(isset($_GET['item_id']) && $_GET['item_id'] != '') {
            $id                 = $_GET['item_id'];
            $requisition_item   = RequisitionItem::findOrFail($id);
            $requisition_item->current_status    = 'rejected';
            if($requisition_item->save()){
                return 'Successfully Rejected';
            }else{
                return 'Unable to reject item ! Please try again';
            }
        }
    }

    public function issueItem() {
        if(isset($_GET['item_id']) && $_GET['item_id'] != '') {
            $id                 = $_GET['item_id'];
            $requisition_item   = RequisitionItem::findOrFail($id); 

            if($requisition_item->current_status == 'authorized_for_issue' && $requisition_item->authorized_by != NULL && $requisition_item->authorized_date != NULL) {

                $requisition_item->current_status    = 'issued'; 
                $requisition_item->quantity_issued   = $_GET['issued']; 
                $requisition_item->issued_by         = Auth::guard('material_user')->user()->id;
                $requisition_item->issued_date       = date('Y-m-d');

                if($requisition_item->save()){
                    echo 'Successfully Issued';
                }
            }else{
                echo 'Unable to issue item ! Please try again';
            }
        }
    }
}
