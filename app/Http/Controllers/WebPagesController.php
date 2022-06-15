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
        $data = array_merge([
            'properties' => Property::latest()->paginate(9),
            'counties' => $this->getCounties(),
        ], $this->getHighlighted());

        // dd($data);

        return view('landing')->with($data);
    }

    // contact
    public function contact()
    {
        return view('web.contact');
    }

    // about
    public function about()
    {
        return view('web.about');
    }

    /**
     * Get property counties and order them from the one
     * with the most properties to the one with the least
     * properties and return an array of the counties names.
     */
    private function getCounties()
    {
        $counties_list = Property::select('county')->groupBy('county')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(47)
                        ->get();
        $counties = [];

        foreach ($counties_list as $county_name) {
            array_push($counties, $county_name->county);
        }

        return $counties;
    }

    /**
     * Get highlighted property or display latest property
     */
    private function getHighlighted()
    {
        $highlighted = HighlightedProperty::latest()->first();
        $description = null;
        
        if(!$highlighted || !$highlighted->active){
            $highlighted = Property::latest()->first();
        }
        else{
            $description = $highlighted->description;
            $highlighted = $highlighted->property;
        }

        return [
            'highlighted' => $highlighted,
            'description' => $description
        ];
    }
}
