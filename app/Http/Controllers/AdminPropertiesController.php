<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\HighlightedProperty;
use App\Models\PropertyImage;

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

        if(!$highlighted || $property != $highlighted->property  || !$highlighted->active){
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
        unset($data['images']);

        // store main image and return path
        $path = $request->file('image')->store('public/properties');
        $data['image'] = explode('public/', $path)[1];

        $property = Property::create($data);

        if ($request->file('images') != null) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/properties/images');
                $storage_path = explode('public/', $path)[1];
                PropertyImage::create([
                    'property_id' => $property->id,
                    'path' => $storage_path
                ]);
            }
        }
        

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

    // delete property image
    public function deleteImage(Request $request, $id, $property_id)
    {
        $image = PropertyImage::find($id);
        $image->delete();
        return redirect('admin/properties/property/'.$property_id);
    }
}
