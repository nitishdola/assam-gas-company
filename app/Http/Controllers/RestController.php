<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\ChargeableAccount, App\Section, App\Department;

class RestController extends Controller
{
   
    public function getSections()
    {
    	if(isset($_GET['department_id']) && $_GET['department_id'] != '') {
    		$department_id = $_GET['department_id'];	
    		//return Section::where('department_id', $department_id)->orderBy('name', 'DESC')->get();
    		$sections = DB::table("sections")
                    ->where("department_id",$department_id)
                    ->lists("name","id");
                     return json_encode($sections);
    	}
    }
}
