<div class="conatainer">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <p>Ticket system allows you to trace the history of our technical support regarding your request. To submit a technical support ticket you need to choose the product you have problem with.</p>
         <form class="form-horizontal" name="customer_support" id="customer_support" method="post">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 center-block">
               <div class="form-group">
                  <label class="control-label col-sm-4" for="customerid">Customer Email
                  <span class="color-red">*</span></label>
                  <div class="col-sm-7"> 
                     <input type="text" class="form-control" name="customerid" id="customerid" placeholder="Enter Customer Email">
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-4" for="subject">Subject
                  <span class="color-red">*</span></label>
                  <div class="col-sm-7"> 
                     <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-sm-4" for="product_type">Product Type
                  <span class="color-red">*</span></label>
                  <div class="col-sm-7">
                     <select class="form-control" id="product_type" name="product_type">
                        <option value="">-- Select Product Type --</option>
                        <option>Video Conferencing</option>
                        <option> Video Streaming</option>
                        <option> Video Recording </option>
                        <option>Video Cameras</option>
                        <option>Audio Microphones </option>
                        <option>Visualisers</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <div class="table-responsive" style="overflow-y: hidden;">
                     <table class="table table-bordered" id="table">
                        <tbody>
                           <tr>
                              <td>
                                 Product Name <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="product_name" id="product_name" type="text" placeholder="Enter  Product Name"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Product serial number <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="p_serial_no" id="p_serial_no" type="text" placeholder="Enter  Product serial number"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Physical condition <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="physical_condition" id="physical_condition" type="text" placeholder="Enter Physical condition"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Problem at the time of complaint <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="p_complaint" id="p_complaint" type="text" placeholder="Enter Problem at the time of complaint"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Any action taken locally <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="locally" id="locally" type="text" placeholder="Enter Any action taken locally"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Date of Purchase (Optional)
                              </td>
                              <td>
                                 <div><input class="form-control" name="purchase" id="purchase" type="text" placeholder="Enter  Date of Purchase (Optional)"></div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Specify the time you’d like us to contact you <span class="color-red">*</span>
                              </td>
                              <td>
                                 <div><input class="form-control" name="specify" id="specify" type="text" placeholder="Enter Specify"></div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="form-group">
                  <p>                            
                     Please be as specific as possible when describing the problem you have encountered. The more details we have, the better we will be able to identify your problem and find a solution to it. If the problem still occurs, specify your actions.   
                  </p>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-0">
                     <textarea name="support_desc" id="support_desc" rows="7" cols="80"></textarea>
                  </div>
               </div>
               <!--button -->
               <div align="center">
                  <input type="button" class="btn btn-primary bg-blue border-orange btn-customer-support" value="Create Ticket">
               </div>
               <!-- button end --> 
            </div>
      </div>
      </form>
      <script src="{{ asset('js/pagejs/customer_support.js?v=2.1') }}"></script>
      <script>
			datepickr('#purchase', { dateFormat: 'd-m-Y' });
	  </script>
	  <style>.datepickr-calendar { position: relative !important; }</style>
   </div>
</div>
</div>

