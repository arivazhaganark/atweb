<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    //
    protected $table='testimonials';
    protected $fillable=['name','designation','email','website','location','testi_title','description','image','status','created_at','updated_at'];
}
