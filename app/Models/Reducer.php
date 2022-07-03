<?php

namespace App\Models;

use App\Actions\MotorSizesDataToArray;
use App\Models\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
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
    public function details(){
        echo '<li><span>Тип передачи</span><span>'.$this->category->name.'</span></li>';
        if($this->numberOfTransferStages!=null) echo '<li><span>Передаточные ступени</span><span>'.$this->numberOfTransferStages->name.'</span></li>';
        if($this->gearRatios->isNotEmpty()) echo '<li><span>Передаточное<br>отношение</span><span>'.$this->gearRatios->first()->name.'</span></li>';
        if($this->locationOfAxes!=null) echo '<li><span>Передаточное<br>отношение</span><span>'.$this->locationOfAxes->name.'</span></li>';
        echo '
                                                <li><span>Климатическое<br>исполнение</span><span>'.$this->climatic_version.'
                            </span></li>
                                                <li><span>Масса</span><span>'.$this->weight.'
                            </span></li>';
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




}
