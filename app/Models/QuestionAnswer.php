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
}
