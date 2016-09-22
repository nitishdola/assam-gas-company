<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NitsController extends Controller
{
    public function __construct() {
        $this->_department_user = Auth::guard('department_user')->user();
    }

    public function create() {
        if($this->_department_user->can(['create_tender'])) {
            $chargeable_accounts  = [''=> 'Select Chargeable Account'] + ChargeableAccount::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            $item_measurements  = [''=> 'Select Item'] + ItemMeasurement::whereStatus(1)->orderBy('item_name', 'DESC')->lists('item_name', 'id')->toArray();

            $units  = ['' => 'Select Unit'] + MeasurementUnit::whereStatus(1)->orderBy('name', 'DESC')->lists('name', 'id')->toArray();

            return view('department_user.nits.create', compact('chargeable_accounts', 'item_measurements', 'units'));
        }else{
            $message = '';
            $message .= 'Unauthorize Aceess !';
            return Redirect::route('department_user.dashboard')->with(['message' => $message, 'alert-class' => 'alert-danger']);
        } 
    }
}
