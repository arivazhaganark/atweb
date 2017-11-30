<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\User;
use Redirect;
use Session;
use Image;
use Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $input = Input::all();
        if (isset($input['token']) && $input['token'] == 'inactive') {
            $employee = User::where('status', 'N')->where('type', 'E')->get();
        } else {
            $employee = User::where('status', 'Y')->where('type', 'E')->get();

        }
        $active_count   = User::where('status', 'Y')->where('type', 'E')->count();
        $inactive_count = User::where('status', 'N')->where('type', 'E')->count();
        return view('backend.employee.index', compact('employee', 'active_count', 'inactive_count'));
    }

    public function create()
    {
        return view('backend.employee.add');
    }

    public function store(Request $request)
    {
        $inputs=$request->all();    
        $data = User::create([
            'type' => 'E',
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'employee_id' => $inputs['employee_id'],
            'designation' => $inputs['designation'],
            'mobile' => $inputs['mobile'],
            'location' => $inputs['location'],
            'status' => 'Y'
        ]);     
        $id = $data->id;

        Session::flash('message', 'Employee has been added successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/employee/add');
    }

    public function edit($id)
    {
        $employee = User::find($id);
        return view('backend.employee.edit', compact('employee'));
    }

    public function show($id) {
        $employee = User::find($id);
        return view('backend.employee.show', compact('employee'));
    }

    public function update(Request $request)
    {
        $id = $request->get('hidid');
        $inputs = $request->all();

        $update_data = array(
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'employee_id' => $inputs['employee_id'],
            'designation' => $inputs['designation'],
            'mobile' => $inputs['mobile'],
            'location' => $inputs['location'],
        );     
        User::where('id', $id)->update($update_data);      

        Session::flash('message', 'Employee has been updated successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/employee/edit/'.$id);
    }

    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Inactive') {
            $column_name    = "status";
            $action_value   = "N";
            $msg_value      = "Employee(s) has been successfully inactivated.";
            $redirect_value = "admin/employee";

        } else if ($action == 'Active') {
            $column_name    = "status";
            $action_value   = "Y";
            $msg_value      = "Employee(s) has been successfully activated.";
            $redirect_value = "admin/employee/?token=inactive";

        } else if ($action == 'Delete') {
            $msg_value      = "Employee(s) has been successfully deleted.";
            $redirect_value = "admin/employee/?token=inactive";

        }
        foreach ($updated_ids_value as $update_id) {
            if ($action != 'Delete') {
                $data = array(
                    $column_name => $action_value
                );
                User::select('*')->where('id', $update_id)->update($data);

            } else {
                $cms_data = User::find($update_id);
                $cms_data->delete();
            }
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function emp_email_exist(Request $request)
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
