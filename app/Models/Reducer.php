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
class Reducer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'reducers';
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
    public function series(){
        return $this->belongsTo(Series::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function numberOfTransferStages(){
        return $this->belongsTo(NumberOfTransferStages::class,'number_of_transfer_stages');
    }
    public function locationOfAxes(){
        return $this->belongsTo(LocationOfAxes::class,'location_of_axes');
    }
    public function gearRatios(){
        return $this->belongsToMany(GearRatio::class,'gear_ratio_reducer','reducer_id','gear_ratio_id');
    }
    public function buildOptions(){
        return $this->belongsToMany(BuildOption::class,'build_option_reducer','reducer_id','build_option_id');
    }
    public function frontShafts(){
        return $this->belongsToMany(Shaft::class,'front_shaft_reducer','reducer_id','shaft_id');
    }
    public function outputShafts(){
        return $this->belongsToMany(Shaft::class,'output_shaft_reducer','reducer_id','shaft_id');
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
