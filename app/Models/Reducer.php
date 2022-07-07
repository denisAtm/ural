<?php

namespace App\Models;

use App\Actions\MotorSizesDataToArray;
use App\Filters\QueryFilter;
use App\Models\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
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
//    public function getMainImageThumbnail(){
//        $image = $this->images()->where('position','1')->first();
//        $path = 'storage/thumbnails/products/'.$image->name;
//        return '<img src = "{{asset('.$path.')}}" alt="image">';
//    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::delete('/public/images/products/reducers/'.$obj->image);
            foreach ($obj->images as $image){
                Storage::delete('/public/images/products/reducers/'.$image->name);
            }
            Storage::delete('/public/thumbnails/products/reducers/'.$obj->image);
            $obj->images()->delete();
        });
    }

    public function DescAttribute(){
        echo $this->desc;
    }
    public function echoSize(){
        echo $this->size;
    }
    public function gearRatioRange(){
        return 'от '.$this->series->gearRatios()->orderBy('name','asc')->first()->name.' до '.$this->series->gearRatios()->orderBy('name','desc')->first()->name;
    }
    public function details(){
        echo '<li><span>Тип передачи</span><span>'.$this->category->name.'</span></li>';
        if($this->locationOfAxes!=null) echo '<li><span>Расположение осей</span><span>'.$this->locationOfAxes->name.'</span></li>';
        if($this->numberOfTransferStages!=null) echo '<li><span>Количество ступеней</span><span>'.$this->numberOfTransferStages->name.'</span></li>';
        if($this->series->gearRatios->isNotEmpty()) echo '<li><span>Передаточное<br>отношение</span><span>'.$this->gearRatioRange().'</span></li>';
        echo '<li><span>Крутящий момент Н*м</span><span>'.$this->torque.'</span></li>
<li><span>Масса</span><span>'.$this->weight.'</span></li>';
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
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
    public function questions(){
        return $this->morphMany(QuestionAnswer::class,'productable');
    }
    public function numberOfTransferStages(){
        return $this->belongsTo(NumberOfTransferStages::class,'number_of_transfer_stages_id');
    }
    public function locationOfAxes(){
        return $this->belongsTo(LocationOfAxes::class,'location_of_axes_id');
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
    public function QuestionAnswer(){
        return $this->hasMany(QuestionAnswer::class,'product_id','id');
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

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d.m.Y');
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */




}
