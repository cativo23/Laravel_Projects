<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $name = $name.'.'.$uploadedFile->getClientOriginalExtension();

        $file = $uploadedFile->storeAs($folder, $name, $disk);

        Storage::disk('s3')->setVisibility($file, 'public');

        $url = Storage::disk('s3')->url($file);

        return $url;
    }
}
