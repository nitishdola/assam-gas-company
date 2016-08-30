<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\Department, App\Rack,App\Location, App\Designation,App\Section, App\DepartmentUser,App\AccountsUser;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
        $total_department   = Department::count();
        $total_designation  = Designation::count();
        $total_section      = Section::count();
        $total_rack         = Rack::count();
        $total_location     = Location::count();
        $total_department_user = DepartmentUser::count();
        $total_account_user  = AccountsUser::count();
    	return view('admin.dashboard',compact('total_rack','total_location','total_section','total_designation','total_department','total_section','total_account_user','total_department_user'));
    }


   /*****************creation of department users Section CRUD by admin*****************/
    public function create_department_user() {
        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $designations    = [''=> 'Select Designation'] + Designation::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	return view('admin.users.department.create', compact('departments', 'sections','designations'));
    }

    public function store_department_user(Request $request) {
        $validator = Validator::make($data = $request->all(), DepartmentUser::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('admin')->user()->id; 
        $data['password']   = bcrypt( config('globals.department_user_password') );
        $message = '';
        if(DepartmentUser::create($data)) {
            $message .= 'User added successfully !';
        }else{
            $message .= 'Unable to add user !';
        }

        return Redirect::route('department_user.create')->with('message', $message);
    }


     public function view_department_users(Request $request) { 
        $where['status'] = 1;
        if($request->department_id) {
            $where['department_id'] = $request->department_id;
        }
          if($request->designation_id) {
            $where['designation_id'] = $request->designation_id;
        }

        if($request->section_id) {
            $where['section_id'] = $request->section_id;
        }

        if($request->username) {
            $where['username'] = $request->username;
        }

        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $designations    = [''=> 'Select Designation'] + Designation::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $results = DepartmentUser::where($where)->with(['department', 'section', 'creator'])->paginate(20);
        return view('admin.users.department.index', compact('results', 'departments','designations', 'sections'));
    }

    public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $departmentuser = DepartmentUser::findOrFail($id);
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $designations    = [''=> 'Select Designation'] + Designation::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        return view('admin.users.department.edit', compact('departmentuser','departments','sections','designations'));
    }

     public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = DepartmentUser::$rules;

        $rules['name']              = $rules['name'] . ',id,' . $id;
        //$rules['department_code']   = $rules['department_code'] . ',id,' . $id;

        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $department_user = DepartmentUser::findOrFail($id);

        $message = '';

        $department_user->fill($data);
        if($department_user->save()) {
            $message .= 'Department User Information Edited Successfully !';
        }else{
            $message .= 'Unable to Edit  Department User Information !';
        }

        return Redirect::route('department_user.index')->with('message', $message);
    }

     
      public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $department_user = DepartmentUser::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $department_user->status = 0;
        if($department_user->save()) {
            $message .= 'Department User  Removed Successfully !';
        }else{
            $message .= 'Unable to Remove Department User !';
        }

        return Redirect::route('department_user.index')->with('message', $message);
    }


   /*********************creation of account users  CRUD by admin*******************/

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
            $message .= 'User add successfully !';
        }else{
            $message .= 'Unable to add user !';
        }

        return Redirect::route('account_user.create')->with('message', $message);
    }

public function view_account_users(Request $request) { 
        $where['status'] = 1;
        

        if($request->username) {
            $where['username'] = $request->username;
        }  
        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $results = AccountsUser::where($where)->with(['department', 'section', 'creator'])->paginate(20);
        return view('admin.users.account.index', compact('results', 'departments', 'sections'));
    }


      public function edit_account_user( $id ) {
        $id = Crypt::decrypt($id);
        $accountuser = AccountsUser::findOrFail($id);
        return view('admin.users.account.edit', compact('accountuser'));
    }

     public function update_account_user( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = AccountsUser::$rules;
       // $rules['name']              = $rules['name'] . ',id,' . $id;
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $account_user = AccountsUser::findOrFail($id);

        $message = '';

        $account_user->fill($data);
        if($account_user->save()) {
            $message .= 'Account User Information Updated Successfully !';
        }else{
            $message .= 'Unable to update  Account User Information !';
        }

        return Redirect::route('account_user.index')->with('message', $message);
    }

     
      public function disable_account_user($id ) {
        $id = Crypt::decrypt($id); 
        $account_user = AccountsUser::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $account_user->status = 0;
        if($account_user->save()) {
            $message .= 'Account User  Removed Successfully !';
        }else{
            $message .= 'Unable to Remove Account User !';
        }

        return Redirect::route('account_user.index')->with('message', $message);
       } 

}
