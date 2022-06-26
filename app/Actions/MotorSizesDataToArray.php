<?php

namespace App\Actions;

use App\Helpers\StoreImage;

class MotorSizesDataToArray
{
    public function handle($data){
        $size = [];
        $path = 'products';
        $titles = $data['titleImageSize'];
        $images = $data['imageSize'];

        foreach ($images as $key => $value){
            $value = StoreImage::storeImage($value, $path);
            $size[$key] = [
              'title'=>$titles[$key],
              'image'=>$value
            ];
        }
        return serialize($size);
    }
}
