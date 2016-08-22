<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB, Validator, Redirect, Auth, Crypt;

use App\BudgetHead, App\Section, App\Department;

class BudgetHeadsController extends Controller
{
    public function index() {
		$results = BudgetHead::whereStatus(1)->with(['creator', 'department', 'section'])->orderBy('name', 'DESC')->paginate(20);
		return view('accounts_user.budget_heads.index', compact('results'));
	}

    public function create() {
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$results = BudgetHead::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('accounts_user.budget_heads.create', compact('results', 'departments', 'sections'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), BudgetHead::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('accounts_user')->user()->id; 
    	$message = '';
    	if(BudgetHead::create($data)) {
            $message .= 'budget head added successfully !';
        }else{
            $message .= 'Unable to add budget head !';
        }

        return Redirect::route('chargeable_account.index')->with('message', $message);
    }
}
