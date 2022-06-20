<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Dev redirect back : under development
     */
    public function dev()
    {
        return back()->with('info-message','[#SYS:Notice] Module under development');
    }
}
