<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class CRMController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view ('admin.crm.index', compact('contacts'));
    }
}
