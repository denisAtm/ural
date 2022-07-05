<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class GearRatio extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'gear_ratio';
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
    protected static function booted()
    {
        static::created(function ($value) {
            $reducers = Reducer::where('gearRatioStart','<',$value->name)->where('gearRatioEnd','>',$value->name)->get();
            if($reducers->isNotEmpty()){
                foreach ($reducers as $reducer){
                    $value->reducers()->attach($reducer->id);
                }
            }
            $motors = GearMotor::where('gearRatioStart','<',$value->name)->where('gearRatioEnd','>',$value->name)->get();
            if($motors->isNotEmpty()){
                foreach ($motors as $motor){
                    $value->motors()->attach($motor->id);
                }
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function reducers(){
        return $this->belongsToMany(Reducer::class,'gear_ratio_reducer','gear_ratio_id','reducer_id');
    }
    public function motors(){
        return $this->belongsToMany(GearMotor::class,'gear_ratio_gear_motor','gear_ratio_id','motor_id');
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
