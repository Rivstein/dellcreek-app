<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HighlightedProperty;

class HighlightedPropertyController extends Controller
{
    // store
    public function store(Request $request)
    {
        HighlightedProperty::create($request->all());
        return back()->with('info-message','This property is now the highlighted property on the home page');
    }

    // update
    public function update(Request $request)
    {
        $highlighted = HighlightedProperty::find($request->input('id'));
        $highlighted->description = $request->input('description');
        $highlighted->save();
        return back()->with('success-message','Highlighted property description successfully updated');
    }

    // delete
    public function remove($id)
    {
        $item = HighlightedProperty::find($id);
        $item->active = 0;
        $item->save();
        return back()->with('info-message','Property removed as highlighted property');
    }
}
