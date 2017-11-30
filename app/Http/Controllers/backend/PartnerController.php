<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Redirect;
use Session;
use Mail;
use App\Mail\PartnerReply;

class PartnerController extends Controller
{
    public function index() {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $partner = User::where('status', 'N')->where('type', 'P')->get();

        } else {
            $partner = User::where('status', 'Y')->where('type', 'P')->get();

        }
        $active_count = User::where('status', 'Y')->where('type', 'P')->count();
        $inactive_count = User::where('status', 'N')->where('type', 'P')->count();
        return view('backend.partner.index', compact('partner', 'active_count', 'inactive_count'));
    }

    public function edit($id){
        $partner = User::find($id);
        return view('backend.partner.edit', compact('partner'));
    }

    public function update(Request $request) {
        $id = $request->get('hidid');
        $input = $request->all();

        $name = $input['pname'];
        $name = explode(' ', $name);
        $last_name = '';
        if(count($name)==1) {            
            $first_name = $name[0];                
        } else {
            $first_name = $name[0];
            $last_name = $name[1];
        }

        $update_data = array(
            'partner_type' => implode(',', $input['partner_type']),      
            'companyname' => $input['company'],
            'first_name' => $first_name,
            'last_name' => @$last_name,
            'address' => $input['address'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'state' => $input['state'],
            'year_of_establishment' => $input['yearbusiness'],
            'no_of_sales' => $input['salespersonal'],
            'no_of_technical' => $input['supporteng'],
            'annual_revenue' => $input['annualrev'],
            'sales_territories' => $input['salesterr'],
            'current_focus' => implode(',', $input['segment']),
            'product_offer' => $input['productso'],
            'brand_deal' => $input['brabdsd'],
            'reason_for_interest' => implode(',', $input['reason']),
        );
        User::where('id', $id)->update($update_data);      

        Session::flash('message', 'Partner has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/partner/edit/'.$id);
    }

    public function show($id) {
        $partner = User::find($id);
        return view('backend.partner.show', compact('partner'));
    }

    public function actionupdate(Request $request) {
        $inputs = $request->all();

        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action = $inputs['action'];

        if ($action == 'Inactive') {
            $column_name = "status";
            $action_value = "N";
        } else if ($action == 'Active') {
            $column_name = "status";
            $action_value = "Y";
        }

        $action_taken_ame_list = "";
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                User::select('*')->where('id', $update_id)->update($data);

                if($action == 'Active') {
                    $user = User::where('id', $update_id)->first();
                    Mail::to($user)->send(new PartnerReply($user));
                }

            } else {
                $partner = User::find($update_id);
                $partner->delete();
            }
        }
        if ($action == 'Inactive') {
            $msg_value = "Partner has been deactivated.";
            $redirect_value = "admin/partner";
        } else if ($action == 'Active') {
            $msg_value = "Partner has been activated successfully.";
            $redirect_value = "admin/partner/?token=inactive";
        } else if ($action == 'Delete') {
            $msg_value = "Partner has been deleted";
            $redirect_value = "admin/partner/?token=inactive";
        }

        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function partner_email_exist(Request $request)
    {
        $inputs = $request->all();       
        $email = $inputs['email'];
        $id = isset($inputs['id'])?$inputs['id']:'';
        $check_email = User::where('email', $email)->where('id', '!=', $id)->first();
        if($check_email != ''){
            $get_email = $check_email->email;
            if($get_email != $email){
                return "true";
            }
            else{
                return "false";
            }
        }
        else{
            return "true";
        }
    }

}
