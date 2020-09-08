<?php


namespace App\Http\Controllers;
use File;

class Image
{


    public function image($photo,$width,$height,$path)
    {
        $new_photo_name = \Intervention\Image\Facades\Image::make($photo);
        $new_photo_path = public_path() . $path;
        $new_photo_name->resize($width, $height)->save($new_photo_path . time() . $photo->getClientOriginalName());
        $new_photo_name->save($new_photo_path . time() . $photo->getClientOriginalName());
        $new_photo_name = $new_photo_name->basename;
        return $new_photo_name;
    }




    public function removeImage($photo)
    {
        if (File::exists(public_path("$photo"))) {
            File::delete(public_path("$photo"));
        }

    }


}
