<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;

class StoreImage {

    public static function storeImage($value,$path, $ignoreHash = false, $ignoreThumb = false)
    {
        if($ignoreHash){
            $name = $value;
        }else{
            $name = $value->hashName();

        }
        $value->storeAs('public/images/'.$path.'/', $name);
        if($ignoreThumb){
            return $name;
        }else{
            $value->storeAs('public/thumbnails/'.$path.'/', $name);
            $previewPath = 'storage/thumbnails/'.$path.'/' . $name;
            $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($previewPath);
            return $name;
        }


    }
}
