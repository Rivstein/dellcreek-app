<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\WebCms;

class UserAccountController extends Controller
{
    /**
     * User profile
     */
    public function profile()
    {
        
        $user = auth()->user();
        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        return view('web.account.profile', compact(
            'user',
            'footerData'
        ));
    }

    /**
     * Contact
     */
    public function contact($type, $id)
    {
        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        if ($type == 'schedule' || $type == 'request') {
            $property = Property::find($id);
            return view('web.account.contact', compact(
                'property',
                'type',
                'footerData'
            ));
        } else {
            abort(404);
        }
    }

    /**
     * User settings
     */
    public function settings()
    {
        $user = auth()->user();
        // footer data
        $footerData = WebCms::where('target','footer')->pluck('content')->toArray();

        return view('web.account.settings', compact(
            'user',
            'footerData'
        ));
    }

    /**
     * User details update
     */
    public function edit(Request $request, $id, $type)
    {
        $user = auth()->user();

        if ($type == 'details') {
            $rules = [
                'name' => 'required',
                'phone_number' => ['required', 'unique:users']
            ];
            $request->validate($rules);
            User::find($id)->update($request->all());
            return redirect('settings')->with('info-message', 'Personal details are up to date');
        }elseif($type == 'subscription'){
            $user->isSubscribed = $request->input('isSubscribed');
            $user->save();
        }
        
        return redirect('settings')->with('info-message', 'Thank you for choosing Dellcreek');
    }
}
