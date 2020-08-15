<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Destinations_ImagesDataTable;
use App\Destination;
use App\Http\Controllers\Controller;
use App\ImageFodor;
use App\Traits\UploadTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\View\View;
use mysql_xdevapi\Exception;
use ZipArchive;

class DownloadImagesController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Destinations_ImagesDataTable $dataTable
     * @return Application|Factory|View
     */
    public function index(Destinations_ImagesDataTable $dataTable)
    {
        return $dataTable->render('admin.index_images');
    }

    public function images($destination_id)
    {
        $destination = Destination::findOrFail($destination_id);
        $images_fodor = $destination->images;
        return \view('admin.images_download', compact('images_fodor', 'destination_id'));
    }


    public function download($destination_id)
    {
        $destination = Destination::findOrFail($destination_id);
        $images_fodor = $destination->images;

        # create new zip object
        $zip = new ZipArchive();

        # create a temp file & open it
        $tmp_file = tempnam('.', '');
        $zip->open($tmp_file, ZipArchive::CREATE);

        foreach ($images_fodor as $image) {
            $download_file = @file_get_contents($image->image_url, true);
            if ($download_file === false) {
                //
            }else{
                $zip->addFromString(basename($image->image_url), $download_file);
            }
        }

        # close zip
        $zip->close();

        $zip_name = $destination->name . '_Images';

        # send the file to the browser as a download
        header('Content-disposition: attachment; filename="' . $zip_name . '.zip"');
        header('Content-type: application/zip');
        readfile($tmp_file);
        unlink($tmp_file);

        return \view('admin.images_download', compact('images_fodor', 'destination_id'));
    }


    public function update_images(Request $request, $destination_id)
    {

        $ids = request('id');
        $image_urls = $request->file('image_url');

        $site_name = env('APP_NAME');

        if ($image_urls){
            foreach ($ids as $id) {
                $image = ImageFodor::findOrFail($id);
                if (array_key_exists($id, $image_urls)) {
                    $image = $this->SaveImage($image, $image_urls[$id], 'image_url', $site_name);
                }
                $image->save();
            }
        }

        return redirect(route('admin.download.images', $destination_id));
    }

    private function SaveImage(ImageFodor $imageGallery, UploadedFile $file, string $folderName, string $siteName)
    {
        // Get image file
        $image = $file;
        // Make a image name based on user name and current timestamp
        $name = Str::slug($image->getClientOriginalName()) . '_' . time();
        // Define folder path
        $folder = 'uploads/images/' . $siteName . '/' . $folderName;
        // Upload image
        $saved_image = $this->uploadOne($image, $folder, 's3', $name);
        // Set user profile image path in database to filePath
        $imageGallery->{$folderName} = $saved_image;

        return $imageGallery;
    }

}
