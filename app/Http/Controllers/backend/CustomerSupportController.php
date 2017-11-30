<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use DB;


class CustomerSupportController extends Controller
{
    public function index()
    {
        $input = Input::all(); 
        $cust_support = DB::table('customer_support')->get();
        return view('backend.customer_support.index', compact('cust_support'));

    }

    public function show($id) {
        $cust_support = DB::table('customer_support')->where('cs_id', $id)->first();
        return view('backend.customer_support.show', compact('cust_support'));
    } 
    
    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Customer support detail(s) has been successfully deleted.";
            $redirect_value = "admin/customer_support";
        }
        foreach ($updated_ids_value as $update_id) {
            DB::table('customer_support')->where('cs_id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

}
