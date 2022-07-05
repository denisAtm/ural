<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['name'];
    protected $identifiableAttribute = 'title';
    public function identifiableAttribute()
    {
        return $this->name;
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
