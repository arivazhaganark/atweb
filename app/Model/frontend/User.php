<?php

namespace App\Model\frontend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'salutation', 'first_name', 'last_name', 'title', 'email', 'password', 'partner_type', 'companyname', 'cperson', 'address', 'phone', 'mobile', 'state', 'country', 'status', 'street', 'city', 'zipcode', 'year_of_establishment', 'requirement', 'employee_id', 'designation', 'location', 'no_of_sales', 'no_of_technical', 'annual_revenue', 'sales_territories', 'current_focus', 'product_offer', 'brand_deal', 'video_conf', 'video_steam', 'video_record', 'video_camera', 'microphone', 'reason_for_interest', 'customer_notification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
       
}
