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
    public function getGearRatio(){
        return $this->gearRatios()->orderBy('name','desc')->first()->name.'-'.$this->gearRatios()->orderBy('name','asc')->first()->name;
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
    public function products(){
        return $this->hasMany(Products::class);
    }
    public function buildOptions(){
        return $this->belongsToMany(BuildOptions::class,'build_option_series','series_id','build_option_id');
    }
    public function gearRatios(){
        return $this->belongsToMany(GearRatio::class,'gear_ratio_series','series_id');
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
