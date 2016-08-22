<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\BudgetHeadTransaction, App\Section, App\Department, App\BudgetHead;

class BudgetHeadTransactionsController extends Controller
{
    public function index() {
		$results = BudgetHeadTransaction::whereStatus(1)->with(['creator', 'department', 'section', 'budget_head'])->orderBy('name', 'DESC')->paginate(20);
		return view('accounts_user.budget_head_transactions.index', compact('results'));
	}

    public function create() {
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $budget_heads    = [''=> 'Select Budget Head'] + BudgetHead::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
    	$results = BudgetHeadTransaction::whereStatus(1)->orderBy('created_at', 'DESC')->take(5)->get();
    	return view('accounts_user.budget_head_transactions.create', compact('results', 'departments', 'sections', 'budget_heads'));
    }

    public function store(Request $request) {
    	$validator = Validator::make($data = $request->all(), BudgetHeadTransaction::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::guard('accounts_user')->user()->id; 
    	$message = '';
    	if(BudgetHeadTransaction::create($data)) {
            $message .= 'budget head added successfully !';
        }else{
            $message .= 'Unable to add budget head !';
        }

        return Redirect::route('budget_head_transaction.index')->with('message', $message);
    }
}
