<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Department,App\ChargeableAccount,App\Requisition,App\RequisitionItem, App\Rack,App\Location, App\Designation,App\Section, App\DepartmentUser,App\AccountsUser,App\Role,App\Permission,App\PermissionRole,App\RoleDepartmentUser;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
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
            $message .= 'Department User Information Updated Successfully !';
        }else{
            $message .= 'Unable to Update  Department User Information !';
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


    //******************Overview of Requisition Process....view,download***************//
       
    public function requisition_index(Request $request) {
       
        $departments = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $chargeable_accounts    = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        $where = [];
        if($request->department_id) {
            $where['department_id'] = $request->department_id;
        }
        if($request->chargeable_account_id) {
            $where['chargeable_account_id'] = $request->chargeable_account_id;
        }
         if($request->requisition_number) {
            $where['requisition_number'] = $request->requisition_number;
        }
         if($request->Approval) {
            $where['hod'] = $request->Approval;
        }
        $where['status'] = 1;
      
        $results = Requisition::where($where)->with(['department', 'chargeable_account'])->orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.requisitions.index', compact('departments','chargeable_accounts', 'results','user'));
    }

    public function view( $id ) {
        $id       = Crypt::decrypt($id);
        $info     = Requisition::where('id', $id)->with('department', 'chargeable_account','department_user')->first();
        $requisition_items  = RequisitionItem::where('requisition_id', $id)->get();
        return view('admin.requisitions.view',compact('info','requisition_items'));
    }

    /*********************Creation of Role & Permission*******************/
    public function create_role() {
        return view('admin.role.create');
    }

    public function store_role(Request $request) {
        $validator = Validator::make($data = $request->all(), Role::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        $message = '';
        if(Role::create($data)) {
            $message .= 'Role added successfully !';
        }else{
            $message .= 'Unable to add role!';
        }

        return Redirect::route('role.create')->with('message', $message);
    }
   
    public function create_permission() {
       
        return view('admin.permission.create');
    }

    public function store_permission(Request $request) {
        $validator = Validator::make($data = $request->all(), Permission::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        $message = '';
        if(Permission::create($data)) {
            $message .= 'Permission added successfully !';
        }else{
            $message .= 'Unable to add Permission !';
        }

        return Redirect::route('permission.create')->with('message', $message);
    }

    /***************assign permissions to roles************************/ 

    public function assign_permission() {

        $roles = [''=> 'Select Role'] + Role::orderBy('name', 'DESC')->lists('display_name', 'id')->toArray();
        $permissions = [''=> 'Select Permission'] + Permission::orderBy('name', 'DESC')->lists('display_name', 'id')->toArray();

        return view('admin.assign_permission.create',compact('roles','permissions'));
    }

    public function store_permission_assigned(Request $request) {
        $validator = Validator::make($data = $request->all(), PermissionRole::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        $message = '';
        if(PermissionRole::create($data)) {
            $message .= 'Permission assigned successfully !';
        }else{
            $message .= 'Unable to assigned Permission !';
        }

        return Redirect::route('assign_permission.create')->with('message', $message);
    }
    
    /*************************assign role to users******************************/

    public function assign_role() {
        $department_users = [''=> 'Select a User'] + DepartmentUser::orderBy('name', 'DESC')->lists('name', 'id')->toArray();

        $roles =  Role::orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        
        return view('admin.assign_role.create',compact('roles','department_users'));
    }

    public function store_role_assigned(Request $request) {

       foreach ($request->roles as $role){
            $data['department_user_id'] = $request->department_user_id;
            $data['role_id'] = $role;
            $validator = Validator::make($data, RoleDepartmentUser::$rules);
            if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
                RoleDepartmentUser::create($data);
            } 
        $message = '';
        $message .= 'Roled assigned successfully !';
        return Redirect::route('assign_role.create')->with('message', $message);
    }
}
