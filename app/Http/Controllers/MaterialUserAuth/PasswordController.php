<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $guard  = 'department_user';
    protected $broker = 'department_users';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:department_user');
    }

    public function getEmail()
    {
        return $this->showLinkRequestForm();
    }

    public function showLinkRequestForm()
    {
        if (property_exists($this, 'linkRequestView')) {
            return view($this->linkRequestView);
        }

        if (view()->exists('department_user.auth.passwords.email')) {
            return view('department_user.auth.passwords.email');
        }

        return view('department_user.auth.password');
    }

    public function showResetForm(Request $request, $token = null)
    {

        if (is_null($token)) {
            return $this->getEmail();
        }
        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('department_user.auth.passwords.reset')) {
            return view('department_user.auth.passwords.reset')->with(compact('token', 'email'));
        }

        return view('department_user.passwords.auth.reset')->with(compact('token', 'email'));
    }

}
