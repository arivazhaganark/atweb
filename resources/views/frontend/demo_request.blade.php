<h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Demo / Presentation Request</strong></h4>
<p>Request a personalized Demo to see how A&T will help you know the ultimate meaning of “Innovating everything video”</p>

<form id="demo_request_form" name="demo_request_form" method="POST" action="{{ url('demo_request_form/save') }}" onsubmit="return false;" novalidate="novalidate">
   {{ csrf_field() }}              
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Request for <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="radio" name="request" id="request" value="Demo"> Demo &nbsp;&nbsp;
            <input type="radio" name="request" id="request" value="Presentation"> Presentation
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Demo at <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input type="radio" name="demo_at" id="demo_at" value="At your site"> At your site &nbsp;&nbsp;
            <input type="radio" name="demo_at" id="demo_at" value="Visit our customer site"> Visit our customer site
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Company Name <span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="company_name" id="company_name" type="text" class="form-control" value="" placeholder="Company Name"/>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Location<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="location" id="location" type="text" class="form-control" value="" placeholder="Location"/>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Preferred Demo Date<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="demo_date" id="demo_date" type="text" class="form-control" placeholder="Date"/>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Demo Time<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="demo_time" id="demo_time" type="text" class="form-control timepicker" value="" placeholder="Demo Time"/>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Person in charge & Designation<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="person_incharge" id="person_incharge" type="text" class="form-control" value="" placeholder="Person in charge & Designation"/>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Phone No.(Landline No./Mobile)<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <input name="phone" id="phone" type="text" class="form-control" value="" placeholder="Phone No.(Landline No./Mobile)"/>
         </div>
      </div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Decision Making Authority’s presence<span class="text-red">*</span></label>
         <div class="col-sm-4 mb-1">
            <label class="radio-inline"><input type="radio" name="optradio" value="yes">Yes</label>
            <label class="radio-inline"><input type="radio" name="optradio" value="no">No</label>
         </div>
      </div>
       <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Segment<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <select class="form-control" id="segment" name="segment">
               <option value="">Select</option>
               <option value="education">Education</option>
               <option value="enterprises">Enterprises</option>
               <option value="government">Government</option>
               <option value="health">Health</option>
               <option value="individualusers">Individual Users </option>
               <option value="infrastructure_retail">Infrastructure & Retail </option>
               <option value="media">Media</option>
               <option value="serviceprovider">Service Provider</option>
               <option value="individualusers">Individual Users </option>
            </select>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Demo On<span class="text-red">*</span></label>
         <div class="col-sm-6 mb-1">
            <select class="form-control" name="demon" id="demon">
               <option value="">Select</option>
               <option value="Video Conferencing">Video Conferencing</option>
               <option value="Video Streaming">Video Streaming</option>
               <option value="Video Recording">Video Recording</option>
               <option value="Video Cameras">Video Cameras</option>
               <option value="Microphones">Microphones</option>
               <option value="Visualiser">Visualiser</option>
               <option value="Cloud Video conferencing">Cloud Video conferencing</option>
               <option value="Cloud Video Streaming">Cloud Video Streaming</option>
               <option value="Lecture Capture">Lecture Capture</option>
               <option value="E-Learning">E-Learning</option>
               <option value="Virtual Learning">Virtual Learning</option>
            </select>
         </div>
      </div>
      <div class="clearfix"></div>                       

      <div class="form-group mb-0" id="pro_name" style="display: none;">
         <label class="control-label col-sm-5">Product Name</label>
         <div class="col-sm-6 mb-1">
            <div id="combobox">
            </div>
         </div>
      </div>

      <div class="form-group mb-0">
         <label class="control-label col-sm-5">Solution Name </label>
         <div class="col-sm-6 mb-1">
            <select class="form-control" name="solution_name" id="solution_name">
            <option value="">Select</option>
            <option>Smart Classroom</option>
            <option>Virtual Classroom</option>
            <option>Lecture Capture-Digital Library</option>
            <option>eLearning-Distance Education</option>
            <option>Performance Capture System</option>
            <option>Surveillance</option>
            <option>Network Security</option>
            <option>Wireless Campus</option>
            <option>Telemedicine</option>
            <option>Surgery Recording</option>
            <option>ICU Interaction</option>
            <option>Ambulance Video System</option>
            <option>Patient Information System Display System</option>
            <option>Board Room-AV</option>
            <option>Small Conference/Huddle Rooms</option>
            <option>Mobility Conferencing</option>
            <option>Digital Training</option>
            <option>Board Room-AV</option>
            <option>Information Display Systems Signage</option>
            <option>Wired Network</option>
            <option>Wireless Network</option></option>
            <option>Conference Rooms</option>
            <option>Auditoriums</option>
            <option>Guest Information Display Systems</option>
            <option>Wireless Hotspot</option>
            </select>
         </div>
      </div>
      <div class="clearfix"></div>             
   </div>
   <div class="col-lg-12 text-center mt-2">
      <button class="btn btn-primary" id="demoreq" name="btn-demorequest" type="submit">Submit</button>
   </div>
</form>
<script src="{{ asset('js/pagejs/demo_request.js?v=2.1') }}"></script>
<script>
	datepickr('#demo_date', { dateFormat: 'd-m-Y' });
</script>
<link rel="stylesheet" href="{{ asset('assets/css/wickedpicker.min.css') }}">
<script type="text/javascript" src="{{ asset('assets/js/wickedpicker.min.js') }}"></script>
<script>
 $('.timepicker').wickedpicker();
</script>