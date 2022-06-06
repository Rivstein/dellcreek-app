<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\HighlightedProperty;

class AdminPropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->get();
        return view('admin.properties.index',compact(
            'properties'
        ));
    }

    // view property
    public function show($id)
    {
        $property = Property::find($id);
        $highlighted = HighlightedProperty::latest()->first();

        if($property != $highlighted->property  || !$highlighted->active){
            $highlighted = false;    
        }

        return view('admin.properties.property',compact(
            'property',
            'highlighted'
        ));
    }

    // create property
    public function create()
    {
        return view('admin.properties.create');
    }

    // validation
    private function validator($request)
    {
        $rules = [
            'name' => 'required',
            'dimensions' => 'required',
            'map' => 'required',
            'description' => 'required',
            'price' => 'required',
            'county' => 'required',
            'sub_county' => 'required',
            'location' => 'required',
        ];

        if($request->method() == 'POST'){
            $rules['image'] = 'required';
        }

        return $request->validate($rules);
    }

    // store property
    public function store(Request $request)
    {
        $this->validator($request);
        $data = $request->all();
        $path = $request->file('image')->store('public/properties');
        $data['image'] = explode('public/', $path)[1];

        $property = Property::create($data);
        return redirect('admin/properties/property/'.$property->id);
    }

    // edit property
    public function edit($id)
    {
        $property = Property::find($id);
        return view('admin.properties.edit',compact(
            'property'
        ));
    }

    // update property
    public function update(Request $request, $id)
    {
        $this->validator($request);
        $property = Property::find($id);
        $property->update($request->all());
        return redirect('admin/properties/property/'.$property->id);
    }

    // delete property
    public function delete($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect('admin/properties/manager');
    }
}
