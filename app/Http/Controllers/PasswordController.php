<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB, Validator, Redirect, Auth, Crypt;
use App\AccountsUser;
use App\User;
use App\Admin;
use App\DepartmentUser;

class PasswordController  extends Controller
{
   public function __construct(){
      $this->middleware('admin');
    }
 

   /*********************For Admin Panel,Change password********************/
    public function change_password_admin() {
         return view('admin.change_password');
     }

  public function update_password_admin(Request $request) {

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
      $username = Auth::guard('admin')->user()->username;
      $message = $class = '';
          $new_password = trim($request->get('password_new'));

          $user = Admin::where('username', $username)->first();

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
      return Redirect::route('chnage_admin_user_password');
    }

}