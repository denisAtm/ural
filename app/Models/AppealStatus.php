<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppealStatus extends Model
{
    use HasFactory;
    protected $table = 'appeals_statuses';

    public function orders(){
        return $this->hasMany(Order::class,'status','id');
    }
    public function questions(){
        return $this->hasMany(QuestionAnswer::class,'status_id','id');
    }
}
