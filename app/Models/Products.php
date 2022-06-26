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
    public function categories(){
        return $this->belongsToMany(Categories::class,'category_product','product_id','category_id');
    }
    public function typeOfTransmission(){
        return $this->belongsTo(TypeOfTransmission::class,'type_of_transmission');
    }
    public function numberOfTransferStages(){
        return $this->belongsTo(NumberOfTransferStages::class,'number_of_transfer_stages');
    }
    public function locationOfAxes(){
        return $this->belongsTo(LocationOfAxes::class,'location_of_axes');
    }
    public function gearRatio(){
        return $this->belongsTo(GearRatio::class,'gear_ratio');
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
    public function setSizeAttribute($value, MotorSizesDataToArray $action, Request $request){
        $value = $action->handle($request);
        $this->attributes['size'] = $value;
    }
}
