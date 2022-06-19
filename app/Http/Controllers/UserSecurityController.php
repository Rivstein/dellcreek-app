<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSecurityController extends Controller
{
    public function index()
    {
        return view('admin.user_security.index');
    }

    /**
     * Redirect handler when permission fails
     */
    public function permissionFail()
    {
        $user = auth()->user();
        if($user->isAbleTo('access-admin')){
            return back()->with('danger-message', '#403 ERROR! access is restricted to authorised users');
        }
        return redirect('/');
    }
}
