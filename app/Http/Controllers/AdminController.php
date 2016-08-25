<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Department, App\Section, App\DepartmentUser,App\AccountsUser;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	return view('admin.dashboard');
    }

    public function create_department_user() {
        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	return view('admin.users.department.create', compact('departments', 'sections'));
    }

    public function store_department_user(Request $request) {
        $validator = Validator::make($data = $request->all(), DepartmentUser::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id; 
        $data['password']   = bcrypt( config('globals.department_user_password') );

        //dd($data);

        $message = '';
        if(DepartmentUser::create($data)) {
            $message .= 'User added successfully !';
        }else{
            $message .= 'Unable to add user !';
        }

        return Redirect::route('department_user.create')->with('message', $message);
    }


   /*********************creation of account users*******************/

   public function create_account_user() {
       
        return view('admin.users.account.create');
    }

    public function store_account_user(Request $request) {
        $validator = Validator::make($data = $request->all(), AccountsUser::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id; 
        $data['password']   = bcrypt( config('globals.account_user_password') );

        //dd($data);

        $message = '';
        if(AccountsUser::create($data)) {
            $message .= 'User added successfully !';
        }else{
            $message .= 'Unable to add user !';
        }

        return Redirect::route('account_user.create')->with('message', $message);
    }




    public function view_department_users(Request $request) { 
        $where = [];
        if($request->department_id) {
            $where['department_id'] = $request->department_id;
        }

        if($request->section_id) {
            $where['section_id'] = $request->section_id;
        }

        if($request->username) {
            $where['username'] = $request->username;
        }

        if($request->status) {
            $where['status'] = $request->status;
        }

        $results = DepartmentUser::where($where)->with(['department', 'section', 'creator'])->paginate(20);
        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        return view('admin.users.department.index', compact('results', 'departments', 'sections'));
    }
}
