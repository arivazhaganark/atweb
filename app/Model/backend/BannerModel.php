<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table='banner_list';
    protected $fillable=['name','description','image','status','position'];
}
