<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\HighlightedProperty;
use App\Models\WebCms;
use App\Models\Staff;

class WebPagesController extends Controller
{
    //index
    public function index()
    {
        $data = array_merge([
            'properties' => Property::latest()->paginate(9),
            'counties' => $this->getCounties(),
        ], $this->getHighlighted());

        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        return view('landing', compact('footerData'))->with($data);
    }

    // contact
    public function contact()
    {
        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        return view('web.contact', compact(
            'footerData'
        ));
    }

    /**
     * Get data from web_cms table
     * Get data with target as About.
     * Get all rows from staff table
     */
    public function about()
    {
        // get all staff data contents
        $staff = Staff::all();

        // get all web_cms data from contents column
        $aboutData = WebCms::where('target','About')->pluck('content')->toArray();

        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        // check if about content data is available
        if($aboutData){
            // set variables in reference to about sections
            $about_text = $aboutData[0];
            $about_goal = $aboutData[1];
            $about_mission = $aboutData[2];
            $about_focus = $aboutData[3];
        }
        
        return view('web.about', compact(
            'about_text',
            'about_goal',
            'about_mission',
            'about_focus',
            'staff',
            'footerData'
        ));
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
