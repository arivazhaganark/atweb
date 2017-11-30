<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Cms_Model extends Model
{
    //
    protected $table='cms';
    protected $fillable=['slug','cat_id','parent','short_desc','content','footer_title','image','page_type','page_linktype','seo_title','seo_description','seo_keywords','columns','position','status','page_link'];
}
