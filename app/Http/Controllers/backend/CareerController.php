<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\backend\CareerModel;
use App\Model\backend\CareerRefContactModel;
use App\Model\backend\CareerDependantModel;
use App\Model\backend\CareerProjectModel;
use App\Model\backend\CareerWorkExpModel;
use Redirect;
use Session;
use Image;

class CareerController extends Controller
{
    public function index()
    {
        $input = Input::all(); 
        $career_data = CareerModel::get();
        return view('backend.career.index', compact('career_data'));

    }

    public function show($id) {
        $career_data = CareerModel::find($id);
        $career_contact_data = CareerRefContactModel::where('career_id', $id)->get();
        $career_dep_data = CareerDependantModel::where('career_id', $id)->get();
        $career_project_data = CareerProjectModel::where('career_id', $id)->get();
        $career_work_exp_data = CareerWorkExpModel::where('career_id', $id)->get();
        return view('backend.career.show', compact('career_data', 'career_contact_data', 'career_dep_data', 'career_project_data','career_work_exp_data'));
    } 
    
    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Career(s) has been successfully deleted.";
            $redirect_value = "admin/career";
        }
        foreach ($updated_ids_value as $update_id) {
            $career_data = CareerModel::find($update_id);
            $career_data->delete();
            CareerRefContactModel::where('career_id', $update_id)->delete();
            CareerDependantModel::where('career_id', $update_id)->delete();
            CareerProjectModel::where('career_id', $update_id)->delete();
            CareerWorkExpModel::where('career_id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
