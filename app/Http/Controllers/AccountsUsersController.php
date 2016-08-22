<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AccountsUsersController extends Controller
{
    public function index(){
    	return view('accounts_user.dashboard');
    }
}
