<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyWatchController extends Controller
{
    /**
     * Watch property
     */
    public function watch($id)
    {
        auth()->user()->watching()->attach($id);
        return back()->with('success-message', 'You are now watching this property');
    }

    /**
     * Unwatch property
     */
    public function unwatch($id)
    {
        auth()->user()->watching()->detach($id);
        return back()->with('warning-message', 'Property removed from watch list');
    }
}
