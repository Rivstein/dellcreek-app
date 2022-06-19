<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\WebCms;

class WebPropertiesController extends Controller
{
    // property
    public function property($id)
    {
        $property = Property::find($id);

        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        return view('web.property',compact(
            'property',
            'footerData'
        ));
    }
}
