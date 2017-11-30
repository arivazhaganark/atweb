<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\DemoFeedback;
use Redirect;
use Session;
use Image;

class DemFeedback extends Controller
{
    public function index()
    {
        $input = Input::all(); 
        $demo_feedback = DemoFeedback::get();
        return view('backend.demo_feedback.index', compact('demo_feedback'));

    }

    public function show($id) {
        $demo_feedback = DemoFeedback::find($id);        
        return view('backend.demo_feedback.show', compact('demo_feedback'));
    } 
    
    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Demo feedback form detail(s) has been successfully deleted.";
            $redirect_value = "admin/demo_feedback";
        }
        foreach ($updated_ids_value as $update_id) {
            $demo_feedback = DemoFeedback::where('id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
