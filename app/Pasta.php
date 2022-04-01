<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{

    protected $fillable = ['src', 'title', 'type', 'cooking_time', 'weight', 'description'];

}
