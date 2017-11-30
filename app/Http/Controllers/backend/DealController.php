<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\frontend\Deal_register;
use Redirect;
use Session;
use Mail;
use App\Mail\DealEndUser;


class DealController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->segment(4); 
        $deal_reg = Deal_register::where('user_id', $user_id)->get(); 
        return view('backend.deal.index', compact('deal_reg'));
    }

    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $user_id           = $inputs['user_id'];  
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Deal(s) has been successfully deleted.";
            $redirect_value = "admin/deal/view/".$user_id;
        }
        foreach ($updated_ids_value as $update_id) {
            $deal_data = Deal_register::find($update_id);
            $deal_data->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function dealinfo(Request $request) 
    {
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

    public function deal_approve(Request $request) {
        $id = $request->segment(4);
        $data = array('status' => 1);
        Deal_register::select('*')->where('id', $id)->update($data);
        $deal = Deal_register::where('id', $id)->select('*')->first();
        $user_id = $deal->user_id;

        Mail::to($deal)->queue(new DealEndUser);

        Session::flash('message', 'Deal approved successfully');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('admin/deal/view/'.$user_id);
    }

    public function deal_reject(Request $request) {
        $id = $request->segment(4);
        $data = array('status' => 2);
        Deal_register::select('*')->where('id', $id)->update($data);
        $deal = Deal_register::where('id', $id)->select('*')->first();
        $user_id = $deal->user_id;

        Session::flash('message', 'Deal has been rejected');
        Session::flash('alert-class', 'alert-danger');
        return Redirect::to('admin/deal/view/'.$user_id);
    }

}
