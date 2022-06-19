<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function redirectTo()
    {
        $user = auth()->user();
        
        if ($user->isAbleTo('access-admin')) {
            return '/dashboard';
        }
        
        // return back if prev url not login
        if( url()->previous() != route('login') ){
            return url()->previous();
        }
        
        return '/';
    }

    /**
     * Logout redirect
     */
    public function logout(Request $request) {
        auth()->logout();
        return redirect('/login')->with('info-message','You are logged out. Login to continue');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
