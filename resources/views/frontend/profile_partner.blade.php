<form id="myprofile" name="myprofile" method="POST" action="{{ url('user/myprofile_partner/save') }}" >
   {{ csrf_field() }}
   <input type="hidden" name="hidid" id="hidid" value="{{ $user->id }}">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="form-group">
        <label class="control-label col-sm-4" for="company">Partner Type <span class="color-red">*</span></label>
           <label class="checkbox-inline">&nbsp;&nbsp;&nbsp;&nbsp;<input id="rpartner" name="partner_type[]" type="checkbox" value="Referral Partner"  <?php if (strpos($user->partner_type, 'Referral Partner') !== false) { ?> checked <?php } ?>>Referral Partner</label> 
           <label class="checkbox-inline"><input id="reselpartner" name="partner_type[]" type="checkbox" value="Reseller Partner" <?php if (strpos($user->partner_type, 'Reseller Partner') !== false) { ?> checked <?php } ?>>Reseller Partner</label> 
           <label class="checkbox-inline"><input id="techpartner" name="partner_type[]" type="checkbox" value="Technology Partner" <?php if (strpos($user->partner_type, 'Technology Partner') !== false) { ?> checked <?php } ?>>Technology Partner</label>   
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="company">Company <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="company" class="form-control" name="company" type="text" placeholder="Enter Company" value="{{ $user->companyname }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="namep">Name <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="namep" class="form-control" name="namep" type="text"  value="{{ $user->first_name }} {{ $user->last_name }}" placeholder="Enter Name" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="email">Email <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1">
            <input id="pemail" class="form-control" name="email" type="text" readonly="" placeholder="Enter Email" value="{{ $user->email }}" />
            <div id="pvalEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;">&nbsp;</div>
         </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="phone">Phone <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="phone" class="form-control number" name="phone" type="text" placeholder="Enter Phone" value="{{ $user->phone }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="street">Street <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="street" class="form-control" name="street" type="text" placeholder="Enter Street" value="{{ $user->street }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="state">State<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="state" class="form-control" name="state" type="text" placeholder="Enter State"  value="{{ $user->state }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="yearbusiness">Years in Business<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="yearbusiness" class="form-control" name="yearbusiness" type="text" placeholder="Enter Year in Business" value="{{ $user->year_of_establishment }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="salespersonal">No. of Sales Personnel<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="salespersonal" class="form-control" name="salespersonal" type="text" placeholder="Enter No. of Sales Personnel" value="{{ $user->no_of_sales }}" /></div>
      </div>
      <div class="form-group mb-5">
         <label class="control-label col-sm-4" for="supporteng">No. of Technical Support Engineers<span class="color-red">*</span></label>
         <div class="col-sm-7"><input id="supporteng" class="form-control" name="supporteng" type="text" placeholder="Enter No. of Technical Support Engineers" value="{{ $user->no_of_technical }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="annualrev">Annual Revenue<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="annualrev" class="form-control" name="annualrev" type="text" placeholder="Enter Annual Revenue" value="{{ $user->annual_revenue }}" style="margin-top: 10px;" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="salesterr">Sales Territories Covered<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="salesterr" class="form-control" name="salesterr" type="text" placeholder="Enter Sales Territories" value="{{ $user->sales_territories }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="salesterr">Current Focus Segment<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1 line-h-22">
            <label class="checkbox-inline"><input id="education" name="segment[]" type="checkbox" value="education" <?php if (strpos($user->current_focus, 'education') !== false) { ?> checked <?php } ?>>Education</label> 

           <label class="checkbox-inline"><input id="enterprises" name="segment[]" type="checkbox" value="enterprises" <?php if (strpos($user->current_focus, 'enterprises') !== false) { ?> checked <?php } ?>>Enterprises</label> 

           <label class="checkbox-inline"><input id="government" name="segment[]" type="checkbox" value="government" <?php if (strpos($user->current_focus, 'government') !== false) { ?> checked <?php } ?>>Government</label> 

           <label class="checkbox-inline"><input id="health" name="segment[]" type="checkbox" value="health" <?php if (strpos($user->current_focus, 'health') !== false) { ?> checked <?php } ?>>Health</label> 

           <label class="checkbox-inline"><input id="infrastructure" name="segment[]" type="checkbox" value="infrastructure" <?php if (strpos($user->current_focus, 'infrastructure') !== false) { ?> checked <?php } ?>>Infrastructure &amp; Retail</label> 

           <label class="checkbox-inline"><input id="media" name="segment[]" type="checkbox" value="media" <?php if (strpos($user->current_focus, 'media') !== false) { ?> checked <?php } ?>>Media</label>

            <label class="checkbox-inline"><input id="service" name="segment[]" type="checkbox" value="service" <?php if (strpos($user->current_focus, 'service') !== false) { ?> checked <?php } ?>>Service Provider</label>
         </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="productso">Products/services offered<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="productso" class="form-control" name="productso" type="text" placeholder="Enter Products/services offered" value="{{ $user->product_offer }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="brabdsd">Brands Dealt With<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="brabdsd" class="form-control" name="brabdsd" type="text" placeholder="Enter Brands Dealt With" value="{{ $user->brand_deal }}" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="brabdsd">Reason for Interest in A&amp;T Video Networks<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1 line-h-22">
            <label class="checkbox-inline d-block ml-10px"> <input id="1" name="reason[]" type="checkbox" value="reason1" <?php if (strpos($user->reason_for_interest, 'reason1') !== false) { ?> checked <?php } ?>>I find A&amp;T’s products very interesting for my segment</label> 

           <label class="checkbox-inline d-block"> <input id="2" name="reason[]" type="checkbox" value="reason2" <?php if (strpos($user->reason_for_interest, 'reason2') !== false) { ?> checked <?php } ?>> I believe A&amp;T’s products more suitable for my region </label> 

           <label class="checkbox-inline d-block"> <input id="3" name="reason[]" type="checkbox" value="reason3" <?php if (strpos($user->reason_for_interest, 'reason3') !== false) { ?> checked <?php } ?>> I want to expand my product portfolio </label> 

           <label class="checkbox-inline d-block"> <input id="4" name="reason[]" type="checkbox" value="reason4" <?php if (strpos($user->reason_for_interest, 'reason4') !== false) { ?> checked <?php } ?>> I want to expand into other vertical segments </label> 

           <label class="checkbox-inline d-block"> <input id="5" name="reason[]" type="checkbox" value="reason5" <?php if (strpos($user->reason_for_interest, 'reason5') !== false) { ?> checked <?php } ?>> Leverage A&amp;T’s expertise for my market </label>
         </div>
      </div>
   </div>
   <div class="clearfix "></div>
   <div class="box-footer" style="margin-top: 20px;">
      <center>
         <button class="btn btn-primary btn_submit" name="submit" id="submit" type="button">Submit</button>
      </center>
   </div>
</form>
<script src="{{ asset('js/pagejs/profile-partner.js?v=1.3') }}"></script>