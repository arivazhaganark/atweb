<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table='our_client';
    protected $fillable=['image','link','status'];
}
