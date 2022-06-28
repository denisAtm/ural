<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

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
    public function series(){
        return $this->belongsTo(MotorSeries::class);
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
    public function outputShafts(){
        return $this->belongsToMany(Shaft::class,'output_shaft_reducer','reducer_id','shaft_id');
    }
    public function paws(){
        return $this->belongsToMany(Paws::class,'mounting_position_on_the_paw_gear_motor','motor_id','paw_id');
    }
    public function flanges(){
        return $this->belongsToMany(Flange::class,'mounting_position_on_the_flange_gear_motor','motor_id','flange_id');
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
}
