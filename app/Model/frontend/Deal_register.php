<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class Deal_register extends Model {

    //
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $table = 'deal_register';
    protected $fillable = ['user_id', 'endcustomer', 'personincharge', 'designation', 'mobileno', 'landno', 'email', 'opportunity_products', 'application', 'opportunity_value', 'tender_private', 'expected_closing_date', 'other_accessories_products_needed', 'view_my_deals', 'resources', 'status'];

    public static function products() {
        $products = array(
            'tely200' => 'Tely 200',
            'tely_hd_pro' => 'Tely HD Pro',
            'kickle' => 'Kickle',
            'pr_hd_basic' => 'PR-HD-Basic',
            'pr_hd_extreme' => 'PR-HD-Extreme',
            'pr_hydra' => 'PR-Hydra',
            'presentation_server' => 'Presentation Server',
            'pr_aries' => 'PR-Aries',
            'pr_gemini' => 'PR-Gemini',
            'pr_mini' => 'PR-Mini',
            'pr_leo' => 'PR-Leo',
            'VSTOR_premium' => 'VSTOR Premium',
            'roomy' => 'Roomy',
            'klick' => 'Klick',
            'snap' => 'Snap',
            'konnect' => 'Konnect',
            'Voice Tracker I' => 'Voice Tracker I',
            'Voice Tracker II' => 'Voice Tracker II',
            'Avermedia 313' => 'Avermedia 313',
            'Avermedia 330' => 'Avermedia 330',
            'Visualiser MX-1' => 'Visualiser MX-1',
            'Cloudliine' => 'Cloudliine',
        );

        return $products;
    }

    public static function applications() {
        $applications = array(
            'Smart Classroom' => 'Smart Classroom',
            'Virtual Classroom' => 'Virtual Classroom',
            'Lecture Capture-Digital Library' => 'Lecture Capture-Digital Library',
            'eLearning-Distance Education' => 'eLearning-Distance Education',
            'Performance Capture System' => 'Performance Capture System',
            'Surveillance' => 'Surveillance',
            'Network Security' => 'Network Security',
            'Wireless Campus' => 'Wireless Campus',
            'Telemedicine' => 'Telemedicine',
            'Surgery Recording' => 'Surgery Recording',
            'ICU Interaction' => 'ICU Interaction',
            'Ambulance Video System' => 'Ambulance Video System',
            'Patient Information System Display System' => 'Patient Information System Display System',
            'Board Room-AV' => 'Board Room-AV',
            'Small Conference/Huddle Rooms' => 'Small Conference/Huddle Rooms',
            'Mobility Conferencing' => 'Mobility Conferencing',
            'Digital Training' => 'Digital Training',
            'Board Room-AV' => 'Board Room-AV',
            'Information Display Systems Signage' => 'Information Display Systems Signage',
            'Wired Network' => 'Wired Network',
            'Wireless Network' => 'Wireless Network',
            'Conference Rooms' => 'Conference Rooms',
            'Auditoriums' => 'Auditoriums',
            'Guest Information Display Systems' => 'Guest Information Display Systems',
            'Wireless Hotspot' => 'Wireless Hotspot',
        );

        return $applications;
    }

    public static function tenders() {
        $tenders = array(
            'tender' => 'Tender',
            'private' => 'Private',
        );
        return $tenders;
    }

}
