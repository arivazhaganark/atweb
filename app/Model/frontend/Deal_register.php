<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class Deal_register extends Model
{
    //
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table='deal_register';
    protected $fillable=['user_id','endcustomer','personincharge','designation','mobileno','landno','email','opportunity_products','application','opportunity_value','tender_private','expected_closing_date','other_accessories_products_needed', 'view_my_deals', 'resources', 'status'];
}
