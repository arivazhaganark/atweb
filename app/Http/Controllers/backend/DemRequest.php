<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\DemoRequest;
use Redirect;
use Session;
use Image;

class DemRequest extends Controller
{
    public function index()
    {
        $input = Input::all(); 
        $demo_request = DemoRequest::get();
        return view('backend.demo_request.index', compact('demo_request'));

    }

    public function show($id) {
        $demo_request = DemoRequest::find($id);        
        return view('backend.demo_request.show', compact('demo_request'));
    } 
    
    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Demo request form detail(s) has been successfully deleted.";
            $redirect_value = "admin/demo_request";
        }
        foreach ($updated_ids_value as $update_id) {
            $demo_request = DemoRequest::where('id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
