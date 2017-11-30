<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Model\frontend\User;
use Illuminate\Http\Request;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\PartnerRegister;
use App\Mail\PartnerAdmin;
use App\Mail\ClientAdmin;
use App\Mail\ClientRegister;
use App\Mail\VisitorAdmin;
use App\Mail\VisitorRegister;
use App\Model\backend\Setting;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('guest');
    //}

    public function getRegisterForm()
    {
        return view('frontend.client_register');
    }	
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  request  $request
     * @return User
     */
    protected function saveRegisterForm(Request $request)
    { 
        $input = $request->all(); 

        if($input['type']=='P') {
            $name = $input['namep'];
            $name = explode(' ', $name);
            $last_name = '';
            if(count($name)==1) {            
                $first_name = $name[0];                
            } else {
                $first_name = $name[0];
                $last_name = $name[1];
            }
            $data = array(
                'type' => 'P', 
                'partner_type' => implode(',', $input['partner_type']), 
                'first_name' => $first_name,
                'last_name' => $last_name,     
                'companyname' =>$input['company'],
                'address' =>$input['address'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'state' => $input['state'],
                'year_of_establishment' =>$input['yearbusiness'],
                'no_of_sales' => $input['salespersonal'],
                'no_of_technical' => $input['supporteng'],
                'annual_revenue' => $input['annualrev'],
                'sales_territories' => $input['salesterr'],
                'current_focus' => implode(',', $input['segment']),
                'product_offer' => $input['productso'],
                'brand_deal' =>$input['brabdsd'],
                'video_conf' =>$input['video_conf'],
                'video_steam' =>$input['video_steam'],
                'video_record' =>$input['video_record'],
                'video_camera' =>$input['video_camera'],
                'microphone' =>$input['microphone'],
                'reason_for_interest' => implode(',', $input['reason']),
                'status' => 'N'
            );
        } else if($input['type']=='V') {
            $name = $input['visitors_name'];
            $name = explode(' ', $name);
            $last_name = '';
            if(count($name)==1) {            
                $first_name = $name[0];                
            } else {
                $first_name = $name[0];
                $last_name = $name[1];
            }
            $data = array(
                'type' => 'V', 
                'first_name' => $first_name,
                'last_name' => $last_name,     
                'email' =>$input['visitors_email'],
                'password' => bcrypt($input['visitors_password']),
                'status' => 'Y'
            );
        } else {
            $name = $input['customer_usename'];
            $name = explode(' ', $name);
            $last_name = '';
            if(count($name)==1) {            
                $first_name = $name[0];                
            } else {
                $first_name = $name[0];
                $last_name = $name[1];
            }
            $data = array(
                'type' => $input['type'],   
                'first_name' => $first_name,
                'last_name' => $last_name,              
                'companyname' => $input['company_name'],
                'cperson' => $input['cperson'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'location' => $input['location'],
                'customer_notification' => $input['optradio'],
                'status' => 'N'
            );
        }

        $captcha = isset($input['g-recaptcha-response'])?$input['g-recaptcha-response']:'';
        if($captcha=='') {
            echo 'captcha-required';
        } else {
            $user = User::create($data);        
            if($user->id) {
                $usr = User::where('id', $user->id)->select('type')->first();
                if($usr->type=='P') {
                    $user = User::where('email', $input['email'])->first();
                    $admin_email = 'channelsales@atnetindia.net';
                    Mail::to($admin_email)->queue(new PartnerAdmin); 
                    Mail::to($user)->queue(new PartnerRegister); 
                    echo 'success';
                }
                if($usr->type=='C') {
                    $setting = Setting::where('id', 1)->first();
                    $admin_email = $setting->from_email;
                    Mail::to($admin_email)->queue(new ClientAdmin); 
                    Mail::to($user)->queue(new ClientRegister); 
                    echo 'success';
                }
                if($usr->type=='E') {
                    echo 'success';
                }
                if($usr->type=='V') {
                    $user = User::where('email', $input['visitors_email'])->first();
                    $admin_email = 'sales@atnetindia.net';
                    Mail::to($admin_email)->queue(new VisitorAdmin); 
                    Mail::to($user)->queue(new VisitorRegister); 
                    echo 'success';
                }
            } else {
                echo 'User not register. Please try again';
            }   
        }     
    }

    public function isEmailExist(Request $request) {
        if($request->input('email')!='')
            $user_email = $request->input('email');
        else
            $user_email = $request->input('visitors_email');

        $user_exist_count = User::where('email', $user_email)->count();
        if($user_exist_count==1) {
            return "false";
        } else {
            return "true";
        }
    }

}
