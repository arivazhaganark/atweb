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
<section class="online_job_form">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}" style="margin: 10px;">{{ Session::get('message') }}</p>
            @else
            <h3 class="font-blue text-center">
               <strong>Online Job Application</strong>
            </h3>
            <p>(<strong>Instructions:</strong> Kindly fill this format by giving complete details. If a question does not apply to you mention “NA” Please be specific and to the point in your replies)</p>
            <p class="required" style="font-size: 12px; font-style: italic; color: crimson; float: right;">All fields are required *</p>
            <h4><strong>1. Personal Details</strong></h4>
            <form id="career_form" name="career_form" method="POST" action="{{ url('career/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
               <!-- personal details start-->
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="cname">  Name <span class="color-red">*</span></label>
                  <div class=""><input id="cname" class="form-control" name="cname" type="text" placeholder="Enter Name"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="address">Address <span class="color-red">*</span></label>
                  <div class=""><input id="address" class="form-control" name="address" type="text" placeholder="Enter Address"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="phoneno">Phone No<span class="color-red">*</span></label>
                  <div class="">
                     <input id="citypin" class="form-control" name="phoneno" type="text" placeholder="Enter Phone No">
                  </div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="email">Email-ID <span class="color-red">*</span></label>
                  <div class=""><input id="email" class="form-control" name="email" type="email" placeholder="Enter E-mail"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="email">Date of Birth: <span class="color-red">*</span></label>
                  <div class=""><input id="dob" class="form-control form_datetime" name="dob" type="text" placeholder="Enter DOB" onkeypress="return isNumberKey(event);"></div>
               </div>
               <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                  <label class="control-label" for="email">Age:<span class="color-red">*</span></label>
                  <div class=""><input id="age" class="form-control" name="age" type="text" placeholder="Enter Age"></div>
               </div>
               <!-- personal details end-->
               <div class="clearfix"></div>
               <!-- educational qualification start -->
               <h4><strong>2. Educational Qualification</strong></h4>
                <div class="educational-qua">
                <div class="table-responsive">
                 <table class="table table-bordered" id="table">
                        <thead>
                           <tr>
                              <th>Qualification</th>
                              <th>Year Of Passing <span class="color-red">*</span></th>
                              <th>Major <span class="color-red">*</span></th>
                              <th>Marks/Grade <span class="color-red">*</span></th>
                              <th>University/College/School <span class="color-red">*</span></th>
                           </tr>
                        </thead>
                           <tbody>
                           <!-- post graduation/post diploma start -->
                           <tr>
                              <td>Post Graduation/Post Diploma</td>
                                <td>
                                   <input class="form-control" name="yearofpass" id="yearofpass" type="text" placeholder="Enter Year Of Passing">
                                 </td>
                                 <td>
                              <input class="form-control" name="major" id="major" type="text" placeholder="Enter Major">
                                 </td>
                                 <td>
                                     <input class="form-control" name="marks_grade" id="marks_grade" type="text" placeholder="Enter Marks/Grade">
                                 </td>
                                 <td>
                                  <input class="form-control" name="uni_clg" id="uni_clg" type="text" placeholder="Enter University/College/School">
                                 </td>
                              </tr>
                               <!-- post graduation/post diploma end -->
                              <!-- graduation / diploma start -->
                              <tr>
                              <td>Graduation / Diploma</td>
                                <td>
                                   <input class="form-control" name="graduation_yearofpass" id="graduation_yearofpass" type="text" placeholder="Enter Year Of Passing">
                                 </td>
                                 <td>
                              <input class="form-control" name="graduation_major" id="graduation_major" type="text" placeholder="Enter Major">
                                 </td>
                                 <td>
                                     <input class="form-control" name="graduation_marks_grade" id="marks_grade" type="text" placeholder="Enter Marks/Grade">
                                 </td>
                                 <td>
                                  <input class="form-control" name="graduation_clg" id="graduation_clg" type="text" placeholder="Enter University/College/School">
                                 </td>
                              </tr> <!-- graduation / diploma end -->
                              <!-- higher secondary start -->
                               <tr>
                              <td>Higher Secondary</td>
                                <td>
                                   <input class="form-control" name="hs_yearofpass" id="hs_yearofpass" type="text" placeholder="Enter Year Of Passing">
                                 </td>
                                 <td>
                              <input class="form-control" name="hs_major" id="hs_major" type="text" placeholder="Enter Major">
                                 </td>
                                 <td>
                                     <input class="form-control" name="hs_marks_grade" id="hs_marks_grade" type="text" placeholder="Enter Marks/Grade">
                                 </td>
                                 <td>
                                  <input class="form-control" name="hs_clg" id="hs_clg" type="text" placeholder="Enter University/College/School">
                                 </td>
                              </tr>  <!-- higher secondary end -->
                               <!-- secondary start -->
                                <tr>
                              <td>Secondary</td>
                                <td>
                                   <input class="form-control" name="sec_yearofpass" id="sec_yearofpass" type="text" placeholder="Enter Year Of Passing">
                                 </td>
                                 <td>
                              <input class="form-control" name="sec_major" id="sec_major" type="text" placeholder="Enter Major">
                                 </td>
                                 <td>
                                     <input class="form-control" name="sec_marks_grade" id="sec_marks_grade" type="text" placeholder="Enter Marks/Grade">
                                 </td>
                                 <td>
                                  <input class="form-control" name="sec_clg" id="sec_clg" type="text" placeholder="Enter University/College/School">
                                 </td>
                              </tr> <!-- secondary start end-->
                              </tbody>
                        </table>
                        </div>
                       </div>
               <!-- educational qualification end -->
               <div class="clearfix"></div>
               <!-- work experience start-->
               <h4><strong>3. Work Experience</strong></h4>
               <p>Experienced/Fresher. If Experienced, Give the following details</p>
               <p>Employment Details (In the order of Current to Past)</p>
               <div class="work-exp">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="table">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Company </th>
                              <th>Description</th>
                              <th>Period of service <br/>(From yr-to yr)</th>
                              <th>Location</th>
                              <th>Nature of Job</th>
                              <th>Salary Drawn</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1.</td>
                              <td><input class="form-control" name="company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td>
                              <textarea name="description[]" id="description" placeholder="Enter Description"></textarea>
                              </td>
                              <td><input class="form-control" name="periodofservice[]" id="description" type="text" placeholder="Enter Period of service"></td>
                              <td><input class="form-control" name="location[]" id="location" type="text" placeholder="Enter Location"></td>
                              <td><input class="form-control" name="natureofjob[]" id="natureofjob" type="text" placeholder="Enter Nature of Job"></td>
                              <td><input class="form-control" name="salary_drawn[]" id="salary_drawn" type="text" placeholder="Enter Salary Drawn"></td>
                           </tr>
                           <tr>
                              <td>2.</td>
                              <td><input class="form-control" name="company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td>
                              <textarea name="description[]" id="description" placeholder="Enter Description"></textarea>
                              </td>
                              <td><input class="form-control" name="periodofservice[]" id="description" type="text" placeholder="Enter Period of service"></td>
                              <td><input class="form-control" name="location[]" id="location" type="text" placeholder="Enter Location"></td>
                              <td><input class="form-control" name="natureofjob[]" id="natureofjob" type="text" placeholder="Enter Nature of Job"></td>
                              <td><input class="form-control" name="salary_drawn[]" id="salary_drawn" type="text" placeholder="Enter Salary Drawn"></td>
                           </tr>
                           <tr>
                              <td>3.</td>
                              <td><input class="form-control" name="company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td>
                              <textarea name="description[]" id="description" placeholder="Enter Description"></textarea>
                              </td>
                              <td><input class="form-control" name="periodofservice[]" id="description" type="text" placeholder="Enter Period of service"></td>
                              <td><input class="form-control" name="location[]" id="location" type="text" placeholder="Enter Location"></td>
                              <td><input class="form-control" name="natureofjob[]" id="natureofjob" type="text" placeholder="Enter Nature of Job"></td>
                              <td><input class="form-control" name="salary_drawn[]" id="salary_drawn" type="text" placeholder="Enter Salary Drawn"></td>
                           </tr>
                           <tr>
                              <td>4.</td>
                              <td><input class="form-control" name="company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td>
                               <textarea name="description[]" id="description"  placeholder="Enter Description"></textarea>
                              </td>
                              <td><input class="form-control" name="periodofservice[]" id="description" type="text" placeholder="Enter Period of service"></td>
                              <td><input class="form-control" name="location[]" id="location" type="text" placeholder="Enter Location"></td>
                              <td><input class="form-control" name="natureofjob[]" id="natureofjob" type="text" placeholder="Enter Nature of Job"></td>
                              <td><input class="form-control" name="salary_drawn[]" id="salary_drawn" type="text" placeholder="Enter Salary Drawn"></td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"><strong>Last Drawn Salary</strong><span class="color-red">*</span></label>
                        <input class="form-control" name="last_salary" id="last_salary" type="text" placeholder="Enter Last Drawn Salary">                 
                     </div>
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"><strong>CTC</strong><span class="color-red">*</span></label>
                        <input class="form-control" name="last_ctc" id="last_ctc" type="text" placeholder="CTC">                 
                     </div>
                  </div>
               </div>
               <!--
                  <div class="work-exp">
                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Sl.No</strong><span class="color-red">*</span></label>
                  </div> 
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Company</strong> <span class="color-red">*</span></label>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Description</strong><span class="color-red">*</span></label>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Period of service (From yr-to yr) </strong><span class="color-red">*</span></label>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Location</strong><span class="color-red">*</span></label>
                  </div>  
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Nature of Job</strong><span class="color-red">*</span></label>
                  </div> 
                      <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                   <label class="control-label"><strong>Salary  Drawn </strong><span class="color-red">*</span></label>
                  </div> 
                  </div>
                  -->
               <!-- work experience end-->        
               <!-- project/Industial training details start-->   
               <div class="project-industrial-training">
                  <h4>Project/Industial Training Details</h4>
                  <div class="table-responsive">
                     <table class="table table-bordered" id="table2">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Company </th>
                              <th>Details of Project/Training</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1.</td>
                              <td><div><input class="form-control" name="pro_company[]" id="company" type="text" placeholder="Enter Company"></div></td>
                              <td><input class="form-control" name="pro_description[]" id="description" type="text" placeholder="Enter Details of Project/Training"></td>
                           </tr>
                           <tr>
                              <td>2.</td>
                              <td><input class="form-control" name="pro_company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td><input class="form-control" name="pro_description[]" id="description" type="text" placeholder="Enter Details of Project/Training"></td>
                           </tr>
                           <tr>
                              <td>3.</td>
                              <td><input class="form-control" name="pro_company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td><input class="form-control" name="pro_description[]" id="description" type="text" placeholder="Enter Details of Project/Training"></td>
                           </tr>
                           <tr>
                              <td>4.</td>
                              <td><input class="form-control" name="pro_company[]" id="company" type="text" placeholder="Enter Company"></td>
                              <td><input class="form-control" name="pro_description[]" id="description" type="text" placeholder="Enter Details of Project/Training"></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- project/Industial training details end-->  
               <!-- two wheeler start--> 
               <div class="two-wheeler">
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                     <label class="control-label" for="frimname">
                     <strong> 4. Do you own a Two Wheeler?</strong><span class="color-red">*</span></label>
                     <label class="radio-inline">
                     <input id="yes" name="two-wheeler" type="radio" value="yes">Yes</label> 
                     <label class="radio-inline">
                     <input id="no" name="two-wheeler" type="radio" value="no">No</label>  
                  </div>
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                     <label class="control-label" for="frimname"> 
                     Can you drive a Two Wheeler? <span class="color-red">*</span></label>
                     <label class="radio-inline">
                     <input id="yes" name="drive-two-wheeler" class="" type="radio" value="yes">Yes</label> 
                     <label class="radio-inline">
                     <input id="no" name="drive-two-wheeler" class="two-wheeler" type="radio" value="no">No</label>  
                  </div>
               </div>
                <div class="clearfix"></div>
               <!-- two wheeler end-->  
               <!-- travel  start--> 
               <div class="travel">
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                     <label class="control-label" for="travel">
                     <strong>5. Are you willing to travel in your work within Madurai city</strong>
                     <span class="color-red">*</span></label>
                     <label class="radio-inline">
                     <input id="yes" name="travel_in" type="radio" value="yes">Yes</label> 
                     <label class="radio-inline">
                     <input id="no" name="travel_in" type="radio" value="no">No</label>  
                  </div>
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                     <label class="control-label" for="travel"> Are you willing to travel in your work outside Madurai city<span class="color-red">*</span></label>
                     <label class="radio-inline">
                     <input id="yes" name="travel_out" type="radio" value="yes">Yes</label> 
                     <label class="radio-inline">
                     <input id="no" name="travel_out" type="radio" value="no">No</label>  
                  </div>
               </div>
                <div class="clearfix"></div>
               <!-- travel  end--> 
               <!-- relocate  start--> 
               <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                  <label class="control-label" for="frimname"> 
                  <strong>
                  6. Would you be willing to relocate to any other city in any part of India?</strong>
                  <span class="color-red">*</span></label>
                  <label class="radio-inline">
                  <input id="yes" name="relocate" type="radio" value="yes">Yes</label> 
                  <label class="radio-inline">
                  <input id="no" name="relocate" type="radio" value="no">No</label> 
               </div>
               <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0px;">
                  <label class="control-label" for="relocate">Would you be willing to relocate to any other country?<span class="color-red">*</span></label>
                  <label class="radio-inline">
                  <input id="yes" name="relocate_country" type="radio" value="yes">Yes</label> 
                  <label class="radio-inline">
                  <input id="no" name="relocate_country" type="radio" value="no">No</label> 
               </div>
               <!-- relocate  end--> 
               <div class="clearfix"></div>
               <!-- family details start--> 
               <div class="family-details">
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label"> (a) Father's Name <span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="father_name" name="father_name" type="text" placeholder="Enter Father's Name"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label"> (b) Father's Occupation <span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="father_occp" name="father_occp" type="text" placeholder="Enter Father's Occupation"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label"> (c) Mother's Name <span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="mother_name" name="mother_name" type="text" placeholder="Enter Mother's Name"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label"> (d) Mother's Occupation<span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="mother_occp" name="mother_occp" type="text" placeholder="Enter Mother's Occupation"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-5">
                     <label class="control-label" for="relocate">(i) If your Parent's not employed,
                     Are they dependent on you: Yes/No<span class="color-red">*</span></label>
                     <br/>
                     <label class="radio-inline">
                     <input id="yes" name="dependent" type="radio" value="yes">Yes</label> 
                     <label class="radio-inline">
                     <input id="no" name="dependent" type="radio" value="no">No</label> 
                  </div>
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <label class="control-label"> (e) No. of Siblings <span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="siblings" name="siblings" type="text" placeholder="Enter No. of Siblings"></div>
                  </div>
                  <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <label class="control-label"> (f) Siblings Employment Status<span class="color-red">*</span></label>
                     <div class=""><input class="form-control" id="siblings_emp" name="siblings_emp" type="text" placeholder="Enter Siblings's Employment Status"></div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- marital status start-->
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label"> (g) Marital Status <span class="color-red">*</span></label>
                     <input class="form-control" id="marital_status" name="marital_status" type="text" placeholder="Enter Marital Status"> 
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                     <label class="control-label">  (i) If Married, Mention Spouse Name</label>
                     <input class="form-control" id="spouse_name" name="spouse_name" type="text" placeholder="Enter Spouse Name">     
                  </div>
                  <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                     <label class="control-label">  (ii) Spouse's Employment Status</label>
                     <input class="form-control" id="emp_status" name="spouse_emp_status" type="text" placeholder="Enter Spouse Employment Status">     
                  </div>
                  <div class="form-group col-xs-12 col-sm-5 col-md-5 col-lg-5">
                     <label class="control-label">  (iii) If Employed. Give the details of Employer & Salary drawn </label>
                     <input class="form-control" id="emp_status" name="emp_status" type="text" placeholder="Enter Spouse Salary drawn">     
                  </div>
                  <!-- marital status end-->
                  <div class="clearfix"></div>
                  <!-- details of children start-->
                  <div class="details_child">
                     <p>(h). Details of Children </p>
                     <div class="table-responsive">
                        <table class="table table-bordered" id="table3">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Age</th>
                                 <th>School</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><input class="form-control" name="child_name[]" id="child_name" type="text" placeholder="Enter Name"></td>
                                 <td><input class="form-control" name="child_age[]" id="child_age" type="text" placeholder="Enter Age"></td>
                                 <td><input class="form-control" name="child_school[]" id="child_school" type="text" placeholder="Enter School"></td>
                              </tr>
                              <tr>
                                 <td><input class="form-control" name="child_name[]" id="child_name" type="text" placeholder="Enter Name"></td>
                                 <td><input class="form-control" name="child_age[]" id="child_age" type="text" placeholder="Enter Age"></td>
                                 <td><input class="form-control" name="child_school[]" id="child_school" type="text" placeholder="Enter School"></td>
                              </tr>
                              <tr>
                                 <td><input class="form-control" name="child_name[]" id="child_name" type="text" placeholder="Enter Name"></td>
                                 <td><input class="form-control" name="child_age[]" id="child_age" type="text" placeholder="Enter Age"></td>
                                 <td><input class="form-control" name="child_school[]" id="child_school" type="text" placeholder="Enter School"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- details of children end-->
                  <!-- related persons start-->
                  <div class="related persons">
                     <p>8. Please give the names of two persons who would vouch for your conduct: (They must not be related to you)</p>
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Contact Number</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><input class="form-control" name="related_person[]" id="related_person" type="text" placeholder="Enter Name"></td>
                                 <td><input class="form-control" name="related_cnumber[]" id="related_cnumber" type="text" placeholder="Enter Contact Number"></td>
                              </tr>
                              <tr>
                                 <td><input class="form-control" name="related_person[]" id="related_person" type="text" placeholder="Enter Name"></td>
                                 <td><input class="form-control" name="related_cnumber[]" id="related_cnumber" type="text" placeholder="Enter Contact Number"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- related persons end-->
                  <!-- expected salary start-->
                  <div class="expected_salary">
                     <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                        <label class="control-label"> 
                        <strong>9. What is the salary expected from us? Please feel free to give the minimum you would be willing to accept. </strong></label>
                        <input class="form-control" id="salary_expected" name="salary_expected" type="text" placeholder="Enter Salary Expected">     
                     </div>
                  </div>
                  <!-- expected  salary end-->
                  <!-- notice period  start-->
                  <div class="expected_salary">
                     <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;"> 
                        <label class="control-label"> 
                         <strong>10. If Selected how soon can you join / Minimum Notice period required?
                          </strong>
                          </label>
                        <input class="form-control" id="notice_period" name="notice_period" type="text" placeholder="Enter Notice Period">     
                     </div>
                  </div>
                  <!--  notice period end-->
                  <p>
                     <strong>
                     I here by declare that all statement made in this application are true, complete and correct to the best of my
                     knowledge and belief.
                     </strong>
                  </p>
                  <div class="place">
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"> Place</label>
                        <input class="form-control" id="place" name="place" type="text" placeholder="Enter place">     
                     </div>
                  </div>
                  <div class="date">
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"> Date</label>
                        <input class="form-control form_datetime" id="date" name="date" type="text" placeholder="Enter Date" onkeypress="return isNumberKey(event);">     
                     </div>
                  </div>
                  <div class="name">
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"> Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter Name">     
                     </div>
                  </div>
                  <div class="signature">
                     <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label"> Signature</label>
                        <input id="signature" name="signature" type="file">     
                     </div>
                  </div>                  
               </div> 
               <!-- family details end-->   
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;">
                   <input type="submit"  class="btn btn-primary bg-blue border-orange btn-partner-login" value="Submit" />
               </div>             
            </form>
            <script src="{{ asset('js/pagejs/career.js?v=3.2') }}"></script>
            <style type="text/css">
              .error {
                  border: 1px solid #f00;
              }
              .valid {
                  border: 1px solid lightgray;
              }
              .table > thead > tr > th { vertical-align: top !important; }
            </style>
            @endif   
         </div>        
      </div>
   </div>
</section>
@endsection
