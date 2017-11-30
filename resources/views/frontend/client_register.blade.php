<!--   <h4 class="font-green">
    <strong>Customer Registration</strong>
  </h4> --> 
  <div class="row">
    <form class="form-horizontal" name="client_reg" id="client_reg" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="type" id="type" value="C">
     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 center-block">
        <div class="form-group">
           <label class="control-label col-sm-4" for="company_name">Company Name <span class="color-red">*</span></label>
           <div class="col-sm-7">
              <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name ">
           </div>
        </div>           
        <div class="form-group">
           <label class="control-label col-sm-4" for="cperson">Contact Person <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="cperson" id="cperson" placeholder="Enter Contact Person">
           </div>
        </div>  
        <div class="form-group">
           <label class="control-label col-sm-4" for="email">Email <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="email" id="cemail" placeholder="Enter Email">
              <div id="valEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;"></div>
           </div>
        </div>   
        <div class="form-group">
           <label class="control-label col-sm-4" for="phone">Phone No <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
           </div>
        </div> 
        <div class="form-group">
           <label class="control-label col-sm-4" for="location">Location <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location">
           </div>
        </div>
        <div class="form-group">
           <label class="control-label col-sm-4" for="customer_usename">User Name <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="text" class="form-control" name="customer_usename" id="customer_usename" placeholder="Enter Customer Name">
           </div>
        </div> 
        {{--<div class="form-group">
           <label class="control-label col-sm-4" for="email">Password <span class="color-red">*</span></label>
           <div class="col-sm-7"> 
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
           </div>
        </div>--}}     
        <div class="form-group">
           <label class="control-label col-sm-4" for="code">Captcha <span class="color-red">*</span></label>
           <div class="col-sm-7">
              <input type="hidden" class="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">
              {!! app('captcha')->display(); !!}
           </div>
        </div>
                <div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p>
          On submission our Sales Team will approve and allocate a Customer ID. Using these credentials, you may contact us for raising support ticket as well as access many of our resources. 
          <p>
          </div>
          </div>
         <div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <label>
              <strong>Would you also like to receive information on new products & technologies from us?</strong>
              <span class="color-red">*</span>
              </label>
            <label class="radio-inline"><input type="radio" name="optradio" value="1">Yes</label>
            <label class="radio-inline"><input type="radio" name="optradio" value="0">No</label>
          </div>
        </div> 
        <div id="captcha-err" style="padding:10px; text-align: right;" class="error"></div>
        <div class="form-group">
           <div class="col-sm-offset-4" style="padding-left: 15px;">
              <button type="button" class="btn btn-primary bg-blue border-orange btn_client_reg">Submit</button>
           </div>
        </div>
     </div>
  </form>
</div>

<script src="{{ asset('js/pagejs/client-reg-validation.js?v=4.3') }}"></script>
<style type="text/css">
.g-recaptcha { transform:scale(0.88);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0; }
</style>