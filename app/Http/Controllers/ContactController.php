<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // store newsletter data
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        Contact::create($request->all());

        return back();
    }


}
