<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // store contact data
    public function store(Request $request, $type, $origin, $property_id = null)
    {
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        
        $contact = Contact::create($request->all());
        $contact->type = $type;
        $contact->origin = $origin;
        $contact->property_id = $property_id;
        $contact->save();

        if($origin == 'account profile'){
            return redirect('profile')->with('success-message','Success! Thank you for using dellcreek services');
        }

        return back()->with('success-message','Success! Thank you for using dellcreek services');
    }


}
