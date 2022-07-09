<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;

class QuestionAnswer extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = 'question_answer';
    protected $guarded = ['id'];

    public function productable(){
        return $this->morphTo();
    }
    public function status(){
        return $this->belongsTo(AppealStatus::class);
    }
    public function echoProductName(){
        return $this->productable()->name;
    }
    public function openUri($crud = false)
    {
        return '<a class="btn btn-sm btn-link" target="_blank" href="'.$this->link.'" data-toggle="tooltip" title="Ссылка на товар."><i class="fa fa-search"></i> Перейти на страницу <br>товара</a>';
    }
}
