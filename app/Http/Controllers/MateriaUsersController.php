<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB, Validator, Redirect, Auth, Crypt;
use App\MaterialUser,App\User,App\Requisition;

class MateriaUsersController extends Controller
{
    public function __construct(){
    	$this->middleware('material_user');
    }

    public function index(){
    	return view('material_user.dashboard');
    }
}
