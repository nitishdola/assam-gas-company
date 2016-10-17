<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB, Validator, Redirect, Auth, Crypt;
use App\DepartmentUser;
use App\User;
use App\ItemMeasurement,App\SalvageItemMeasurement,App\Requisition;

class DepartmentUsersController extends Controller
{
	public function __construct(){
    	$this->middleware('department_user');
    }

    public function index(){
        $total_item_measurement   = ItemMeasurement::count();
        $total_salvage_measurement = SalvageItemMeasurement::count();
        $total_requisition = Requisition::count();
    	  $username = Auth::guard('department_user')->user()->username;
        $user = DepartmentUser::where('username', $username)->first();

				$min_stocked_items 		= ItemMeasurement::select('item_name', 'item_code', 'stock_in_hand', 'minimum_stock_level', 'reorder_stock_level')->where('stock_in_hand', '<=', 'minimum_stock_level')->orderBy('stock_in_hand', 'ASC')->get();

				$min_reordered_items 	= ItemMeasurement::select('item_name', 'item_code', 'stock_in_hand', 'minimum_stock_level', 'reorder_stock_level')->where('stock_in_hand', '<=', 'reorder_stock_level')->orderBy('reorder_stock_level', 'ASC')->get();

    	  return view('department_user.dashboard',compact('total_item_measurement','total_requisition','total_salvage_measurement','user', 'min_stocked_items', 'min_reordered_items'));
    }

    public function change_password() {
    	return 'Department User Password Changed !';
    }
/*****************For Department Panel,Change Password**********************/

  public function change_password_department() {
         return view('department_user.change_password');
     }

  public function update_password_department(Request $request) {


      $rules = array(
          'current_password'          => 'required',
          'password_new'              => 'required|confirmed|different:current_password',
          'password_new_confirmation' => 'required',
      );

      $error_msg = array(
          'current_password.required' => 'Current Password is required',
          'password_new.confirmed'    => 'Confirm Password does not match',
      );

      $this->validate($request, $rules,$error_msg );
      $username = Auth::guard('department_user')->user()->username;
      $message = $class = '';
          $new_password = trim($request->get('password_new'));
          $user = DepartmentUser::where('username', $username)->first();
          $user->password = bcrypt($new_password);
          if($user->save()) {
            $message .= 'Password updated Successfully !';
            $class   .= 'alert-success';
          }else{
            $message .= 'Unable to update password !';
            $class   .= 'alert-danger';
          }

      Session::flash('message', $message);
      Session::flash('alert-class', $class);
      return Redirect::route('chnage_department_user_password');
    }

}
