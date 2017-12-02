<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table='demo_request';
    protected $fillable=['user_id','request','demo_at','company_name','location','demo_date','alt_date','demo_time','person_incharge','phone','optradio','demon','product_name','solution_name'];
}
