<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\ChargeableAccount, App\Section, App\Department;

class ChargeableAccountsController extends Controller
{
    public function index() {
		$results = ChargeableAccount::whereStatus(1)->with(['creator', 'department', 'section'])->orderBy('name', 'DESC')->paginate(20);
		return view('accounts_user.chargeable_accounts.index', compact('results'));
	}

    public function create() {
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$results = ChargeableAccount::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('accounts_user.chargeable_accounts.create', compact('results','sections' ,'departments'));
    }

     

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), ChargeableAccount::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('accounts_user')->user()->id; 
    	$message = '';
    	if(ChargeableAccount::create($data)) {
            $message .= 'Chargeable Account added successfully !';
        }else{
            $message .= 'Unable to add Chargeable Account !';
        }

        return Redirect::route('chargeable_account.index')->with('message', $message);
    }

       public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $ChargeableAccount = ChargeableAccount::findOrFail($id);
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        //$results = ChargeableAccount::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
       
       return view('accounts_user.chargeable_accounts.edit', compact('ChargeableAccount','departments', 'sections'));
      
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = ChargeableAccount::$rules;

        $rules['name']  = $rules['name'] . ',id,' . $id;
        
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $ChargeableAccount = ChargeableAccount::findOrFail($id);

        $message = '';

        $ChargeableAccount->fill($data);
        //var_dump($data);
        //exit();
        if($ChargeableAccount->save()) {
            $message .= 'Budget Head updated successfully !';
        }else{
            $message .= 'Unable to update  Budget Head !';
        }

        return Redirect::route('chargeable_account.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $ChargeableAccount = ChargeableAccount::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $ChargeableAccount->status = 0;
        if($ChargeableAccount->save()) {
            $message .= 'Chargeable Account removed successfully !';
        }else{
            $message .= 'Unable to remove  Chargeable Account !';
        }

        return Redirect::route('chargeable_account.index')->with('message', $message);
    }
}
