<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class DemoFeedback extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $table='demo_feedback';
    protected $fillable=['user_id','companyname','location','person_in_charge','phoneno','decision','product_name','solution_name','demo_date','demo_pre','demo_pre_text','demo_coordination','demo_coordination_text','tech_detail','tech_detail_text','product_handling','product_handling_text','demo_purpose','demo_purpose_text','customer_name','at_engineer'];
}
