<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Articles extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'articles';
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
    public function echoContent(){
        echo $this->content;
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
        return $this->belongsToMany(Tag::class,'article_tag','article_id');
    }
    public function category(){
        return $this->belongsTo(CategoriesOfArticles::class,'category_id','id');
    }
    public function publishAtAttribute(){
        return Carbon::parse($this->publish_at)->format('d.m.Y');
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
    public function setPublishAtAttribute($value){
        if($value==null && $this->status_id!=5){
            $this->attributes['publish_at']=now();
        }else{
            $this->attributes['publish_at']=$value;
        }
    }

}
