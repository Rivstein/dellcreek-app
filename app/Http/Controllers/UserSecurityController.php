<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSecurityController extends Controller
{
    public function index()
    {
        return view('admin.user_security.index');
    }
}