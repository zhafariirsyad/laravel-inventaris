<?php

namespace App\Http\Controllers\EmployeeAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function login(Request $request)
    {
    	$auth = Auth::guard('employee')->attempt([
    		'username' => $request->username,
    		'password' => $request->password
    	]);

    	if ($auth) {
    		return redirect()->route('emp.dash');
    	} else {
    		return redirect()->route('emp.show');
    	}
    	
    }

    public function show()
    {
        return view('auth.employee');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session->invalidate();

        return redirect()->route('emp.show');
    }
}
