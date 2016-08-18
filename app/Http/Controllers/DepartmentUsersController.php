<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DepartmentUsersController extends Controller
{
	public function __construct(){
    	$this->middleware('department_user');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	return view('department_user.dashboard');
    }

    public function change_password() {
    	return 'Department User Password Changed !';
    }
}
