<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Index page with all team meambers
     */
    public function index()
    {
        $team = Staff::all();

        return view('admin.cms.team', compact(
            'team'
        ));
    }

    // create page
    public function create()
    {  
        return view('admin.cms.team_create');
    }

    /**
     * Create a new team member
     */
    public function store(Request $request)
    {  
        $data = $request->all();

        // store main photo and return path
        $path = $request->file('photo')->store('public/staff');
        $data['photo'] = explode('public/', $path)[1];
        $data['created_by'] = auth()->user()->id;        

        // create data in staff table
        Staff::create($data);

        return redirect('content_manager_team')->with('success-message','Team member created successfully');
    }

    // edit page
    public function edit($id)
    {  
        $team = Staff::find($id);

        return view('admin.cms.team_edit', compact(
            'team'
        ));
    }

    /**
     * Updates team member details
     */
    public function update(Request $request , $id)
    {  
        $data = $request->all();

        // update main photo if set and return path
        if(isset($data['photo'])){
            $path = $request->file('photo')->store('public/staff');
            $data['photo'] = explode('public/', $path)[1];
        }

        $data['updated_by'] = auth()->user()->id;

        // update row in staff table by id
        Staff::find($id)->update($data);

        return redirect('content_manager_team')->with('info-message','Team member info updated');
    }

    /**
     * deletess team member details based on id
     */
    public function delete(Request $request , $id)
    {  
        $data = $request->all();

        // delete row in staff table by id
        Staff::find($id)->delete($data);

        return redirect('content_manager_team')->with('info-message','Team member info deleted');
    }

}
