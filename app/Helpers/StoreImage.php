<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;

class StoreImage {

    public static function storeImage($value,$path)
    {
        $name = $value->hashName();
        $value->storeAs('public/images/'.$path.'/', $name);
        $value->storeAs('public/thumbnails/'.$path.'/', $name);
        $previewPath = 'storage/thumbnails/'.$path.'/' . $name;
        $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($previewPath);
        return $name;

    }
}
