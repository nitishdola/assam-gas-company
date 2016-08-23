<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;

use App\BudgetHeadTransaction, App\Section, App\Department, App\BudgetHead;

class BudgetHeadTransactionsController extends Controller
{
    public function index() {
		$results = BudgetHeadTransaction::whereStatus(1)->with(['creator', 'department', 'section', 'budget_head'])->orderBy('created_at', 'DESC')->paginate(20);
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

    public function edit( $id ) {
        $id = Crypt::decrypt($id);
        $BudgetHeadTransaction = BudgetHeadTransaction::findOrFail($id);
        $departments    = [''=> 'Select Department'] + Department::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $sections    = [''=> 'Select Section'] + Section::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();
        $budget_heads    = [''=> 'Select Budget Head'] + BudgetHead::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();;
       return view('accounts_user.budget_head_transactions.edit', compact('BudgetHeadTransaction', 'departments', 'sections','budget_heads'));
      
    }

    public function update( $id, Request $request) { 
        $id = Crypt::decrypt($id); 
        $rules = BudgetHeadTransaction::$rules;

        //$rules['name']  = $rules['name'] . ',id,' . $id;
        
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $BudgetHeadTransaction = BudgetHeadTransaction::findOrFail($id);

        $message = '';

        $BudgetHeadTransaction->fill($data);
        //var_dump($data);
        //exit();
        if($BudgetHeadTransaction->save()) {
            $message .= 'Budget Head Transaction  edited successfully !';
        }else{
            $message .= 'Unable to edit  Budget Head Transaction !';
        }

        return Redirect::route('budget_head_transaction.index')->with('message', $message);
    }

    public function disable($id ) {
        $id = Crypt::decrypt($id); 
        $BudgetHeadTransaction = BudgetHeadTransaction::findOrFail($id);
        $message = '';
        //change the status of department to 0
        $BudgetHeadTransaction->status = 0;
        if($BudgetHeadTransaction->save()) {
            $message .= 'Budget Head Transaction removed successfully !';
        }else{
            $message .= 'Unable to remove  Budget Head Transaction !';
        }

        return Redirect::route('budget_head_transaction.index')->with('message', $message);
    }*/
}
