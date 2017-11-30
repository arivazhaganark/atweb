<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Redirect;
use Session;


class VisitorController extends Controller
{
    public function index() {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $user = User::where('status', 'N')->where('type', 'V')->get();

        } else {
            $user = User::where('status', 'Y')->where('type', 'V')->get();

        }
        $active_count = User::where('status', 'Y')->where('type', 'V')->count();
        $inactive_count = User::where('status', 'N')->where('type', 'V')->count();
        return view('backend.visitor.index', compact('user', 'active_count', 'inactive_count'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('backend.visitor.edit', compact('user'));
    }

    public function update(Request $request) {
        $id = $request->get('hidid');
        $input = $request->all();
        $name = $input['name'];
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
            'email' => $input['email']
        );
        User::where('id', $id)->update($update_data);      

        Session::flash('message', 'Visitor has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/visitor/edit/'.$id);
    }

    public function show($id) {
        $user = User::find($id);
        return view('backend.visitor.show', compact('user'));
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
            } else {
                $user = User::find($update_id);
                $user->delete();
            }
        }
        if ($action == 'Inactive') {
            $msg_value = "Visitor has been deactivated.";
            $redirect_value = "admin/visitor";
        } else if ($action == 'Active') {
            $msg_value = "Visitor has been activated successfully.";
            $redirect_value = "admin/visitor/?token=inactive";
        } else if ($action == 'Delete') {
            $msg_value = "Visitor has been deleted";
            $redirect_value = "admin/visitor/?token=inactive";
        }

        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function visitor_email_exist(Request $request)
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
