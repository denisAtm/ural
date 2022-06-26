<?php

namespace App\Actions;

use Intervention\Image\Facades\Image;
use App\Models\Image as ImageModel;

class StoreProductMainImage
{
    public function handle($image,$id,$path){

        $i = ImageModel::where('parent_id',$id)->where('status','main')->first();
        $name = $image->hashName();
        $image->storeAs('public/images/'.$path.'/', $name);
        $image->storeAs('public/thumbnails/'.$path.'/', $name);
        $previewPath = 'storage/thumbnails/'.$path.'/' . $name;
        $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($previewPath);
        if($i){
            $i->name = $name;
            $i->save();
        }else{
            $i = new ImageModel();
            $i->name=$name;
            $i->status='main';
            $i->save();
        }

    }
}
