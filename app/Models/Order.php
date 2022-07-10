<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';
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
    public function openUri($crud = false)
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href="'.$this->uri.'" data-toggle="tooltip" title="Ссылка на товар."><i class="fa fa-search"></i> Перейти на страницу <br>товара</a>';
    }
    public static function is_serial($string) {
        return (@unserialize($string) !== false);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function status(){
        return $this->belongsTo(AppealStatus::class,'status_id');
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
    public function getContentAttribute($value){
        if(self::is_serial($value)){
            $str = '';
            foreach(unserialize($value) as $key=>$value){
                $key = str_replace('_',' ',$key);
                $str.='<li><span>'.$key.'</span> <b>'.$value.'</b></li>';
            }
            return $str;
        }else{
            return $value;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
