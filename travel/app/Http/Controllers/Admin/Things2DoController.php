<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use App\Http\Controllers\Controller;
use App\Things2Do;
use App\Traits\UploadTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class Things2DoController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $things2do = Things2Do::all();

        return view('things2do.index', compact('things2do'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('things2do.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'intro'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'destination_id'=>'required',
            'link'=>'required',
            'place'=>'required'
        ]);

        $thing2do = new Things2Do([
            'title' => $request->input('title'),
            'intro'=>$request->input('intro'),
            'image'=>'',
            'destination_id'=>$request->input('destination_id'),
            'link'=>'required',
            'place'=>'required'
        ]);

        $destination = Destination::find($request->input('destination_id'));

        $dad = Str::slug($destination->dad()->name ?? $destination->name);

        $site_name = env('APP_NAME')."/".$dad."/".Str::slug($destination->name);

        $thing2do = $this->SaveImage($thing2do, $request, 'image',  $site_name);

        $thing2do->destination_id = $request->input('destination_id');
        $thing2do->link = $request->input('link');
        $thing2do->place = $request->input('place');

        $thing2do->save();

        return redirect()->route('admin.things2do.index')->with('success', 'Thing2Do Saved Correctly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $thing2do =  Things2Do::find($id);
        $destinations= Destination::all();
        return \view('things2do.edit',compact('thing2do', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'intro'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'destination_id'=>'required',
            'link'=>'required',
            'place'=>'required'
        ]);

        $thing2do = Things2Do::find($id);

        $thing2do->title = $request->input('title');
        $thing2do->intro = $request->input('intro');
        $destination = Destination::find($request->input('destination_id'));
        $site_name = env('APP_NAME')."/".Str::slug($destination->dad()->name)."/".Str::slug($destination->name);
        $thing2do = $this->SaveImage($thing2do, $request, 'image',  $site_name);
        $thing2do->destination_id = $request->input('destination_id');

        $thing2do->save();

        return redirect()->route('admin.things2do.index')->with('success', 'Thing2Do Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $hotel =  Things2Do::find($id);
        $hotel->delete();
        return redirect()->route('things2do.index')->with('success', 'Deleted Correctly');
    }

    private function SaveImage(Things2Do $destination, Request $request, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($request->has($folderName)) {
            // Get image file
            $image = $request->file($folderName);
            // Make a image name based on user name and current timestamp
            $name = Str::slug($image->getClientOriginalName()) . '_' . time();
            // Define folder path
            $folder = 'uploads/images/' . $siteName . '/' . $folderName;
            // Upload image
            $saved_image = $this->uploadOne($image, $folder, 's3', $name);
            // Set user profile image path in database to filePath
            $destination->{$folderName} = $saved_image;
        }

        return $destination;
    }
}
