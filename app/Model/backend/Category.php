<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $fillable = ['parent', 'name', 'slug', 'position', 'is_active', 'is_deleted'];	
}
