@extends('layouts.frontpage')
@section('content')
<section class="innersubmenu mt-60 bg-grey">
   <div class="">
      <div class="">
      </div>
   </div>
</section>
<!--image -->
<section>
   <div class='subpage-img'></div>
</section>
<section class="reseller_form">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin: 10px;">{{ Session::get('message') }}</p>
            @endif   
            <h3 class="font-blue">
               <strong>Re-seller Account Opening Form</strong>
            </h3>
             <p><strong>A&T Video Networks PVT LTD </strong></p>
             <p>
             8-B, Abdul Gaffer Khan Road
             </p>
             <p>
                 Chinna Chokkikulam Madurai Tamil Nadu-625002, India
             </p>
             <h2 class="text-center">Reseller Registration</h2>
                          <p>
                 <strong>(Instructions: Kindly fill this form by giving complete details. If a question does not apply to you mention “NA”)
                </strong>
             </p>
             <h4><strong>1. General Information</strong></h4>
            <form id="resel_form" name="resel_form" method="POST" action="{{ url('reseller/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}               
                     <div class="row border p-10">
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="frimname">Firm Name<span class="color-red">*</span></label>
                  <div class=""><input id="frimname" class="form-control" name="frimname" type="text" placeholder="Enter Firm Name"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="address">Address <span class="color-red">*</span></label>
                  <div class=""><input id="address" class="form-control" name="address" type="text" placeholder="Enter Address"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="citypin">City / Pin <span class="color-red">*</span></label>
                  <div class="">
                     <input id="citypin" class="form-control" name="citypin" type="text" placeholder="Enter City / Pin">
                  </div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="phone">Phone <span class="color-red">*</span></label>
                  <div class=""><input id="phone" class="form-control number" name="phone" type="text" placeholder="Enter Phone"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="email">Email <span class="color-red">*</span></label>
                  <div class=""><input id="email" class="form-control" name="email" type="email" placeholder="Enter Email"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="state">State<span class="color-red">*</span></label>
                  <div class=""><input id="state" class="form-control" name="state" type="text" placeholder="Enter State"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="fax">Fax<span class="color-red">*</span></label>
                  <div class=""><input id="fax" class="form-control" name="fax" type="text" placeholder="Enter Fax"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="mobile">Mobile<span class="color-red">*</span></label>
                  <div class=""><input id="mobile" class="form-control" name="mobile" type="text" placeholder="Enter Mobile"></div>
               </div>
             <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label class="control-label" for="frimname">Type <span class="color-red">*</span></label>
                  <br/>
                  <label class="checkbox-inline">
                  <input id="solepropreitor" name="type_reseller" class="reseller_form_type" type="radio" value="Sole Propreitor">Sole Proprietor</label> 
                  <label class="checkbox-inline">
                  <input id="partnershipfirm" name="type_reseller" class="reseller_form_type" type="radio" value="Partnership Firm">Partnership Firm</label> 
                  <label class="checkbox-inline">
                  <input id="plt" name="type_reseller" type="radio" class="reseller_form_type" value="Private Limited Company">Private Limited Company</label> 
                  <label class="checkbox-inline">
                  <input id="plc" name="type_reseller" type="radio" class="reseller_form_type" value="Teaming Partner">Public Limited Company</label> 
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="in_yr">Year of Incorporation<span class="color-red">*</span></label>
                  <div class=""><input id="in_yr" class="form-control" name="in_yr" type="text" placeholder="Enter Year of Incorporation"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="emp">No. of Employees<span class="color-red">*</span></label>
                  <div class=""><input id="emp" class="form-control" name="emp" type="text" placeholder="Enter No. of Employees"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="equity">Equity/Capital<span class="color-red">*</span></label>
                  <div class=""><input id="equity" class="form-control" name="equity" type="text" placeholder="Enter Equity/Capital"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="totalsales">Total Sales Turnover Last Year<span class="color-red">*</span></label>
                  <div class=""><input id="totalsales" class="form-control" name="totalsales" type="text" placeholder="Enter Total Sales Turnover Last Year"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="roc">ROC Reg. No.( If Company)</label>
                  <div class=""><input id="roc" class="form-control" name="roc" type="text" placeholder="Enter ROC Reg. No."></div>
                  <input type="file" name="roc_file" class="mt-5">
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="gst">GST Reg. no.<span class="color-red">*</span></label>
                  <div class=""><input id="gst" class="form-control" name="gst" type="text" placeholder="Enter GST Reg. no."></div>
                  <input type="file" name="gst_file" class="mt-5">
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="itpan">I.T.PAN No./SIN No.<span class="color-red">*</span></label>
                  <div class=""><input id="itpan" class="form-control" name="itpan" type="text" placeholder="Enter I.T.PAN No./SIN No."></div>
                  <input type="file" name="itpan_file" class="mt-5">
               </div>
               </div>
               <div class="clearfix"></div>
                
               <!-- contact information for Proprietor  start-->
                <h4 class="mt-2"><strong>2. Contact Information</strong></h4>
                <span> (Name& Residential Address of Proprietor/Partner /Directors) </span>
                <div class="contact_information mt-2">
                    <div class="row border p-10">
               <div class="Proprietor">
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="fname"> 
                    1.Name <span class="color-red">*</span></label>
                     <div class=""><input id="prop_name" class="form-control" name="prop_name" type="text" placeholder="Enter Name"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="address">Address <span class="color-red">*</span></label>
                     <div class=""><input id="prop_address" class="form-control" name="prop_address" type="text" placeholder="Enter Address"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="city">City <span class="color-red">*</span></label>
                     <div class="">
                        <input id="prop_city" class="form-control" name="prop_city" type="text" placeholder="Enter City">
                     </div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="mobile">Mobile<span class="color-red">*</span></label>
                     <div class=""><input id="prop_mobile" class="form-control" name="prop_mobile" type="text" placeholder="Enter Mobile"></div>
                  </div>
                  <div class="clearfix"></div>
               </div>                     
               <!-- contact information for Proprietor  end-->
               <!-- contact information for Partner  start-->
               <div class="partner">
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="fname"> 
                     2.Name <span class="color-red">*</span></label>
                     <div class=""><input id="part_name" class="form-control" name="part_name" type="text" placeholder="Enter Name"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="address">Address <span class="color-red">*</span></label>
                     <div class=""><input id="part_address" class="form-control" name="part_address" type="text" placeholder="Enter Address"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="city">City  <span class="color-red">*</span></label>
                     <div class="">
                        <input id="part_city" class="form-control" name="part_city" type="text" placeholder="Enter City">
                     </div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="mobile">Mobile<span class="color-red">*</span></label>
                     <div class=""><input id="part_mobile" class="form-control" name="part_mobile" type="text" placeholder="Enter Mobile"></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <!-- contact information for Partne  end-->
               <!-- contact information for Partner  start-->
               <div class="partner">
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="fname"> 
                    3.Name <span class="color-red">*</span></label>
                     <div class=""><input id="dir_name" class="form-control" name="dir_name" type="text" placeholder="Enter Name"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="address">Address <span class="color-red">*</span></label>
                     <div class=""><input id="dir_address" class="form-control" name="dir_address" type="text" placeholder="Enter Address"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="city">City  <span class="color-red">*</span></label>
                     <div class="">
                        <input id="dir_city" class="form-control" name="dir_city" type="text" placeholder="Enter City">
                     </div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label" for="mobile">Mobile<span class="color-red">*</span></label>
                     <div class=""><input id="dir_mobile" class="form-control" name="dir_mobile" type="text" placeholder="Enter Mobile"></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
              </div>
                </div>
               <!-- contact information for Partne  end-->
               <!--OFFICE CONTACT DETAILS -->
                <div class="office_contact mt-2">
                      <h4><strong>2A: Office Contact Details</strong></h4>
                <div class="row border p-10">          
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Department 
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Name
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Contact No.
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Mail ID
                     </p>
                  </div>
                  <!-- sales block start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Sales <span class="color-red">*</span>
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="sales_name" id="sales_name" type="text" placeholder="Enter Sales Name">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="sales_contact" id="sales_contact" type="text" placeholder="Enter Sales Contact">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="sales_email" id="sales_email" type="text" placeholder="Enter Sales Email">
                     </p>
                  </div>
                  <!-- sales block end -->
                  <!-- accounts block start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Accounts <span class="color-red">*</span>
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="accounts_name" id="accounts_name" type="text" placeholder="Enter Accounts Name">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="accounts_contact" id="accounts_contact" type="text" placeholder="Enter Accounts Contact">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="accounts_email" id="accounts_email" type="text" placeholder="Enter Accounts Email">
                     </p>
                  </div>
                  <!-- accounts block end -->
                  <!-- logistics start -->
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        Logistics <span class="color-red">*</span>
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="logistics_name" id="logistics_name" type="text" placeholder="Enter Logistics Name">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="logistics_contact" id="logistics_contact" type="text" placeholder="Enter Logistics Contact">
                     </p>
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <p class="">
                        <input  class="form-control" name="logistics_email" id="logistics_email" type="text" placeholder="Enter Logistics Email">
                     </p>
                  </div>
               <!-- logistics end -->
               <!-- technical start -->      
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     Technical <span class="color-red">*</span>
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="tech_name" id="tech_name" type="text" placeholder="Enter Technical Name">
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="tech_contact" id="tech_contact" type="text" placeholder="Enter Technical Contact">
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="tech_email" id="tech_email" type="text" placeholder="Enter Technical Email">
                  </p>
               </div>
               <!-- technical end -->
               <!--support start --> 
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     Support <span class="color-red">*</span>
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="support_name" id="support_name" type="text" placeholder="Enter Support Name">
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="support_contact" id="support_contact" type="text" placeholder="Enter Support Contact">
                  </p>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <p class="">
                     <input  class="form-control" name="support_email" id="support_email" type="text" placeholder="Enter Support Email">
                  </p>
               </div>
                </div>
                </div>
               <!--support end --> 
               <!-- bank reference -->
               <div class="bank_refer mt-2">
                   <h4><strong>3. Bank Reference</strong></h4>
                   <div class="row border p-10">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                     <label>Bank Name <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name">
                  </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Contact <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="bank_contact" placeholder="Bank Contact" name="bank_contact">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                     <label>IFSC Code/ MICR Code/SWIFT Code <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="ifsc_code" placeholder="Bank IFSC Code" name="ifsc_code">           <input type="file" name="cheque_file" class="mt-2"/>
                     <span class="font-12" style="font-size: 11px !important;">Cancelled Cheque (Scanned copy to be attached)</span>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                     <label>Address <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="bank_address" placeholder="Bank Address" name="bank_address">
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Phone <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="bank_phone" placeholder="Bank Phone" name="bank_phone">
                  </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label>Credit Limit <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="credit_limit" placeholder="Credit Limit" name="credit_limit">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>A/C. No <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="ac_no" placeholder="A/C. No" name="ac_no">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Type <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="type" placeholder="Type" name="type">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Amount</label>
                     <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                     <label for="exampleInputFile">Collateral <span class="color-red">*</span></label>
                     <label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                     <label class="radio-inline"><input type="radio" name="optradio">No</label>
                  </div>
                  <div class="clearfix"></div>
               </div>
                </div>
               <!-- trade refer -->
               <div class="trade_refer mt-2">
                   <h4><strong>4. Trade Refereces</strong></h4>
                   <div class="row border p-10">
                  <p>Trade Referece #1</p>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Firm Name <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_name1" placeholder="Firm Name" name="trade_name1">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Address <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_address1" placeholder="Address" name="trade_address1">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>City/Pin <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_citypin1" placeholder="City/Pin" name="trade_citypin1">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Phone <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_phone1" placeholder="Phone" name="trade_phone1">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>State <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_state1" placeholder="State" name="trade_state1">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Fax <span class="color-red">*</span></label>
                     <input type="text" class="form-control" id="trade_fax1" placeholder="Fax" name="trade_fax1">
                  </div>
                  <!-- trade references end-->
                  <div class="clearfix"></div>
               <!-- trade references opt start-->
               <div class="trade_referopt">
                  <br/><p>Trade Referece #2(Optional)</p>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Firm Name</label>
                     <input type="text" class="form-control" id="trade_name2" placeholder="Firm Name" name="trade_name2">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Address</label>
                     <input type="text" class="form-control" id="trade_address2" placeholder="Address" name="trade_address2">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>City/Pin</label>
                     <input type="text" class="form-control" id="trade_citypin2" placeholder="City/Pin" name="trade_citypin2">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Phone</label>
                     <input type="text" class="form-control" id="trade_phone2" placeholder="Phone" name="trade_phone2">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>State</label>
                     <input type="text" class="form-control" id="trade_state2" placeholder="State" name="trade_state2">
                  </div>
                  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                     <label>Fax</label>
                     <input type="text" class="form-control" id="trade_fax2" placeholder="Fax" name="trade_fax2">
                  </div>
               </div>
                   </div>
                </div>
               <!-- trade references opt start-->
               <div class="clearfix"></div>
               <p class="mt-2" style="font-size: 12px;">
                  THIS IS TO AUTHORISE YOU TO VERIFY OUR BANK/TRADE CREDENTIALS. APPLICANT'S SIGNATURE  ATTESTS
                  FINANCIAL RESPONSIBILITY, ABILITY AND WILLINGNESS TO PAY INVOICES IN ACCORDANCE WITH AGREED
                  UPON TEFRMS.
               </p>
                <div class="row border p-10">
               <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <label>Date: <span class="color-red">*</span></label>
                  <input type="text" class="form-control form_datetime" id="date" placeholder="Date" name="date" onkeypress="return isNumberKey(event);">
               </div>
               <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <label>Place: <span class="color-red">*</span></label>
                  <input type="text" class="form-control" id="place" placeholder="Place" name="place">
               </div>
               <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                  <label> Signature with Seal <span class="color-red">*</span></label>
                  <input type="file" name="signature_seal">
               </div>
                </div>
               <div class="clearfix"></div>
               <!-- documents required start-->
               <div class="documents">
                  <h4 class="mt-2">
                   <strong> Supporting Documents Required </strong>
                  </h4>
                   <div class="row border p-10">
                  <p><strong>Limited Company</strong></p>
                  <p>
                  Memorandum of Association, Articles of Association, Building on Rental/Own, Certificate of Incorporation, Audited Balance sheet for 2 years Permanent address of Managing Director/Any two directors, sales tax registration certificate, IT PAN.,Copy of latest    IT Return Acknowledgement, Copy of bank statement for last three months, Security cheque Two Nos.            
                  </p>
                  <div class="input_fields_wrap1">
                      <button class="btn btn-warning btn-sm add_field_button1" style="float: right;font-size: 11px;font-weight: bold;">Add More Fields</button>
                      <div><input type="file" name="limit_comp[]"></div>
                  </div>
                  <!--partneship-->
                  <p class="mt-2"><strong>  Partnership Firm </strong></p>
                  <p>
                  Copy of Partnership Deed, Certificate of Registration of registered firm, Building on Rental/Own, Audited balance sheet for 2 years, Permanent address of all partners, Sales Tax Registration Certificate, IT PAN, copy of latest IT Return acknowledgement, Bank Statement for last three moths. Security cheque Two Nos.   
                  </p>
                  <div class="input_fields_wrap2">
                      <button class="btn btn-warning btn-sm add_field_button2" style="float: right;font-size: 11px;font-weight: bold;">Add More Fields</button>
                      <div><input type="file" name="partnership_firm[]"></div>
                  </div>
                  <!--sole proprietor-->
                  <p class="mt-2"><strong> Sole Proprietor </strong></p>
                  <p>
                  Permanent Residential address of proprietor, Proof of Residential Address, Building on Rental/Own, Sales Tax Registration Certificate, IT PAN, Copy of latest IT Return Acknowledgement, copy of bank statement for last three months, Security cheque Two Nos.       
                  </p>
                  <div class="input_fields_wrap3">
                      <button class="btn btn-warning btn-sm add_field_button3" style="float: right;font-size: 11px;font-weight: bold;">Add More Fields</button>
                      <div><input type="file" name="sole_proprietor[]"></div>
                  </div>
                       <br/>
                       <p><strong>Note: Please upload file in .xls,.doc,pdf Format. All the documents need to be signed and sealed. </strong></p>
               </div>
                </div>
               <!-- documents required end-->
               <div class="text-center mt-2">
                  <button type="button" class="btn btn-primary bg-blue border-orange btn-partner-login">Submit</button>
               </div>
            </form>
            <script src="{{ asset('js/pagejs/reseller.js?v=2.1') }}"></script>
            <style type="text/css">input.error{ border:solid 2px red; } span.error{ color:red; }</style>
         </div>
      </div>
   </div>
</section>
@endsection   