<h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Demo Feedback</strong></h4>
<form id="demo_feedback" name="demo_feedback" method="POST" action="{{ url('demo_feedback/save') }}" onsubmit="return false;" novalidate="novalidate">
   {{ csrf_field() }}          
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <div class="form-group">
         <label class="control-label col-sm-5" for="name">End Customer Name</label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="end_customer_name" placeholder="Enter End Customer" name="end_customer_name">
         </div>
      </div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Company Name <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="companyname" placeholder="Enter Company Name" name="companyname">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Location <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Person-in Charge <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="person_in_charge" placeholder="Enter Person-in Charge" name="person_in_charge">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Phone No.(Landline/Mobile) <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone No." name="phoneno">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Decision Making Authority’s Presence <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <label class="radio-inline"><input type="radio" name="decision" value="yes">Yes</label>
            <label class="radio-inline"><input type="radio" name="decision" value="no">No</label>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Product Name </label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Solution Name </label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="solution_name" placeholder="Enter Solution Name" name="solution_name">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
         <label class="control-label col-sm-5" for="name">Demo Date <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="text" class="form-control" id="demo_date" placeholder="Enter Demo Date" name="demo_date">
         </div>
      </div>
      <div class="clearfix"></div>
      <table class="table table-bordered">
         <tbody>
            <tr>
               <td colspan="1">Feedback parameters</td>
               <td colspan="1"><label class="font-bold"> Ratings</label>
                  <br/>
                  <label> 5 - Sufficient rating</label>
                  <br/>
                  <label> 3 - Average</label>
                  <br/>
                  <label>  1 - Expected better</label>
               </td>
               <td colspan="2"> <label class="font-bold">Suggestions</label></td>
            </tr>
            <tr>
               <td>
                  Demo pre requisite information provided by A & T team
               </td>
               <td colspan="1">
                  <div><input type="text" name="demo_pre" onkeypress="return isNum(event);" maxlength="5"></div>
               </td>
               <td colspan="2">
                  <div><textarea name="demo_pre_text"></textarea></div>
               </td>
            </tr>
            <tr>
               <td>
                  Demo co ordination by A & T team
               </td>
               <td colspan="1">
                  <div><input type="text" name="demo_coordination" onkeypress="return isNum(event);" maxlength="5"></div>
               </td>
               <td colspan="2">
                  <div><textarea name="demo_coordination_text"></textarea></div>
               </td>
            </tr>
            <tr>
               <td>
                  Technical details shared during demo 
               </td>
               <td colspan="1">
                  <div><input type="text" name="tech_detail" onkeypress="return isNum(event);" maxlength="5"></div>
               </td>
               <td colspan="2">
                  <div><textarea name="tech_detail_text"></textarea></div>
               </td>
            </tr>
            <tr>
               <td>
                  Product handling - features shown during demo 
               </td>
               <td colspan="1">
                  <div><input type="text" name="product_handling" onkeypress="return isNum(event);" maxlength="5"></div>
               </td>
               <td colspan="2">
                  <div><textarea name="product_handling_text"></textarea></div>
               </td>
            </tr>
            <tr>
               <td>
                  Demo purpose satisfaction level 
               </td>
               <td colspan="1">
                  <div><input type="text" name="demo_purpose" onkeypress="return isNum(event);" maxlength="5"></div>
               </td>
               <td colspan="2">
                  <div><textarea name="demo_purpose_text"></textarea></div>
               </td>
            </tr>
            <tr>
               <td>
                  Signature of the customer with seal
               </td>
               <td colspan="1">
                  <label>Customer Name</label>
                  <br/>
                  <div><input type="text" name="customer_name" id="customer_name"></div>
               </td>
               <td colspan="2">
                  <label>A&T E&D Engineer Name</label>
                  <br/>
                  <div><input type="text" name="at_engineer" id="at_engineer"></div>
               </td>
            </tr>
         </tbody>
      </table>
      <div class="clearfix"></div>
      <div class="text-center">
         <button class="btn btn-primary" name="btn-demofeedback" id="btn-demofeedback" type="submit">Submit</button>
      </div>
   </div>
</form>
<script src="{{ asset('js/pagejs/demo_feedback.js?v=1.6') }}"></script>
<script>
datepickr('#demo_date', { dateFormat: 'd-m-Y' });
</script>