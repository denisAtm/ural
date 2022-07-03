<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CategoriesOfArticles extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories_of_articles';
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




    public static function tree(){
        $allCategories = CategoriesOfArticles::get();
        $rootCategories = $allCategories->whereNull('parent_id');
        self::formatTree($rootCategories,$allCategories);
        return $rootCategories;
    }
    private static function formatTree($categories, $allCategories){
        foreach($categories as $category){
            $category->children = $allCategories->where('parent_id',$category->id)->values();
            if($category->children->isNotEmpty()){
                self::formatTree($category->children,$allCategories);
            }
        }
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function parent(){
        return $this->belongsTo(self::class,'parent_id','id');
    }
    public function categories(){
        return $this->hasMany(self::class,'parent_id','id');
    }
    public function childrenCategories(){
        return $this->hasMany(self::class,'parent_id','id')->with('categories');
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
