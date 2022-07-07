<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'series';
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

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function reducers(){
        return $this->hasMany(Reducer::class);
    }
    public function frontShafts(){
        return $this->belongsToMany(Shaft::class,'front_shaft_series','series_id','shaft_id');
    }
    public function outputShafts(){
        return $this->belongsToMany(Shaft::class,'output_shaft_series','series_id','shaft_id');
    }
    public function buildOptions(){
        return $this->belongsToMany(BuildOption::class,'build_option_series','series_id','build_option_id');
    }
    public function gearRatios(){
        return $this->belongsToMany(GearRatio::class,'gear_ratio_series','series_id','gear_ratio_id');
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
