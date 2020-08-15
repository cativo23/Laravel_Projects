<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Destination;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Str;

class GalleryController extends Controller
{
    use UploadTrait;

    //TODO: Try to reduce duplicated code


    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $galleries = Gallery::all();

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $sites = Destination::all();
        return view('galleries.create', compact('sites'));
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
            'destination_id'=>'required',
        ]);

        $gallery = new Gallery([
            'name' => $request->input('name'),
            'destination_id'=>$request->input('destination_id'),
        ]);

        $gallery->destination_id = $request->input('destination_id');

        $gallery->save();

        $images =  $request->file('image_gallery');
        $captions = $request->input('caption_image');

        $destination = Destination::find($request->input('destination_id'));
        $dad = Str::slug($destination->dad()->name ?? $destination->name);
        $site_name = env('APP_NAME')."/".$dad."/".Str::slug($destination->name);

        if ($images){
            for($i =0; $i < count($images);$i++) {
                $image = new ImageGallery([
                    'title' => $captions[$i],
                ]);

                $image->gallery_id = $gallery->id;

                $image = $this->SaveImageGallery($image, $images[$i], 'image', $site_name);
                $image->save();
            }
        }

        return redirect(route('admin.galleries.index'))->with('success', 'Gallery Saved Correctly!');

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
        $gallery =  Gallery::find($id);
        $destinations = Destination::all();
        return view('galleries.edit',compact('gallery', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'destination_id'=>'required',
        ]);

        $hotel = Gallery::find($id);

        $hotel->name = $request->input('name');
        $hotel->destination_id = $request->input('destination_id');

        $hotel->save();

        $image_caption_view = $request->input('caption_image');
        $image_view = $request->file('image_gallery');

        $images = $hotel->images;
        $destination = Destination::find($hotel->destination_id);
        $dad = Str::slug($destination->dad()->name ?? $destination->name);
        $site_name = env('APP_NAME')."/".$dad."/".Str::slug($destination->name);
        for ($i=0; $i <count($images); $i++){
            if (array_key_exists($i, $image_caption_view)){
                $images[$i]->title = $image_caption_view[$i];

                if ($image_view !=null && array_key_exists($i, $image_view))
                    $images[$i] = $this->SaveImageGallery($images[$i], $image_view[$i], 'image',  $site_name);

                $images[$i]->save();
            }else{
                $images[$i]->delete();
            }
        }

        $images_new =  $request->file('image_gallery_new');
        $captions_new = $request->input('caption_image_new');


        if ($images_new){
            for($i =0; $i < count($images_new);$i++) {
                $image = new ImageGallery([
                    'title' => $captions_new[$i],
                ]);

                $image->gallery_id = $hotel->id;

                $image = $this->SaveImageGallery($image, $images_new[$i], 'image', $site_name);
                $image->save();
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        $hotel =  Gallery::find($id);
        $images =  $hotel->images;
        if ($images){
            if (is_array($images)){
                $images->each->delete();
            }else{
                $images->each->delete();
            }
        }
        $hotel->delete();
        return redirect()->route('admin.galleries.index')->with('succes', 'Gallery Deleted Correctly');
    }

    private function SaveImageGallery(ImageGallery $destination, UploadedFile $image, string $folderName, string $siteName)
    {
        // Check if a profile image has been uploaded
        if ($image) {
            // Make a imag
            //e name based on user name and current timestamp
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
