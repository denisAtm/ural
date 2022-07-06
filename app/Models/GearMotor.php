<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class GearMotor extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'gear_motors';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete('/public/images/products/gear-motors/'.$obj->image);
            foreach ($obj->images as $image){
                Storage::delete('/public/images/products/gear-motors/'.$image->name);
            }
            Storage::delete('/public/thumbnails/products/gear-motors/'.$obj->image);
            $obj->images()->delete();
        });
    }
    public function DescAttribute(){
        echo $this->desc;
    }
    public function details(){
        echo '<li><span>Тип передачи</span><span>'.$this->category->name.'</span></li>';
        if($this->numberOfTransferStages!=null) echo '<li><span>Передаточные ступени</span><span>'.$this->numberOfTransferStages->name.'</span></li>';
        if($this->gearRatios->isNotEmpty()) echo '<li><span>Передаточное<br>отношение</span><span>'.$this->gearRatioStart.'-'.$this->gearRatioEnd.'</span></li>';
        if($this->locationOfAxes!=null)
            echo '<li><span>Расположение осей</span><span>'.$this->locationOfAxes->name.'</span></li>';
//        echo '
//                                                <li><span>Масса</span><span>'.$this->weight.'
//                            </span></li>';
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function questions(){
        return $this->morphMany(QuestionAnswer::class,'productable');
    }
    public function series(){
        return $this->belongsTo(MotorSeries::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function numberOfTransferStages(){
        return $this->belongsTo(NumberOfTransferStages::class,'number_of_transfer_stages_id');
    }
    public function locationOfAxes(){
        return $this->belongsTo(LocationOfAxes::class,'location_of_axes_id');
    }
    public function gearRatios(){
        return $this->belongsToMany(GearRatio::class,'gear_ratio_gear_motor','motor_id','gear_ratio_id');
    }
    public function outputShafts(){
        return $this->belongsToMany(Shaft::class,'output_shaft_gear_motor','motor_id','shaft_id');
    }
    public function paws(){
        return $this->belongsToMany(Paws::class,'mounting_position_on_the_paw_gear_motor','motor_id','paw_id');
    }
    public function flanges(){
        return $this->belongsToMany(Flange::class,'mounting_position_on_the_flange_gear_motor','motor_id','flange_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
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
}
