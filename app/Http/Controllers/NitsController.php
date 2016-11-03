<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\PurchaseIndent, App\PurchaseIndentItem;
use App\Nit;

class NitsController extends Controller
{
    public function __construct() {
        $this->_department_user = Auth::guard('department_user')->user();
    }

    public function index() {
      $results = Nit::with(['purchase_indent', 'creator'])->paginate(30);
      return view('department_user.nits.index', compact('results'));
    }

    public function create() {
        //if($this->_department_user->can(['create_tender'])) {
            $purchase_indents  = PurchaseIndent::orderBy('created_at', 'ASC')->lists('purchase_indent_number', 'id')->toArray();
            return view('department_user.nits.create', compact('purchase_indents'));
        // }else{
        //     $message = '';
        //     $message .= 'Unauthorize Aceess !';
        //     return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        // }
    }

    //store the NIT data
    public function store(Request $request) {
      $data = $request->all();

      $data['nit_date'] = date('Y-m-d', strtotime( $request->nit_date ));
      $data['nit_opening_date'] = date('Y-m-d', strtotime( $request->nit_opening_date ));
      $data['nit_closing_date'] = date('Y-m-d', strtotime( $request->nit_closing_date ));
      $data['nit_pre_bid_date'] = date('Y-m-d', strtotime( $request->nit_pre_bid_date ));
      $data['created_by'] = Auth::guard('department_user')->user()->id;
    	$validator = Validator::make($data, Nit::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

    	$message = '';
    	if(Nit::create($data)) {
            $message .= 'NIT added successfully !';
        }else{
            $message .= 'NIT unable to add unit !';
        }
        return Redirect::route('nit.index')->with('message', $message);
    }
    /**
    * View NIT details
    * Comparative study
    **/
    
    public function comparative_study( $id = NULL) {
      $id   = Crypt::decrypt($id);
      $info = Nit::whereId($id)->with(['creator', 'purchase_indent', 'purchase_indent.budget_head',  'purchase_indent.checker',  'purchase_indent.approved_by', 'purchase_indent.creator', 'purchase_indent.requisition.department', 'purchase_indent.requisition'])->first();
      $purchase_indent_items = PurchaseIndentItem::where('purchase_indent_id', $info->purchase_indent['id'])->with('purchase_indent', 'requisition_item')->get();

      return view('department_user.nits.comparative_study', compact('info', 'purchase_indent_items'));
    }


}
