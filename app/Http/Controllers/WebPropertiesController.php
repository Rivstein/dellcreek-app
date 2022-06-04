<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class WebPropertiesController extends Controller
{
    // property
    public function property($id)
    {
        $property = Property::find($id);

        return view('web.property',compact(
            'property'
        ));
    }
}
