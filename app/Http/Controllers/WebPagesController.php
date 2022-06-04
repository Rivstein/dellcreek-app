<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class WebPagesController extends Controller
{
    //index
    public function index()
    {
        $properties = Property::latest()->paginate(9);
        return view('landing',compact(
            'properties'
        ));
    }
}
