<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paw extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $table = 'group_mounting_position_on_the_paws';
    protected $fillable = ['name'];
}
