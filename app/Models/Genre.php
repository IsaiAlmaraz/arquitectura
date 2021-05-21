<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable=[//array donde se indica qué campos se van a guardar
        'name',
        'picture',
        'picture_small',
        'picture_medium',
        'picture_big',
        'picture_xl'];
}
