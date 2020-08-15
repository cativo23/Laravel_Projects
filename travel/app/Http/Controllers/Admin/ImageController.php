<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Hotels;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\Traits\UploadTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ImageController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
       // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $images = ImageGallery::all();

        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('images.create', compact('galleries'));
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_id'=>'required',
        ]);

        $image = new ImageGallery([
            'title' => $request->input('title'),
            'image'=>'',
            'gallery_id'=>$request->input('gallery_id'),
        ]);

        $site_name = env('APP_NAME');
        $image = $this->SaveImage($image, $request, 'image'  , $site_name);

        $image->gallery_id = $request->input('gallery_id');

        $image->save();

        return redirect()->route('admin.images.index')->with('success', 'Image Saved Correctly!');
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
        $image =  ImageGallery::find($id);
        $galleries = Gallery::all();
        return \view('images.edit',compact('image', 'galleries'));
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
        ]);

        $hotel = ImageGallery::find($id);

        $hotel->title = $request->input('name');
        $site_name = env('APP_NAME');
        $hotel = $this->SaveImage($hotel, $request, 'image'  , $site_name);
        $hotel->gallery_id = $request->input('destination_id');

        $hotel->save();

        return redirect()->route('images.index')->with('success', 'Thing2Do Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $hotel =  ImageGallery::find($id);
        $hotel->delete();
        return redirect()->route('images.index')->with('success', 'Image Deleted Correctly');
    }

    private function SaveImage(ImageGallery $imageGallery, Request $request, string $folderName, string $siteName)
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
            $imageGallery->{$folderName} = $saved_image;
        }

        return $imageGallery;
    }
}
