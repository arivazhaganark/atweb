<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='product';
    protected $fillable=['name','slug','cms_id','features','technical_specification','description','benefits','data_sheet','image','status','created_at','updated_at'];
}
