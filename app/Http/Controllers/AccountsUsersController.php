<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB, Validator, Redirect, Auth, Crypt;
use App\AccountsUser;
use App\User;

class AccountsUsersController extends Controller
{

 public function __construct(){
    	$this->middleware('accounts_user');
    }
   public function index(){
    	return view('accounts_user.dashboard');
    }
  /************************For Accounts User,change password**************************/

  public function change_password() {
    return view('accounts_user.change_password');
     }

 public function update_password(Request $request) {

      $rules = array(
          'current_password'          => 'required',
          'password_new'              => 'required|confirmed|different:current_password',
          'password_new_confirmation' => 'required',
      );
      $error_msg = array(
          'current_password.required' => 'Current password is required',
          'password_new.confirmed'    => 'Confirm password doesnot match',
      );
      $this->validate($request, $rules,$error_msg );
      $username = Auth::guard('accounts_user')->user()->username;
     // $password = Auth::guard('accounts_user')->user()->password;
      $message = $class = '';
    // if (Auth::attempt(['username' => $username, 'password' => $password])) {
          $new_password = trim($request->get('password_new'));

          $user = AccountsUser::where('username', $username)->first();

          $user->password = bcrypt($new_password);

          if($user->save()) {
            $message .= 'Password Updated Successfully !';
            $class   .= 'alert-success';
          }else{
            $message .= 'Unable to update password !';
            $class   .= 'alert-danger';
          }
    /*  }else{
        $message .= 'Invalid Password Entered !';
        $class   .= 'alert-danger';
      }*/
      Session::flash('message', $message);
      Session::flash('alert-class', $class);
      return Redirect::route('chnage_accounts_user_password');
     

    }
}
