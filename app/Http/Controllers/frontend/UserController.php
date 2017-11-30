<?php

namespace App\Http\Controllers\frontend;

use App\Model\frontend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Model\backend\FileManagerModel;
use App\Model\frontend\Deal_register;
use App\Model\frontend\DemoRequest;
use App\Model\frontend\DemoFeedback;
use App\Model\frontend\CustomerSurvey;
use Hash;
use Redirect;
use Mail;
use App\Mail\DemoRequestAdmin;
use App\Mail\DemoRequestUser;
use App\Mail\DemoFeedbackAdmin;
use App\Mail\DemoFeedbackUser;
use App\Mail\DealRegisterAdmin;
use App\Mail\DealRegisterUser;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('home');
    }
    
    public function dashboard()
    {        
        $user_id = Auth::guard('user')->user()->id;
        $deal_reg = Deal_register::where('user_id', $user_id)->where('status', 1)->get();
        return view('frontend.dashboard', compact('deal_reg'));        
    }

    public function change_password()
    {        
        return view('frontend.user_change_password');        
    }

    public function change_password_store(Request $request, $guard ='user') {
        $inputs = $request->all();
        $old_password = Hash::make($inputs['new_password']);

        $data = array(
            "password" => $old_password
        );
        if (Auth::guard($guard)->check()) {
            $user_details = Auth::guard($guard)->user(); 
            $current_user_id = $user_details->id;
        }
        $update_row_cnt = User::select('*')->where('id', $current_user_id)->update($data);

        Session::flash('message', 'Password has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('user/change_password');
    }

    public function OldPasswordCheck($guard = 'user') {
        $input = Input::all();
        $old_password = Hash::make($input['old_password']); 
        if (Auth::guard($guard)->check()) {
            $user_details = Auth::guard($guard)->user();
            $current_password = $user_details->password;
            $current_user_id = $user_details->id;
            if (password_verify($input['old_password'], $current_password)) {
                return "true";
            } else {
                return "false";
            }
        } else {
            return "false";
        }
    }

    public function NewPasswordCheck() {
        $input = Input::all();
        $new_password = $input['new_password'];
        $old_password = $input['old_password'];
        if ($new_password == $old_password) {
            return "false";
        } else {
            return "true";
        }
    }

    public function files() {
        return view('frontend.resources');
    }

    public function ajaxfm() {
        $type = auth()->guard('user')->user()->type;
        //$type = 'P';
        $filemanager = FileManagerModel::where('file_id', '<>', 0);
        if(isset($_POST['file_id']) && $_POST['file_id']!='') {
            $filemanager = $filemanager->where('parent_id', $_POST['file_id']);
            $filemanager = $filemanager->where('permission', 'like', '%'.$type.'%')->get();
        } else {
            $filemanager = $filemanager->where('parent_id', 0);
            $filemanager = $filemanager->where('permission', 'like', '%'.$type.'%')->get();
        }

        if (isset($_POST)) {
            $dir = @$_POST['dir'];
        } else  {
            $dir = @$_GET['dir'];
        }
        
        if($dir!='') 
            $path = base_path().'/public/uploads/filemanager/'.$dir;
        else
            $path = base_path().'/public/uploads/filemanager/';

        $i = 1;
        if(count($filemanager)>0) {
            foreach ($filemanager as $f) {
                if($dir!='')
                  $res = "'".$dir.'/'.$f->file_name."'";
                else
                  $res = "'".$f->file_name."'";
                if ($f === '.' or $f === '..') continue;

                if (is_dir($path . '/' . $f->file_name)) {          
                    echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                       <div style="text-align: center;">
                         <a href="javascript:" onclick="return fnTs('.$res.', '.$f->file_id.');"><i class="fa fa-folder" aria-hidden="true" style="font-size: 40px;"></i><br></a>
                         <span>'.$f->file_name.'</span>             
                       </div>
                     </div>';
                 } else { 
                    $file = $path . $f->file_name;
                    if($dir!='') {
                      $filename = url('uploads/filemanager/'.$dir.'/'.$f->file_name);
                      $imagename = "'".$dir.'/'.$f->file_name."'";
                    }
                    else {
                      $filename = url('uploads/filemanager/'.$f->file_name);
                      $imagename = "'".$f->file_name."'";
                    }
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    if(strtolower($ext)=='jpg'||strtolower($ext)=='jpeg'||strtolower($ext)=='png'||strtolower($ext)=='gif'||strtolower($ext)=='bmp') 
                        $ic = '<a href="javascript:" onclick="return fnShowImg('.$imagename.');"><i class="fa fa-picture-o fa-3x d-block" aria-hidden="true"></i></a>';
                      else if(strtolower($ext)=='pdf')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-pdf-o fa-3x font-blue"></i></a><br/>';
                      else if(strtolower($ext)=='doc')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-word-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ods' || strtolower($ext)=='xlsx')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-excel-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='ppt' || strtolower($ext)=='pptx' || strtolower($ext)=='odp')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-powerpoint-o fa-3x font-blue"></i></a><br/>'; 
                      else if(strtolower($ext)=='mp3' || strtolower($ext)=='mp4' || strtolower($ext)=='mpeg')
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-video-camera fa-3x font-blue"></i></a><br/>'; 
                      else 
                         $ic = '<a href="'.$filename.'" target="_blank"><i class="fa fa-file-text-o fa-3x font-blue"></i></a><br/>';               
                      echo '<div class="col-sm-2 mb-3p" id="'.$i.'">
                        <div style="text-align: center;">
                          '.$ic.'
                          <span>'.$f->file_name.'</span>
                        </div>
                      </div>';
                 } 
               $i++;
            }
        } else {
            echo '<h4>No files found</h4>';
        }
    }
    
    function parentinfo(Request $request) {
        $file_count = FileManagerModel::where('file_path', $request->child)->select('file_id')->count();
        if($file_count>0) {
          $file = FileManagerModel::where('file_path', $request->child)->select('file_id')->first();
          echo $file->file_id;  
        } else {
          echo '';
        }     
    }

    // deal registration form controller
    public function dealregistrationstore(Request $request) {
        $inputs = $request->all();
        $data = Deal_register::create([
            'user_id' => Auth::guard('user')->user()->id,
            'endcustomer' => $inputs['endcustomer'],
            'personincharge' => $inputs['personincharge'],
            'designation' =>$inputs['designation'],
            'mobileno' => $inputs['mobileno'],
            'landno' => $inputs['landno'],
            'email' => $inputs['emailid'],
            'opportunity_products' => $inputs['products'],
            'application' => $inputs['application'],
            'opportunity_value' => $inputs['ovalue'],
            'tender_private' => $inputs['tender'],
            'expected_closing_date' => $inputs['closing'],
            'other_accessories_products_needed' => $inputs['accessories'],
            'status' => '0'
            ]);

        $get_settings = setting();
        $admin_mail = $get_settings->from_email;
        Mail::to($admin_mail)->queue(new DealRegisterAdmin);
        $user = User::where('id', Auth::guard('user')->user()->id)->first();
        $deal_user_email = $inputs['emailid'];
        Mail::to($deal_user_email)->queue(new DealRegisterUser);

        Session::flash('message', 'This deal has been registered successfully.');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('/user/dashboard');
    }

    //deal registration email exists verify
    public function deal_email_exist(Request $request) {
        $inputs = $request->all();
        $email = $inputs['emailid'];
        $emailverify = Deal_register::where('email',$email)->count();
        if($emailverify > 0)
          return "false";
        else
          return "true";
    }

    public function dealinfo(Request $request) {
        $id = $request->id;
        $deal_count = Deal_register::where('id', $id)->count();
        if($deal_count>0) {
            $deal = Deal_register::where('id', $id)->first();
            echo '<form role="form" class="form-horizontal" style="font-size: 13px;">
                <dl class="dl-horizontal">
                    <dt>End Customer:</dt>
                    <dd>'.$deal->endcustomer.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Person in-Charge:</dt>
                    <dd>'.$deal->personincharge.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Designation:</dt>
                    <dd>'.$deal->designation.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Mobile No:</dt>
                    <dd>'.$deal->mobileno.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Land No:</dt>
                    <dd>'.$deal->landno.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Email ID:</dt>
                    <dd>'.$deal->email.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Opportunity/Products:</dt>
                    <dd>'.$deal->opportunity_products.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Application:</dt>
                    <dd>'.$deal->application.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Opportunity value:</dt>
                    <dd>'.$deal->opportunity_value.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Tender or private:</dt>
                    <dd>'.$deal->tender_private.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Expected Closing date:</dt>
                    <dd>'.$deal->expected_closing_date.'</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Other accessories:</dt>
                    <dd>'.$deal->other_accessories_products_needed.'</dd>
                </dl>
              </form>';
        } else {
            echo 'No deals found.';
        }
    }

    public function myprofile() {
        $user_id = Auth::guard('user')->user()->id;
        $user = User::where('id', $user_id)->first();
        return view('frontend.myprofile', compact('user'));
    }

    public function myprofile_submit(Request $request) {
        $input = $request->all();        
        $id = $input['hidid'];
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
            'first_name' => $first_name,
            'last_name' => $last_name,              
            'companyname' => $input['company_name'],
            'cperson' => $input['cperson'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'location' => $input['location'],
            'customer_notification' => $input['optradio']
        );
        User::select('*')->where('id', $id)->update($data);
        echo 'success';
    }

    public function myprofile_partner_submit(Request $request) {
        $input = $request->all();        
        $id = $input['hidid'];

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
            'partner_type' => implode(',', $input['partner_type']),      
            'companyname' =>$input['company'],
            'first_name' => $first_name,
            'last_name' => $last_name,     
            'street' =>$input['street'],
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
            'reason_for_interest' => implode(',', $input['reason'])
        );
        User::select('*')->where('id', $id)->update($data);
        echo 'success';
    }

    public function myprofile_emp_submit(Request $request) {
        $input = $request->all();        
        $id = $input['hidid'];
        $data = array(
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'employee_id' => $input['employee_id'],
            'designation' => $input['designation'],
            'mobile' => $input['mobile'],
            'location' => $input['location']
        );
        User::select('*')->where('id', $id)->update($data);
        echo 'success';
    }

    public function demo_request_form(Request $request) {
        $input = $request->all();
        $user_id = Auth::guard('user')->user()->id;
        $data = array(
            'user_id' => $user_id,
            'request' => $input['request'],
            'demo_at' => $input['demo_at'],
            'company_name' => $input['company_name'],
            'location' => $input['location'],
            'demo_date' => $input['demo_date'],
            'demo_time' => $input['demo_time'],
            'person_incharge' => $input['person_incharge'],
            'phone' => $input['phone'],
            'optradio' => $input['optradio'],
            'segment' => $input['segment'],
            'demon' => $input['demon'],
            'product_name' => $input['product_name'],
            'solution_name' => $input['solution_name'],
            'created_at' => date('Y-m-d h:i:s')
        ); 
        DemoRequest::create($data);
        
        //MAIL TO ADMIN
        $admin_mail = '';
        //Get user type by id
        $user = User::where('id', $user_id)->select('type')->first();
        $type = $user->type;
        if($type=='P') {
            $admin_mail = 'channelsales@atnetindia.net';
        }
        else if($type=='C') {
            $admin_mail = 'sales@atnetindia.net';
        }
        else if($type=='V') {
            $admin_mail = 'sales@atnetindia.net';
        } else {
            $get_settings = setting();
            $admin_mail = $get_settings->from_email;
        }
        Mail::to($admin_mail)->queue(new DemoRequestAdmin);

        //MAIL TO USER
        $user = User::where('id', $user_id)->first();
        Mail::to($user)->queue(new DemoRequestUser); 

        Session::flash('message', 'Demo request form has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('user/dashboard');
    }

    public function demo_feedback(Request $request) {
        $input = $request->all();
        $user_id = Auth::guard('user')->user()->id;
        $data = array(
            'user_id' => $user_id,
            'companyname' => $input['companyname'],
            'location' => $input['location'],
            'person_in_charge' => $input['person_in_charge'],
            'phoneno' => $input['phoneno'],
            'decision' => $input['decision'],
            'product_name' => $input['product_name'],
            'solution_name' => $input['solution_name'],
            'demo_date' => $input['demo_date'],
            'demo_pre' => $input['demo_pre'],
            'demo_pre_text' => $input['demo_pre_text'],
            'demo_coordination' => $input['demo_coordination'],
            'demo_coordination_text' => $input['demo_coordination_text'],
            'tech_detail' => $input['tech_detail'],
            'tech_detail_text' => $input['tech_detail_text'],
            'product_handling' => $input['product_handling'],
            'product_handling_text' => $input['product_handling_text'],
            'demo_purpose' => $input['demo_purpose'],
            'demo_purpose_text' => $input['demo_purpose_text'],
            'customer_name' => $input['customer_name'],
            'at_engineer' => $input['at_engineer'],
            'created_at' => date('Y-m-d h:i:s')
        ); 
        DemoFeedback::create($data);

        //MAIL TO ADMIN
        $admin_mail = '';
        //Get user type by id
        $user = User::where('id', $user_id)->select('type')->first();
        $type = $user->type;
        if($type=='P') {
            $admin_mail = 'channelsales@atnetindia.net';
        }
        else if($type=='C') {
            $admin_mail = 'sales@atnetindia.net';
        }
        else if($type=='V') {
            $admin_mail = 'sales@atnetindia.net';
        } else {
            $get_settings = setting();
            $admin_mail = $get_settings->from_email;
        }
        Mail::to($admin_mail)->queue(new DemoFeedbackAdmin);

        //MAIL TO USER
        $user = User::where('id', $user_id)->first();
        Mail::to($user)->queue(new DemoFeedbackUser);      
        
        Session::flash('message', 'Demo feedback form has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('user/dashboard');
    }

    public function customer_survey(Request $request) {
        $input = $request->all();
        $user_id = Auth::guard('user')->user()->id;
        $data = array(
            'user_id' => $user_id,
            'customer_name' => $input['customer_name'],
            'ontime' => $input['ontime'],
            'response' => $input['response'],
            'meeting' => $input['meeting'],
            'meeting_imp' => $input['meeting_imp'],
            'towards' => $input['towards'],
            'action_c' => $input['action_c'],
            'informing_p' => $input['informing_p'],
            'sharing_info' => $input['sharing_info'],
            'effort' => $input['effort'],
            'marinating' => $input['marinating'],
            'evaluated1' => $input['evaluated1'],
            'designation' => $input['designation'],
            'date' => isset($input['date'])?$input['date']:'',
            'department' => $input['department'],
            'created_at' => date('Y-m-d h:i:s')
        ); 
        $customer_survey = CustomerSurvey::create($data);
        $id = $customer_survey->survey_id;
        $destinationPath = getcwd() . '/uploads/customer_survey/'.$id.'/';

        $signature = @$request->file('signature');
        if (isset($signature) && $signature != '') {
            $file = $signature;   
            $filename_value = time() . rand(100000, 10000);
            $sign_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();   echo "-";        
            $file->move($destinationPath,$sign_filename);
            CustomerSurvey::where('survey_id', $id)->update(array('signature' => $sign_filename));
        }

        $seal = @$request->file('seal');
        if (isset($seal) && $seal != '') {
            $file = $seal;   
            $filename_value = time() . rand(100000, 10000);
            $seal_filename = md5($filename_value) . "." . $file->getClientOriginalExtension();           
            $file->move($destinationPath,$seal_filename);
            CustomerSurvey::where('survey_id', $id)->update(array('seal' => $seal_filename));
        }

        Session::flash('message', 'Customer survey form has been saved successfully');
        Session::flash('alert-class', 'alert-success');
        return redirect('user/dashboard');
    }

}
