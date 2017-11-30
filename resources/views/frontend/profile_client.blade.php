<form class="form-horizontal" name="myprofile" id="myprofile" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="hidid" id="hidid" value="{{ $user->id }}">
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
     <div class="form-group">
           <label class="control-label col-sm-4" for="company_name">Company Name <span class="color-red">*</span></label>
           <div class="col-sm-7">
              <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="{{ $user->companyname }}">
           </div>
        </div>           
        <div class="form-group">
           <label class="control-label col-sm-4" for="cperson">Contact Person <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="cperson" id="cperson" placeholder="Enter Contact Person" value="{{ $user->cperson }}">
           </div>
        </div>  
        <div class="form-group">
           <label class="control-label col-sm-4" for="email">Email <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="email" id="cemail" placeholder="Enter Email" value="{{ $user->email }}">
              <div id="valEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;"></div>
           </div>
        </div>   
           <div class="form-group">
           <label class="control-label col-sm-4" for="phone">Phone No <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{ $user->phone }}">
           </div>
        </div> 
        <div class="form-group">
           <label class="control-label col-sm-4" for="location">Location <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" value="{{ $user->location }}">
           </div>
        </div>  
        <div class="form-group">
           <label class="control-label col-sm-4" for="customer_usename">Customer Name <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="customer_usename" id="customer_usename" placeholder="Enter Customer Name" value="{{ $user->first_name }} {{ $user->last_name }}">
           </div>
        </div> 
         <div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <label>
              <strong>Would you also like to receive information on new products & technologies from us?</strong>
              <span class="color-red">*</span>
              </label>
            <label class="radio-inline"><input type="radio" name="optradio" value="1" @if($user->customer_notification==1) checked @endif>Yes</label>
            <label class="radio-inline"><input type="radio" name="optradio" value="0" @if($user->customer_notification==0) checked @endif>No</label>
          </div>
        </div> 
        <div class="form-group">
           <div class="col-sm-offset-4" style="padding-left: 15px;">
              <button type="button" class="btn btn-primary bg-blue border-orange btn_submit">Submit</button>
           </div>
        </div>
    </div>
  </form>
  <script src="{{ asset('js/pagejs/profile-client.js?v=1.4') }}"></script>