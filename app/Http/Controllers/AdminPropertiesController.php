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

        $data['created_by'] = auth()->user()->id;

        $property = Property::create($data);

        if ($request->file('images') != null) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/properties/images');
                $storage_path = explode('public/', $path)[1];
                PropertyImage::create([
                    'property_id' => $property->id,
                    'path' => $storage_path,
                    'created_by' => auth()->user()->id
                ]);
            }
        }
   
        return redirect('admin/properties/property/'.$property->id)->with('success-message','Property created successfully, manage property below');
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
        $property->updated_by = auth()->user()->id;
        $property->save();
        return redirect('admin/properties/property/'.$property->id)->with('info-message','Property details updated successfully, manage property below');
    }

    // update property main image
    public function updateMainImage(Request $request, $property_id)
    {
        $property = Property::find($property_id);
        $path = $request->file('image')->store('public/properties');
        $property->image = explode('public/', $path)[1];
        $property->updated_by = auth()->user()->id;
        $property->save();
        return back()->with('success-message','Property main image replaced');
    }

    /**
     * Update properties listing status
     */
    public function listing($id)
    {
        $property = Property::find($id);
        $property->listed = !$property->listed;
        $property->save();

        if($property->listed){
            return back()->with('success-message', 'Property listed, it is now visible in the public pages');
        }
        else{
            return back()->with('danger-message', 'Property unlisted, it is now not visible in the public pages');
        }
    }

    // upload property image
    public function uploadImage(Request $request, $property_id)
    {
        $path = $request->file('image')->store('public/properties/images');
        $storage_path = explode('public/', $path)[1];
        PropertyImage::create([
            'property_id' => $property_id,
            'path' => $storage_path,
            'created_by' => auth()->user()->id
        ]);
        return back()->with('success-message','New property image uploaded successfully');
    }

    // delete property
    public function delete($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect('admin/properties/manager')->with('warning-message','Property deleted');
    }

    // delete property image
    public function deleteImage(Request $request, $id, $property_id)
    {
        $image = PropertyImage::find($id);
        $image->delete();
        return back()->with('warning-message','Property image deleted');
    }
}
