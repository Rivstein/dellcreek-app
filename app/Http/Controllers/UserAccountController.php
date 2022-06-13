<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{  
    public function profile()
    {
        return view('web.accounts.profile');
    } 
}  
