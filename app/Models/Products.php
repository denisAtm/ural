<?php

namespace App\Models;

use App\Actions\MotorSizesDataToArray;
use App\Helpers\StoreImage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Image as ImageModel;
class Products extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
//     protected $hidden = ['size'];
    // protected $dates = [];
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
    public function getMainImageThumbnail(){
        $image = $this->images()->where('position','1')->first();
        $path = 'storage/thumbnails/products/'.$image->name;
        return '<img src = "{{asset('.$path.')}}" alt="image">';
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete('storage/images/products/', $obj->image);
            Storage::delete('storage/thumbnails/products/', $obj->image);
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
    public function series(){
        return $this->belongsTo(Series::class);
    }
    public function images(){
        return $this->hasMany(ImageModel::class);
    }
    public function numberOfTransferStages(){
        return $this->belongsTo(NumberOfTransferStages::class,'number_of_transfer_stages');
    }
    public function locationOfAxes(){
        return $this->belongsTo(LocationOfAxes::class,'location_of_axes');
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
    public function getStatusName(){
        return $this->status->name;
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d.m.Y');
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */


    public function setImageAttribute($value)
    {
        $path = 'products';
        $this->attributes['image'] = StoreImage::storeImage($value,$path);
    }
//    public function setSizeAttribute($value, MotorSizesDataToArray $action, Request $request){
//        $value = $action->handle($request);
//        $this->attributes['size'] = $value;
//    }
}
