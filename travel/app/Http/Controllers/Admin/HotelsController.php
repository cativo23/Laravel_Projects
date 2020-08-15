<?php

namespace App\Http\Controllers\Admin;

use App\Hotels;
use App\Destination;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HotelsController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $hotels = Hotels::all();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $sites = Destination::all();
        return view('hotels.create', compact('sites'));
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
            'name' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'destination_id'=>'required',
            'link'=>'required',
        ]);

        $hotel = new Hotels([
            'name' => $request->input('name'),
            'image'=>'',
            'destination_id'=>$request->input('destination_id'),
            'link'=>'required',
        ]);


        $site_name = env('APP_NAME')."/hotels/".$request->input('destination_id');
        $hotel = $this->SaveImage($hotel, $request, 'image'  , $site_name);

        $hotel->destination_id = $request->input('destination_id');
        $hotel->link = $request->input('link');

        $hotel->save();

        return redirect(route('admin.hotels1.index'))->with('success', 'Thing2Do Saved Correctly!');
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
     * @return Renderable
     */
    public function edit($id)
    {
        $hotel =  Hotels::find($id);
        $sites = Destination::all();
        return \view('hotels.edit',compact('hotel', 'sites'));
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
            'name' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'destination_id'=>'required',
            'link'=>'required',
        ]);

        $hotel = Hotels::find($id);

        $hotel->name = $request->input('name');
        $hotel->link = $request->input('link');
        $site_name = env('APP_NAME')."/hotels/".$request->input('destination_id');
        $hotel = $this->SaveImage($hotel, $request, 'image'  , $site_name);
        $hotel->destination_id = $request->input('destination_id');

        $hotel->save();

        return redirect()->route('admin.hotels1.index')->with('success', 'Thing2Do Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $hotel =  Hotels::find($id);
        Log::info("what");
        $hotel->delete();
        return redirect()->route('admin.hotels1.index')->with('success', 'Hotel Deleted Correctly');
    }

    private function SaveImage(Hotels $hotel, Request $request,string $folderName, string $siteName)
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
            $hotel->{$folderName} = $saved_image;
        }

        return $hotel;
    }
}
