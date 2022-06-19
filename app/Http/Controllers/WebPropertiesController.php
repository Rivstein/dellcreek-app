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

    /**
     * all properties
     */
    public function properties()
    {
        $properties = Property::latest()->paginate(21);

        $sort = true;

        return view('web.properties',compact(
            'properties',
            'sort'
        ));
    }

    /**
     * Get properties for given county name
     */
    public function countyProperties($county)
    {
        $properties = Property::where('county',$county)->latest()->paginate(21);

        $sort = true;

        return view('web.properties',compact(
            'properties',
            'county',
            'sort'
        ));
    }

    /**
     * Sort properties from low to high or high to low
     * based on the type passed
     */
    public function sort($type, $county = null)
    {
        $properties = '';

        $types = [
            'high_to_low',
            'low_to_high',
            'new_to_old',
            'old_to_new'
        ];

        if( in_array($type,$types) ){
            if($county){
                $properties = $this->countyPriceSort($county, $type);
            }
            else{
                $properties = $this->propertiesSort($type);
            }
        }
        else{
            abort(404);
        }

        $sort = true;

        return view('web.properties',compact(
            'properties',
            'county',
            'sort'
        ));
    }

    /**
     * County properties sort
     */
    private function countyPriceSort($county, $sort_type)
    {
        if($sort_type == 'high_to_low'){
            return Property::where('county',$county)->orderBy('price','desc')->paginate(21);
        }
        elseif($sort_type == 'low_to_high'){
            return Property::where('county',$county)->orderBy('price','asc')->paginate(21);
        }
        elseif($sort_type == 'new_to_old'){
            return Property::where('county',$county)->latest()->paginate(21);
        }
        elseif($sort_type == 'old_to_new'){
            return Property::where('county',$county)->paginate(21);
        }
    }

    /**
     * Properties sort
     */
    private function propertiesSort($sort_type)
    {
        if($sort_type == 'high_to_low'){
            return Property::orderBy('price','desc')->paginate(21);
        }
        elseif($sort_type == 'low_to_high'){
            return Property::orderBy('price','asc')->paginate(21);
        }
        elseif($sort_type == 'new_to_old'){
            return Property::latest()->paginate(21);
        }
        elseif($sort_type == 'old_to_new'){
            return Property::paginate(21);
        }
    }

    /**
     * Properties filter
     */
    public function filter(Request $request)
    {
        $properties = '';

        $min_price = $request->input('min');
        $max_price = $request->input('max');
        $withTitle = $request->input('withTitle');
        $counties = $request->input('counties');

        if(!$min_price){
            $min_price = 0;
        }

        if(!$max_price){
            $max_price = 1000000000; // billion
        }

        if($withTitle && $counties){
            $properties = Property::where('hasTitle', true)
                                    ->whereBetween('price',[$min_price,$max_price])
                                    ->where(function ($query) use ($counties){
                                        $query->whereIn('county',$counties);
                                    })->paginate(21);
        }
        elseif($counties){
            $properties = Property::whereBetween('price',[$min_price,$max_price])
                                    ->where(function ($query) use ($counties){
                                        $query->whereIn('county',$counties);
                                    })->paginate(21);
        }
        else{
            $properties = Property::whereBetween('price',[$min_price,$max_price])
                                    ->paginate(21);
        }

        $sort = false;

        return view('web.properties',compact(
            'properties',
            'sort'
        ));
    }

    /**
     * Property search
     */
    public function search(Request $request)
    {
        $q = $request->input('query');
        
        $q_words = explode(" ", strtolower($q));
        $score_list = []; // key value pairs property_id => score

        $properties = Property::all();

        if(count($properties) > 0){
            foreach ($properties as $property) {
                $name_words = explode(" ", strtolower($property->name));
                $location_words = explode(" ", strtolower($property->location));
                $county = strtolower($property->county);
                $sub_county = strtolower($property->sub_county);

                $score = 0;
                $score += ( count(array_intersect($name_words,$q_words)) / count($name_words)) * 100;

                if( in_array($county, $q_words) ){
                    $score += 100;
                }
                else{
                    $county_words = explode("-", $county);
                    if(count(array_intersect($county_words,$q_words)) > 0){
                        $score += 100;    
                    } 
                }

                if( in_array($sub_county, $q_words)){
                    $score += 100;
                }

                $score += ( count(array_intersect($location_words,$q_words)) / count($location_words)) * 100;

                if($score > 24){
                    $score_list[$property->id] = $score;
                }
                else{
                    continue;
                }
            }
        }
        else{
            return back()->with('info-message', 'No properties to search');
        }

        arsort($score_list);

        $property_ids = [];

        foreach ($score_list as $key => $value) {
            array_push($property_ids, $key);
        }

        $ids_ordered = implode(',', $property_ids);
        
        $properties = Property::whereIn('id', $property_ids)
        ->orderByRaw("FIELD(id, $ids_ordered)")
        ->paginate(21);

        $sort = false;

        return view('web.properties',compact(
            'properties',
            'sort'
        ));
    }
}
