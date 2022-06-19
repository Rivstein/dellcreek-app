<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebCms;

class CmsController extends Controller
{
    // cms index
    public function index()
    {
        // get target column, check duplication and add to array
        $targetItems = WebCms::groupBy('target')->pluck('target')->toArray();

        return view('admin.cms.index', compact(
            'targetItems'
        ));
    }

    /**
     * Setup web cms targets to database
     */
    public function setup()
    {
        $targets = $this->getTargets();

        foreach ($targets as $target) {
            $check = WebCms::where('name', $target['name'])->first();
            if(!$check){
                WebCms::create($target);
            }else{
                continue;
            }
        }

        return back()->with('info-message' , 'Website content setup complete');
    }

    /**
     * Return data based on target
     */
    public function targetType($target)
    {
        $targetName = $target;
        // set variables for data from db and routes
        $webContents = WebCms::where('target',$target)->get();

        return view('admin.cms.target', compact(
            'targetName',
            'webContents',
        ));
    }

    /**
     * Return data based on id
     */
    public function editType($id)
    {
        $section = WebCms::where('id', $id)->first();
        
        return view('admin.cms.edit', compact(
            'section'
        ));
    }

    /**
     * update data
     */
    public function upload(Request $request, $id)
    {
        $section = WebCms::find($id);
        $section->update($request->all());
        return redirect('content_manager/'.$section->target)->with('info-message','Section Updated');
    }


    /**
     * Set web_cms table name,target and URL with static data
     * Data should be seeded in this order
     * Below data arrangement is immutable
     */
    private function getTargets()
    {
        return [
            ['name' => 'footer-text', 'target' => 'Footer', 'url' => url('/#footer-text')],
            ['name' => 'facebook', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'twitter', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'instagram', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'whatsapp', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'phonenumber', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'location', 'target' => 'Footer', 'url' => url('/')],
            ['name' => 'about-text', 'target' => 'About', 'url' => url('about_us#about_us-text')],
            ['name' => 'goal', 'target' => 'About', 'url' => url('about_us#goal')],
            ['name' => 'mission', 'target' => 'About', 'url' => url('about_us#mission')],
            ['name' => 'focus', 'target' => 'About', 'url' => url('about_us#focus')]
        ];
    }
}
