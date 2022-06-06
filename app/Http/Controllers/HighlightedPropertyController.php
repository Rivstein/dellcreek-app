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
        return back();
    }

    // update
    public function update(Request $request)
    {
        $highlighted = HighlightedProperty::find($request->input('id'));
        $highlighted->description = $request->input('description');
        $highlighted->save();
        return back();
    }

    // delete
    public function remove($id)
    {
        $item = HighlightedProperty::find($id);
        $item->active = 0;
        $item->save();
        return back();
    }
}
