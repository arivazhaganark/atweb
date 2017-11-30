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
use App\Mail\ClientReply;

class UserController extends Controller
{
    public function index() {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $user = User::where('status', 'N')->where('type', 'C')->get();

        } else {
            $user = User::where('status', 'Y')->where('type', 'C')->get();

        }
        $active_count = User::where('status', 'Y')->where('type', 'C')->count();
        $inactive_count = User::where('status', 'N')->where('type', 'C')->count();
        return view('backend.user.index', compact('user', 'active_count', 'inactive_count'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request) {
        $id = $request->get('hidid');
        $input = $request->all();
        $name = $input['customer_name'];
        $name = explode(' ', $name);
        $last_name = '';
        if(count($name)==1) {            
            $first_name = $name[0];                
        } else {
            $first_name = $name[0];
            $last_name = $name[1];
        }

        $update_data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,              
            'companyname' => $input['companyname'],
            'cperson' => $input['cperson'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'location' => $input['location'],
            'customer_notification' => $input['optradio']
        );
        User::where('id', $id)->update($update_data);      

        Session::flash('message', 'User has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/user/edit/'.$id);
    }

    public function show($id) {
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
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

        $action_taken_username_list = "";
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                User::select('*')->where('id', $update_id)->update($data);

                if($action == 'Active') {
                    $user = User::where('id', $update_id)->first();
                    Mail::to($user)->send(new ClientReply($user));
                }

            } else {
                $user = User::find($update_id);
                $user->delete();
            }
        }
        if ($action == 'Inactive') {
            $msg_value = "User has been deactivated.";
            $redirect_value = "admin/user";
        } else if ($action == 'Active') {
            $msg_value = "User has been activated successfully.";
            $redirect_value = "admin/user/?token=inactive";
        } else if ($action == 'Delete') {
            $msg_value = "User has been deleted";
            $redirect_value = "admin/user/?token=inactive";
        }

        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function client_email_exist(Request $request)
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
