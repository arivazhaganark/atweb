<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class CustomerSurvey extends Model
{
    //
    protected $primaryKey = 'survey_id';
    public $timestamps = true;
    protected $table='customer_survey';
    protected $fillable=['user_id','customer_name','ontime','response','meeting','meeting_imp','towards','action_c','informing_p','sharing_info','effort','marinating','evaluated1','signature','designation','date','department','seal'];
}
