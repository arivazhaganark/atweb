<!-- Deal Registration form-->
<form id="dealregister" name="dealregister" method="POST" action="{{ url('/dealregistrationstore') }}" >
   {{ csrf_field() }}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="form-group">
         <label class="control-label col-sm-4" for="endcustomer">End Customer <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="endcustomer" class="form-control" name="endcustomer" type="text" placeholder="Enter End Customer" /></div>
      </div>
        <div class="form-group">
         <label class="control-label col-sm-4" for="personincharge">Person in-Charge <span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="personincharge" class="form-control" name="personincharge" type="text" placeholder="Enter Person in-Charge" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="designation">Designation<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="designation" class="form-control" name="designation" type="text" placeholder="Enter Designation" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="mobileno">Mobile No.</label>
         <div class="col-sm-7 mb-1"><input id="mobileno" class="form-control number" name="mobileno" type="text" placeholder="Enter Mobile no" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="landno">Landline No.<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="landno" class="form-control" name="landno" type="text" placeholder="Enter Landline no" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="emailid">Email ID<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="emailid" class="form-control" name="emailid" type="text" placeholder="Enter Email ID" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="products">Opportunity/Products<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="products" class="form-control" name="products" type="text" placeholder="Enter Opportunity/Products" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="application">Application</label>
         <div class="col-sm-7 mb-1"><input id="application" class="form-control" name="application" type="text" placeholder="Enter Application" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="ovalue">Opportunity value<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="ovalue" class="form-control" name="ovalue" type="text" placeholder="Enter Opportunity value" /></div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="tender">Tender or private<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="tender" class="form-control" name="tender" type="text" placeholder="Enter Tender or private" /></div>
      </div>
     <div class="form-group">
         <label class="control-label col-sm-4" for="closing">Expected Closing date<span class="color-red">*</span></label>
         <div class="col-sm-7 mb-1"><input id="datepickr" class="form-control" name="closing" type="text" placeholder="Enter Expected Closing date" /></div>
      </div>
       <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-4" for="accessories">Other accessories / products needed</label>
         <div class="col-sm-7 mb-1"><input id="accessories" class="form-control" name="accessories" type="text" placeholder="Enter Other accessories / products needede" /></div>
      </div>

      <div class="clearfix "></div>
      <div class="box-footer">
         <center>
         <button class="btn btn-primary" name="btn-dealregister" id="btn-dealregister" type="submit">Submit</button>
         <center>
      </div>
</form>

<script src="{{ asset('js/pagejs/deal-reg.js?v=1.8') }}"></script>
<script>
	datepickr('#datepickr', { dateFormat: 'd-m-Y' });
</script>

</div>                  
