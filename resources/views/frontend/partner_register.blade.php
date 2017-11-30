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
<!--image -->
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
            <div class="">
               <a href="http://atnetindia.net" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/ &nbsp;</span>
               <span><a href="http://atnetindia.net">Home</a> &nbsp;</span>
               <span>/ &nbsp;</span>
               <span>Connect</span>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h3 class="font-blue">
            <strong>Partner Registration</strong>
         </h3>
         <div class="col-xs-12">
            <p>Enjoy the benefits and strengths of A &amp; T from its expertise, experience and its international association.</p>
         </div>
         <br/><br/>
         <form id="partner_reg" name="partner_reg" method="POST" action="{{ url('partner_reg/save') }}" >
         {{ csrf_field() }}
         <input type="hidden" name="type" id="type" value="P">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
               <label class="control-label col-sm-4" for="partnertype">Partner Type <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                  <label class="checkbox-inline"><input id="rpartner" name="partner_type[]" type="checkbox" value="Referral Partner" />Referral Partner</label> 
                  <label class="checkbox-inline"><input id="reselpartner" name="partner_type[]" type="checkbox" value="Reseller Partner" />Reseller Partner</label> 
                   <label class="checkbox-inline"><input id="referralcpartner" name="referral_cpartner[]" type="checkbox" value="Referral Consultant Partner" />Referral Consultant Partner</label> 
                     <label class="checkbox-inline"><input id="teampartner" name="team_partner[]" type="checkbox" value="Teaming Partner" />Teaming Partner</label> 
                </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-4" for="company">Company <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="company" class="form-control" name="company" type="text" placeholder="Enter Company" /></div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-4" for="namep">Name <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="namep" class="form-control" name="namep" type="text" placeholder="Enter Name" /></div>
            </div>
              <div class="form-group">
               <label class="control-label col-sm-4" for="email">Email <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                  <input id="pemail" class="form-control" name="email" type="text" placeholder="Enter Email" />
                  <div id="pvalEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;">&nbsp;</div>
               </div>
            </div>
               <div class="form-group">
               <label class="control-label col-sm-4" for="phone">Phone <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="phone" class="form-control number" name="phone" type="text" placeholder="Enter Phone" /></div>
            </div>
       
            <div class="form-group">
               <label class="control-label col-sm-4" for="street">Address <span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="address" class="form-control" name="address" type="text" placeholder="Enter Address" /></div>
            </div>    
          
            <div class="form-group">
               <label class="control-label col-sm-4" for="state">State<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="state" class="form-control" name="state" type="text" placeholder="Enter State" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="yearbusiness">Years in Business<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="yearbusiness" class="form-control" name="yearbusiness" type="text" placeholder="Enter Year in Business" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="salespersonal">No. of Sales Personnel<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="salespersonal" class="form-control" name="salespersonal" type="text" placeholder="Enter No. of Sales Personnel" /></div>
            </div>
            <div class="form-group mb-5">
               <label class="control-label col-sm-4" for="supporteng">No. of Technical Support Engineers<span class="color-red">*</span></label>
               <div class="col-sm-7"><input id="supporteng" class="form-control" name="supporteng" type="text" placeholder="Enter No. of Technical Support Engineers" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="annualrev">Annual Revenue<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="annualrev" class="form-control" name="annualrev" type="text" placeholder="Enter Annual Revenue" style="margin-top: 10px;" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="salesterr">Sales Territories Covered<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="salesterr" class="form-control" name="salesterr" type="text" placeholder="Enter Sales Territories" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="salesterr">Current Focus Segment<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1 line-h-22">
                  <label class="checkbox-inline"><input id="education" name="segment[]" type="checkbox" value="education" />Education</label> 
                  <label class="checkbox-inline"><input id="enterprises" name="segment[]" type="checkbox" value="enterprises" />Enterprises</label> 
                  <label class="checkbox-inline"><input id="government" name="segment[]" type="checkbox" value="government" />Government</label> 
                  <label class="checkbox-inline"><input id="health" name="segment[]" type="checkbox" value="health" />Health</label> 
                  {{--<label class="checkbox-inline"><input id="individual" name="segment[]" type="checkbox" value="individual" />Individual</label> 
                  <label class="checkbox-inline"><input id="users" name="segment[]" type="checkbox" value="users" />Users</label>--}} 
                  <label class="checkbox-inline"><input id="infrastructure" name="segment[]" type="checkbox" value="infrastructure" />Infrastructure &amp; Retail</label> 
                  <label class="checkbox-inline"><input id="media" name="segment[]" type="checkbox" value="media" />Media</label>
                   <label class="checkbox-inline"><input id="service" name="segment[]" type="checkbox" value="service" />Service Provider</label>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="productso">Products/services offered<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="productso" class="form-control" name="productso" type="text" placeholder="Enter Products/services offered" /></div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Brands Dealt With<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1"><input id="brabdsd" class="form-control" name="brabdsd" type="text" placeholder="Enter Brands Dealt With" /></div>
            </div>
             <div class="clearfix"></div>
             <!-- Product interested for Reselling start -->
             <div class="form-group col-sm-12 col-md-12">
              <p>Product interested for Reselling</p>
             </div>
               <div class="form-group">                  
               <label class="control-label col-sm-4" for="brabdsd">Video Conferencing<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                   <select class="form-control" name="video_conf">
                 <option value="">--Select--</option>
                    <option>Cloudline</option>
                    <option>Tely</option>
                    <option>Kickle</option>
                  </select>
                   </div>
                </div>
              <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Video Streaming<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                   <select class="form-control" name="video_steam">
                   <option value="">--Select--</option>
                    <option>Ncast</option>
                  </select>
                   </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Video Recording<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                   <select class="form-control" name="video_record">
                        <option value="">--Select--</option>
                    <option>VSTOR</option>
                  </select>
                   </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Video Camera<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                   <select class="form-control" name="video_camera">
                 <option value="">--Select--</option>
                    <option>View</option>
                  </select>
                   </div>
            </div>
             <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Microphones<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1">
                   <select class="form-control" name="microphone">                       
                    <option value="">--Select--</option>
                    <option> Acoustic Magic</option>
                       <option>Avermedia</option>
                  </select>
                   </div>
            </div>
             <!-- Product interested for Reselling end -->
            <div class="form-group">
               <label class="control-label col-sm-4" for="brabdsd">Reason for Interest in A&amp;T Video Networks<span class="color-red">*</span></label>
               <div class="col-sm-7 mb-1 line-h-22">
                  <label class="checkbox-inline d-block ml-10px"> <input id="1" name="reason[]" type="checkbox" value="reason1" />I find A&amp;T&rsquo;s products very interesting for my segment</label> 
                  <label class="checkbox-inline d-block"> <input id="2" name="reason[]" type="checkbox" value="reason2" /> I believe A&amp;T&rsquo;s products more suitable for my region </label> 
                                  <label class="checkbox-inline d-block"> <input id="5" name="reason[]" type="checkbox" value="reason5" /> Leverage A&amp;T&rsquo;s expertise for my market </label>
                  <label class="checkbox-inline d-block"> <input id="3" name="reason[]" type="checkbox" value="reason3" /> I want to expand my product portfolio </label>
                  <label class="checkbox-inline d-block"> <input id="4" name="reason[]" type="checkbox" value="reason4" /> I want to expand into other vertical segments </label>           
               </div>
            </div>
            <div class="form-group">
                 <label class="control-label col-sm-4" for="code">Captcha <span class="color-red">*</span></label>
                 <div class="col-sm-7">
                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">   
                    {!! app('captcha')->display(); !!}
                 </div>
            </div>
            <div id="captcha-err" style="padding:10px; text-align: right;" class="error"></div>
         </div>
         <div class="clearfix "></div>
         <div class="box-footer" style="margin-top: 20px;">
            <center>
               <button class="btn btn-primary" name="btn-partnerregister" id="btn-partnerregister" type="button">Submit</button>
            </center>
         </div>
      </form>
      <script src="{{ asset('js/pagejs/partner-register.js?v=2.3') }}"></script>          
      </div>
    </div>
</div>
@endsection
