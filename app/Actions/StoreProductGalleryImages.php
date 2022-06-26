<?php

namespace App\Actions;

use App\Models\Image as ImageModel;
use Intervention\Image\Facades\Image;

class StoreProductGalleryImages
{
    public function handle($images,$id,$path){

        $i = ImageModel::where('parent_id',$id)->where('status','gallery')->get();
        if($i){
            $i->delete();
        }
        foreach ($images as $image){
            $name = $image->hashName();
            $image->storeAs('public/images/'.$path.'/', $name);
            $image->storeAs('public/thumbnails/'.$path.'/', $name);
            $previewPath = 'storage/thumbnails/'.$path.'/' . $name;
            $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($previewPath);

                $i = new ImageModel();
                $i->name=$name;
                $i->status='gallery';
                $i->save();
        }



    }
}
