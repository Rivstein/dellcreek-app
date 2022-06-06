<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\HighlightedProperty;

class WebPagesController extends Controller
{
    //index
    public function index()
    {
        $properties = Property::latest()->paginate(9);
        $highlighted = HighlightedProperty::latest()->first();
        $description = null;
        
        if(!$highlighted->active){
            $highlighted = Property::latest()->first();
        }
        else{
            $description = $highlighted->description;
            $highlighted = $highlighted->property;
        }

        return view('landing',compact(
            'properties',
            'highlighted',
            'description'
        ));
    }
}
