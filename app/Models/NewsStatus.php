<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsStatus extends Model
{
    use HasFactory;
    public function news(){
        return $this->hasMany(News::class,'status_id','id');
    }
    public function articles(){
        return $this->hasMany(Articles::class,'status_id','id');
    }
}
