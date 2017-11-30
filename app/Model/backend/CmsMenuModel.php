<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class CmsMenuModel extends Model
{
    //
     protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'cms_menu';
    protected $fillable = ['name','status'];
}
