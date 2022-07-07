<?php

namespace App\Models;

use App\Helpers\StoreImage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'news';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
     protected $dates = [
         'created_at'
     ];
//    protected $dateFormat = 'U';
    protected $casts = [
        'created_at' => 'date:d.m.Y',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete('storage/images/news'.$obj->image);
            Storage::delete('storage/thumbnails/news'.$obj->image);
        });
    }
    public function DescAttribute(){
        echo $this->desc;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function status(){
        return $this->belongsTo(NewsStatus::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
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
    public function echoCreatedAt(){
        echo Carbon::parse($this->created_at)->format('d.m.Y');
    }
    public function getStatusName(){
        return $this->status->name;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $path = 'news';

        $this->attributes['image'] = StoreImage::storeImage($value,$path);
//        $this->attributes['image'] ='313';
    }
}
