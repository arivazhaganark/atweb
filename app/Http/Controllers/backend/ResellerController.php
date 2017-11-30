<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use DB;

class ResellerController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->segment(4); 
        $reseller = DB::table('reseller')->where('user_id', $user_id)->get(); 
        return view('backend.reseller.index', compact('reseller'));
    }

    public function actionupdate(Request $request)
    {
        $inputs            = $request->all();
        $user_id           = $inputs['user_id'];  
        $updated_ids_value = explode(",", $inputs['hid_selected_ids']);
        $action            = $inputs['action'];
        if ($action == 'Delete') {
            $msg_value      = "Reseller(s) has been successfully deleted.";
            $redirect_value = "admin/reseller/view/".$user_id;
        }
        foreach ($updated_ids_value as $update_id) {
            $resel_dir = public_path().'/uploads/reseller/'.$update_id;
            DB::table('reseller')->where('resel_id', $update_id)->delete();
            DB::table('reseller_doc_limited_company')->where('reseller_id', $update_id)->delete();
            DB::table('reseller_doc_partnership_firm')->where('reseller_id', $update_id)->delete();
            DB::table('reseller_doc_sole_proprietor')->where('reseller_id', $update_id)->delete();
        }
        Session::flash('message', $msg_value);
        Session::flash('alert-class', 'alert-success');
        return Redirect::to($redirect_value);
    }

    public function resel_info(Request $request) 
    {
        $id = $request->id;
        $resel_count = DB::table('reseller')->where('resel_id', $id)->count();
        if($resel_count>0) {
            $resel = DB::table('reseller')->where('resel_id', $id)->first();
            $html = '';
            $html = '<h4><strong>1. General Information</strong></h4><div class="row border p-10">
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="frimname">Firm Name</label>
                      <div class="">'.$resel->frimname.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="address">Address </label>
                      <div class="">'.$resel->address.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="citypin">City / Pin </label>
                      <div class="">
                         '.$resel->citypin.'
                      </div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="phone">Phone </label>
                      <div class="">'.$resel->phone.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="email">Email </label>
                      <div class="">'.$resel->email.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="state">State</label>
                      <div class="">'.$resel->state.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="fax">Fax</label>
                      <div class="">'.$resel->fax.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="mobile">Mobile</label>
                      <div class="">'.$resel->mobile.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="in_yr">Year of Incorporation</label>
                      <div class="">'.$resel->in_yr.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="emp">No. of Employees</label>
                      <div class="">'.$resel->emp.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="equity">Equity/Capital</label>
                      <div class="">'.$resel->equity.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="totalsales">Total Sales Turnover Last Year</label>
                      <div class="">'.$resel->totalsales.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="roc">ROC Reg. No.( If Company)</label>
                      <div class="">'.$resel->roc.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="gst">GST Reg. no.</label>
                      <div class="">'.$resel->gst.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="itpan">I.T.PAN No./SIN No.</label>
                      <div class="">'.$resel->itpan.'</div>
                   </div>
                   <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <label class="control-label" for="itpan">Type</label>
                      <div class="">'.$resel->type_reseller.'</div>
                   </div>';

                   if(isset($resel->roc_file) && $resel->roc_file!='') {
                        $html .= '<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                      <label class="control-label" for="itpan">ROC Reg No. file</label>
                                      <div class=""><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$resel->roc_file).'" target="_blank">View File</a></div>
                                  </div>';
                   }

                   if(isset($resel->gst_file) && $resel->gst_file!='') {
                        $html .= '<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                      <label class="control-label" for="itpan">ROC Reg No. file</label>
                                      <div class=""><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$resel->gst_file).'" target="_blank">View File</a></div>
                                  </div>';
                   }

                   if(isset($resel->itpan_file) && $resel->itpan_file!='') {
                        $html .= '<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                      <label class="control-label" for="itpan">ROC Reg No. file</label>
                                      <div class=""><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$resel->itpan_file).'" target="_blank">View File</a></div>
                                  </div>';
                   }

                $html .= '</div>
                <h4 class="mt-2"><strong>2. Contact Information</strong></h4>
                <div class="contact_information mt-2">
                   <div class="row border p-10">
                   <div class="propriotor">
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="fname"> 
                        1.Name </label>
                         <div class="">'.$resel->prop_name.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="address">Address </label>
                         <div class="">'.$resel->prop_address.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="city">City </label>
                         <div class="">
                            '.$resel->prop_city.'
                         </div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="mobile">Mobile</label>
                         <div class="">'.$resel->prop_mobile.'</div>
                      </div>
                      <div class="clearfix"></div>
                   </div>                    
                   <!-- contact information for Propriotor  end-->
                   <!-- contact information for Partner  start-->
                   <div class="partner">
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="fname"> 
                         2.Name </label>
                         <div class="">'.$resel->part_name.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="address">Address </label>
                         <div class="">'.$resel->part_address.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="city">City  </label>
                         <div class="">
                            '.$resel->part_city.'
                         </div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="mobile">Mobile</label>
                         <div class="">'.$resel->part_mobile.'</div>
                      </div>
                      <div class="clearfix"></div>
                   </div>
                   <!-- contact information for Partne  end-->
                   <!-- contact information for Partner  start-->
                   <div class="partner">
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="fname"> 
                        3.Name </label>
                         <div class="">'.$resel->dir_name.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="address">Address </label>
                         <div class="">'.$resel->dir_address.'</div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="city">City  </label>
                         <div class="">
                            '.$resel->dir_city.'
                         </div>
                      </div>
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label class="control-label" for="mobile">Mobile</label>
                         <div class="">'.$resel->dir_mobile.'</div>
                      </div>
                      <div class="clearfix"></div>
                   </div>
                  </div>
                </div>
                <h4><strong>2A: Office Contact Details</strong></h4>    
                <div class="row border p-10">          
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p style="font-weight:bold;">
                        Department 
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p style="font-weight:bold;">
                        Name
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p style="font-weight:bold;">
                        Contact No.
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p style="font-weight:bold;">
                        Mail ID
                     </p>
                  </div>
                  <!-- sales block start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Sales 
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->sales_name.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->sales_contact.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->sales_email.'
                     </p>
                  </div>
                  <!-- sales block end -->
                  <!-- accounts block start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Accounts 
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->accounts_name.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->accounts_contact.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->accounts_email.'
                     </p>
                  </div>
                  <!-- accounts block end -->
                  <!-- logistics start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Logistics 
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->logistics_name.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->logistics_contact.'
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        '.$resel->logistics_email.'
                     </p>
                  </div>
               <!-- logistics end -->
               <!-- technical start -->      
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     Technical 
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->tech_name.'
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->tech_contact.'
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->tech_email.'
                  </p>
               </div>
               <!-- technical end -->
               <!--support start --> 
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     Support 
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->support_name.'
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->support_contact.'
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     '.$resel->support_email.'
                  </p>
               </div>
               </div>
               <h4><strong>3. Bank Reference</strong></h4>
               <div class="row border p-10">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                     <label>Bank Name </label>
                     <div>'.$resel->bank_name.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Contact </label>
                     <div>'.$resel->bank_contact.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                     <label>IFSC Code/ MICR Code/SWIFT Code </label>
                     <div>'.$resel->ifsc_code.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Address </label>
                     <div>'.$resel->bank_address.'</div>
                  </div>
                  <div style="margin-top:20px;padding: 28px;"></div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Phone </label>
                     <div>'.$resel->bank_phone.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Credit Limit </label>
                     <div>'.$resel->credit_limit.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>A/C. No </label>
                     <div>'.$resel->ac_no.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Type </label>
                     <div>'.$resel->type.'</div>
                  </div>
                  <div style="margin-top:20px;padding: 20px;"></div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Amount</label>
                     <div>'.$resel->amount.'</div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label for="exampleInputFile">Collateral </label>
                     <div>'.$resel->optradio.'</div>
                  </div>';

                  if(isset($resel->cheque_file) && $resel->cheque_file!='') {
                        $html .= '<div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                      <label class="control-label" for="itpan">ROC Reg No. file</label>
                                      <div class=""><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$resel->cheque_file).'" target="_blank">View File</a></div>
                                  </div>';
                   }

                  $html .='<div class="clearfix"></div>
               </div>
               <h4><strong>4. Trade Refereces</strong></h4>
               <div class="row border p-10">
                  <p style="margin-left:14px;">Trade Referece #1</p>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Firm Name: </label>
                     '.$resel->trade_name1.'
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Address: </label>
                     '.$resel->trade_address1.'
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>City/Pin: </label>
                     '.$resel->trade_citypin1.'
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Phone: </label>
                     '.$resel->trade_phone1.'
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>State: </label>
                     '.$resel->trade_state1.'
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Fax: </label>
                     '.$resel->trade_fax1.'
                  </div>
                  <!-- trade references end-->
                  <div class="clearfix"></div>
               <!-- trade references opt start-->';

               if($resel->trade_name2!='' && $resel->trade_address2!='' && $resel->trade_phone2!='') {
                   $html .= '<div class="trade_referopt">
                      <br><p style="margin-left:14px;">Trade Referece #2(Optional)</p>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>Firm Name: </label>
                         '.$resel->trade_name2.'
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>Address: </label>
                         '.$resel->trade_address2.'
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>City/Pin: </label>
                         '.$resel->trade_citypin2.'
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>Phone: </label>
                         '.$resel->trade_phone2.'
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>State: </label>
                         '.$resel->trade_state2.'
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                         <label>Fax: </label>
                        '.$resel->trade_fax2.'
                      </div>
                   </div>';
                }

               $html .='</div>
                       <div class="row border p-10">
                       <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                          <label>Date: </label>
                          '.$resel->date.'
                       </div>
                       <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                          <label>Place: </label>
                          '.$resel->place.'
                       </div>
                       <div class="col-xs-12 col-sm-6">
                          <label style="vertical-align:top;"> Signature with Seal </label>
                          <img src="'.url('uploads/reseller/'.$resel->resel_id.'/'.$resel->signature_seal).'" style="width: 160px;height: 90px;margin-left: 10px;" />
                       </div>
                    </div>
                    <h4 class="mt-2"><strong> Supporting Documents </strong></h4>';

                    $limit_comp_count = DB::table('reseller_doc_limited_company')->where('reseller_id', $id)->count();
                    if($limit_comp_count>0) {
                        $limit_comp = DB::table('reseller_doc_limited_company')->where('reseller_id', $id)->get();
                        $html .='<p>Limited Company</p>';
                        foreach ($limit_comp as $value) {
                            $html .= '<p><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->limit_comp).'" target="_blank">'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->limit_comp).'</a></p>';
                        }
                    }

                    $partnership_firm_count = DB::table('reseller_doc_partnership_firm')->where('reseller_id', $id)->count();
                    if($partnership_firm_count>0) {
                        $partnership_firm = DB::table('reseller_doc_partnership_firm')->where('reseller_id', $id)->get();
                        $html .='<p>Partnership Firm</p>';
                        foreach ($partnership_firm as $value) {
                            $html .= '<p><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->partnership_firm).'" target="_blank">'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->partnership_firm).'</a></p>';
                        }
                    }

                    $sole_proprietor_count = DB::table('reseller_doc_sole_proprietor')->where('reseller_id', $id)->count();
                    if($sole_proprietor_count>0) {
                        $sole_proprietor = DB::table('reseller_doc_sole_proprietor')->where('reseller_id', $id)->get();
                        $html .='<p>Sole Proprietor</p>';
                        foreach ($sole_proprietor as $value) {
                            $html .= '<p><a href="'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->sole_proprietor).'"  target="_blank">'.url('uploads/reseller/'.$resel->resel_id.'/'.$value->sole_proprietor).'</a></p>';
                        }
                    }

            echo $html;

        } else {
            echo 'No reseller found.';
        }
    }

}
