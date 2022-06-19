<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class UserAccountController extends Controller
{  
    /**
     * User profile
     */
    public function profile()
    {
        $user = auth()->user();

        return view('web.account.profile',compact(
            'user'
        ));
    }

    /**
     * Contact
     */
    public function contact($type, $id)
    {
        if($type == 'schedule' || $type == 'request'){
            $property = Property::find($id);
            return view('web.account.contact',compact(
                'property',
                'type'
            ));    
        }
        else{
            abort(404);
        }
    }
}  
