<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutPage extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'about_pages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'slider' => 'array',
        'gallery_images'=> 'array'
    ];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getStatusName(){
        return $this->status->name;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete('storage/images/about', $obj->image);
            Storage::delete('storage/thumbnails/about', $obj->image);
        });
    }

    public function DescAttribute(){
        echo $this->desc;
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function setSliderAttribute($value)
    {
        $images ='';
        if (!empty($value[0])) {
            foreach ($value as $item) {
                $name = $item->hashName();
                $item->storeAs('public/images/about/', $name);
                $item->storeAs('public/thumbnails/about/', $name);
                $previewPath = 'storage/thumbnails/about/' . $name;
                $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($previewPath);
                $images .= $name . ',';
            }
            $this->attributes['slider'] = $images;
        }
        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
    public function setGalleryImagesAttribute($value)
    {

        $images ='';
        if (!empty($value[0])) {
            foreach ($value as $item){
                $name = $item->hashName();
                $item->storeAs('public/images/about/', $name);
                $item->storeAs('public/thumbnails/about/', $name);
                $previewPath = 'storage/thumbnails/about/' . $name;
                $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($previewPath);
                $images.=$name.',';
            }  $this->attributes['gallery_images'] = $images;
        }

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
    public function setImageAttribute($value)
    {
        $name = $value->hashName();
        $value->storeAs('public/images/about/', $name);
        $value->storeAs('public/thumbnails/about/', $name);
        $previewPath = 'storage/thumbnails/about/' . $name;
        $img = Image::make($previewPath)->resize(25, 25, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($previewPath);
        $this->attributes['image'] = $name;

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
}
