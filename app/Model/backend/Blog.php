<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['post_title', 'post_slug', 'post_content' , 'post_date', 'post_author', 'post_status'];
}
