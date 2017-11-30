<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\CustomerSurvey;
use Redirect;
use Session;
use DB;


class CustomerSurveyController extends Controller
{
    public function index()
    {
        $input = Input::all(); 
        $cust_survey = CustomerSurvey::get();
        return view('backend.customer_survey.index', compact('cust_survey'));

    }

    public function show($id) {
        $cust_survey = CustomerSurvey::where('survey_id', $id)->first();
        return view('backend.customer_survey.show', compact('cust_survey'));
    } 
    
    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Customer survey detail(s) has been successfully deleted.";
            $redirect_value = "admin/customer_survey";
        }
        foreach ($updated_ids_value as $update_id) {
            CustomerSurvey::where('survey_id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
