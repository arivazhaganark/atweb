<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = ['title', 'slug' ,'image', 'status'];
}
