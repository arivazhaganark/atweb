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
      <div class="container-fluid">
         <div class="row">
            <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
            <span>/ &nbsp;</span>
            <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
            <span>/ &nbsp;</span>
            @if(Auth::guard('user')->user()->type=='E')
            <span>Resources</span> 
            @else
            <span>Dashboard</span> 
            @endif
         </div>
      </div>
   </div>
</section>
<div class="container">
   @if(Session::has('message'))
   <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
   @endif  
   @if(Auth::guard('user')->user()->type=='P')
   <h3 class="font-blue">
      <strong>Dashboard</strong>
   </h3>
   <!--dashboard block -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pl-0px pr-0 b-shadow-card m-auto d-block f-none">
            <div class="tabbable tabs-left">
               <ul class="nav nav-tabs left-tab-menu">
                  <div class="bg-blue-shade profile pt-10px">
                     <img src="{{ asset('assets/images/logo-tab.png') }}" class="m-auto d-block img-responsive img-round"/>
                     <p class="text-center mt-10 border-dotted-bottom pb-10 mb-0 font-black"> 
                        {{Auth::guard('user')->user()->companyname}} !
                     </p>
                  </div>
                  <li class="active">
                     <a href="#a" data-toggle="tab">
                     <i class="fa fa-outdent pr-10px" aria-hidden="true"></i>
                     <span class="font-12">Deal Registration</span> 
                     </a>
                  </li>
                  <li><a href="#b" data-toggle="tab"><i class="fa fa-street-view" aria-hidden="true"></i>
                     <span class="font-12">View My Deals </span> 
                     </a>
                  </li>
                  <li><a href="#c" data-toggle="tab"><i class="fa fa-files-o" aria-hidden="true"></i>
                     <span class="font-12">Resources </span> 
                     </a>
                  </li>
                  <li><a href="#d" data-toggle="tab"><i class="fa fa-calendar" aria-hidden="true"></i>
                     <span class="font-12">Training Programs</span> 
                     </a>
                  </li>
                  {{--<li><a href="#e" data-toggle="tab"><i class="fa fa-sign-language" aria-hidden="true"></i>
                     <span class="font-12"> System Design Request</span> 
                     </a>
                  </li>--}}
                  <li><a href="#f" data-toggle="tab"><i class="fa fa-credit-card" aria-hidden="true"></i>
                     <span class="font-12"> Re-Seller Account Opening</span> 
                     </a>
                  </li>
                  <li><a href="#g" data-toggle="tab"><i class="fa fa-outdent pr-10px" aria-hidden="true"></i>
                     <span class="font-12"> Demo Request</span> 
                     </a>
                  </li>
                  <li><a href="#h" data-toggle="tab"><i class="fa fa-street-view" aria-hidden="true"></i>
                     <span class="font-12"> Demo Feedback</span> 
                     </a>
                  </li>
               </ul>
            </div>
            <div class="tab-content p-10 bg-h">
               <div class="tab-pane active" id="a">
                  <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Deal Registration</strong></h4>
                  <p>
                     @include('frontend.deal_reg')
                  </p>
               </div>
               <div class="tab-pane" id="b">
                  <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>View My Deals</strong></h4>
                  <div class="table-responsive">
                     <table class="table table-striped ">
                        <thead>
                           <tr>
                              <th>End Customer</th>
                              <th>Opportunity/Products</th>
                              <th>Opportunity value</th>
                              <th>Expected Closing date</th>
                              <th>Status</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count(@$deal_reg)>0)
                           @foreach($deal_reg as $d)
                           <tr>
                              <td>{{ $d->endcustomer }}</td>
                              <td>{{ $d->opportunity_products }}</td>
                              <td>{{ $d->opportunity_value }}</td>
                              <td>{{ $d->expected_closing_date }}</td>
                              <td>@if($d->status==0) Pending Approval @else Approved @endif</td>
                              <td><button class="btn btn-primary" onclick="return fnViewDeal({{ $d->id }});">View</button></td>
                           </tr>
                           @endforeach
                           @else
                           <tr>
                              <td colspan="6">No deals found.</td>
                           </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="tab-pane" id="c">
                  <p>
                     @include('frontend.filemanager')
                  </p>
               </div>
               <div class="tab-pane" id="d">
                  <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Training Programs</strong></h4>
                  <iframe src="https://calendar.google.com/calendar/embed?src=channelsales%40atnetindia.net&ctz=Asia/Calcutta" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
               </div>
               {{--<div class="tab-pane" id="e">
                  <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>System Design Request</strong></h4>
               </div>--}}
               <div class="tab-pane" id="f">
                  <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Re-Seller Account Opening</strong></h4>
                  <div align="center" style="margin-top: 30px;"><button class="btn btn-success btn-xlg" onclick="window.location='{{ url("reseller") }}'">Click here to Open Re-Seller Account</button></div>
               </div>
               <div class="tab-pane" id="g">
                  @include('frontend.demo_request')
               </div>
               <div class="tab-pane" id="h">
                  @include('frontend.demo_feedback')
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--dashboard block end-->
@elseif(Auth::guard('user')->user()->type=='E')
<!-- employee block start-->
<div class="container-fluid">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pl-0px pr-0 b-shadow-card m-auto d-block f-none">
         <div class="tabbable tabs-left">
            <ul class="nav nav-tabs left-tab-menu">
               <div class="bg-blue-shade profile pt-10px">
                  <img src="{{ asset('assets/images/logo-tab.png') }}" class="m-auto d-block img-responsive img-round">
                  <p class="text-center mt-10 border-dotted-bottom pb-10 mb-0 font-black"> 
                     <span>{{ Auth::guard('user')->user()->first_name }} {{ Auth::guard('user')->user()->last_name }},</span><br/>
                     <span style="font-size: 12px;">{{ Auth::guard('user')->user()->designation }}</span>
                  </p>
               </div>
               <li class="active">
                  <a href="#photographs" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-outdent pr-10px" aria-hidden="true"></i>
                  <span class="font-12">Photographs</span> 
                  </a>
               </li>
               <li>
                  <a href="#exhibtionmaterials" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-life-ring" aria-hidden="true"></i>
                  <span class="font-12">Exhibtion Materials</span> 
                  </a>
               </li>
               <li>
                  <a href="#logo" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-file-image-o" aria-hidden="true"></i>
                  <span class="font-12">Logo</span> 
                  </a>
               </li>
               <li>
                  <a href="#diagrams" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-binoculars" aria-hidden="true"></i>
                  <span class="font-12">Diagrams</span> 
                  </a>
               </li>
               <li>
                  <a href="#products" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-arrows" aria-hidden="true"></i>
                  <span class="font-12">Products</span> 
                  </a>
               </li>
               <li>
                  <a href="#solutions" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-th-large" aria-hidden="true"></i>
                  <span class="font-12">Solutions</span> 
                  </a>
               </li>
            </ul>
         </div>
         <!--right side -->
         <div class="tab-content p-10 bg-h">
            <!-- photographs start -->
            <div class="tab-pane active" id="photographs">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Photographs</strong></h4>
               @include('frontend.emp_photograph')
            </div>
            <!-- photographs end -->
            <!-- exhibtion materials start -->
            <div class="tab-pane" id="exhibtionmaterials">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Exhibtion Materials</strong></h4>
               @include('frontend.emp_material')
            </div>
            <!-- exhibtion materials end -->
            <!-- logo start -->
            <div class="tab-pane" id="logo">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Logo</strong></h4>
               @include('frontend.emp_logo')
            </div>
            <!-- logo end -->
            <!-- diagrams start -->
            <div class="tab-pane" id="diagrams">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Diagrams</strong></h4>
               @include('frontend.emp_diagram')
            </div>
            <!-- diagrams end --> 
            <!-- product start --> 
            <div class="tab-pane" id="products">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Products</strong></h4>
               @include('frontend.emp_product')      
            </div>
            <!-- product end --> 
            <!-- solutions start --> 
            <div class="tab-pane" id="solutions">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Solutions</strong></h4>
               @include('frontend.emp_solution')
            </div>
            <!-- solutions end --> 
         </div>
      </div>
   </div>
</div>
<!-- employee block end-->
@elseif(Auth::guard('user')->user()->type=='V')
<!-- visitors or guest block start -->
<div class="container-fluid">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pl-0px pr-0 b-shadow-card m-auto d-block f-none mt-3">
         <div class="tabbable tabs-left">
            <ul class="nav nav-tabs left-tab-menu">
               <div class="bg-blue-shade profile pt-10px">
                  <img src="{{ asset('assets/images/logo-tab.png') }}" class="m-auto d-block img-responsive img-round"/>
                  <p class="text-center mt-10 border-dotted-bottom pb-10 mb-0 font-black font-14"> 
                     {{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}} !
                  </p>
               </div>
               <li class="active">
                  <a href="#a" data-toggle="tab">
                  <i class="fa fa-outdent pr-10px" aria-hidden="true"></i>
                  <span class="font-12">Demo Request  </span> 
                  </a>
               </li>
               <li><a href="#b" data-toggle="tab"><i class="fa fa-street-view" aria-hidden="true"></i>
                  <span class="font-12">Demo Feedback  </span> 
                  </a>
               </li>
               {{--<li><a href="#c" data-toggle="tab"><i class="fa fa-snowflake-o" aria-hidden="true"></i>
                  <span class="font-12">Resources</span> 
                  </a>
               </li>--}}
            </ul>
         </div>
         <div class="tab-content p-10 bg-h">
           
            <!-- demo request form start-->
            <div class="tab-pane active" id="a">                             
               @include('frontend.demo_request')
            </div>
            <!-- demo request form end-->

            <!-- demo feedback form start-->
            <div class="tab-pane" id="b">
               @include('frontend.demo_feedback')
            </div>
            <!-- demo feedback form end-->

            <!-- resources form start-->            
            {{--<div class="tab-pane" id="c">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Resources</strong></h4>
               @include('frontend.visitor_filemanager')
            </div>--}}
            <!-- resources form end--> 
         </div>
      </div>
   </div>
</div>
<!-- visitors or guest block end-->
@else
<h3 class="font-blue">
   <strong>Dashboard</strong>
</h3>
<!--dashboard block -->
<div class="container-fluid">
   <!--  <div class="row">
      Hi {{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}} !
      </div> -->
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 pl-0px pr-0 b-shadow-card m-auto d-block f-none mt-3">
         <div class="tabbable tabs-left">
            <ul class="nav nav-tabs left-tab-menu">
               <div class="bg-blue-shade profile pt-10px">
                  <img src="{{ asset('assets/images/logo-tab.png') }}" class="m-auto d-block img-responsive img-round">
                  <p class="text-center mt-10 border-dotted-bottom pb-10 mb-0 font-black"> 
                     <span>{{ Auth::guard('user')->user()->first_name }} {{ Auth::guard('user')->user()->last_name }}</span><br>
                  </p>
               </div>
               <li class="active">
                  <a href="#customers_form" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-life-ring" aria-hidden="true"></i>
                  <span class="font-12"> Customer Satisfaction Survey</span> 
                  </a>
               </li>
               <li>
                  <a href="#customer_resources" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-th-large" aria-hidden="true"></i>
                  <span class="font-12"> Resources</span> 
                  </a>
               </li>
               <li><a href="#dem_req" data-toggle="tab"><i class="fa fa-outdent pr-10px" aria-hidden="true"></i>
                  <span class="font-12"> Demo Request</span> 
                  </a>
               </li>
               <li><a href="#dem_feed" data-toggle="tab"><i class="fa fa-street-view" aria-hidden="true"></i>
                  <span class="font-12"> Demo Feedback</span> 
                  </a>
               </li>
            </ul>
         </div>
         <!-- right side -->
         <div class="tab-content p-10 bg-h">
            <!-- customer form start-->
            <div class="tab-pane active" id="customers_form">
               <h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Customer Satisfaction Survey</strong></h4>
               <div class="container">
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       <form id="customer_survey" name="customer_survey" method="POST" action="{{ url('customer_survey/save') }}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="form-group">
                              <div class="table-responsive">
                                 <table class="table table-bordered table_customer_form" id="table">
                                    <thead>
                                       <tr>
                                          <th colspan="6">
                                          A&T Video Networks Pvt. Ltd.
                                          </th>
                                          <th colspan="1">                                
                                             CUSTOMER SATISFACTION SURVEY
                                          </th>
                                       </tr>
                                       <tr>
                                          <td colspan="6">
                                             Customer Name <span class="color-red">*</span>
                                          </td>
                                          <td>
                                             <div><input class="form-control" name="customer_name" id="customer_name" type="text"></div>
                                          </td>
                                       </tr>
                                    </thead>
                                 </table>
                                 <table class="table table-bordered table_customer_form" id="table">
                                    <tbody>                                      
                                       <tr>
                                          <td colspan="7">
                                             <p>PLEASE SELECT THE OPTION (or) TO ASSIGN RATING IN THE FIVE POINT SCALE GIVEN AGAINST EACH ELEMENT AS:</p>
                                          </td>
                                       </tr>
                                       <tr>
                                      <td rowspan="2" colspan="2">
                                             Description
                                             </td>
                                          <td colspan="7">Rating</td>
                                          
                                       </tr> 
                                       <tr>
                                          <td>
                                             Excellent (5)
                                          </td>
                                          <td>
                                             Very Good (4)                            
                                          </td>
                                          <td> 
                                             Good (3)
                                          </td>
                                          <td>
                                             Fair (2)
                                          </td>
                                          <td colspan="2">
                                             Poor (1)
                                          </td>
                                       </tr>
                                       <tr rowspan="2">
<!--
                                          <td>
                                             <strong>  1</strong>
                                          </td>
-->
                                          <td colspan="7">
                                             <strong> Supply Commitment  <span class="color-red">*</span></strong> 
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) On-time Delivery
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="ontime" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="ontime" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="ontime" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="ontime" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="ontime" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             b)Response to crisis
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="response" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="response" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="response" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="response" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="response" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Product Quality -->
                                       <tr rowspan="2">
<!--
                                          <td>
                                             <strong> 2</strong>
                                          </td>
-->
                                          <td colspan="7">
                                             <strong> Product Quality <span class="color-red">*</span></strong>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) Meeting Intended Performance
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="meeting" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             b) Meeting implied Requirement
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="meeting_imp" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting_imp" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting_imp" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting_imp" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="meeting_imp" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Product Quality end -->
                                       <!-- Response start -->
                                       <tr rowspan="2">
                                          <td colspan="7">
                                             <strong> Response <span class="color-red">*</span></strong>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) Towards Queries/Concerns
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="towards" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="towards" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="towards" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="towards" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="towards" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             b) Action against complaints
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="action_c" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="action_c" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="action_c" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="action_c" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="action_c" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Response end -->
                                       <!-- Communication start -->
                                       <tr rowspan="2">
                                          <td colspan="7">
                                             <strong> Communication <span class="color-red">*</span></strong>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) Informing Process
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="informing_p" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="informing_p" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="informing_p" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="informing_p" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="informing_p" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             b) Sharing information for help(When required)
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="sharing_info" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="sharing_info" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="sharing_info" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="sharing_info" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="sharing_info" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Communication end -->
                                       <!-- Progress start -->
                                       <tr rowspan="2">
                                          <td colspan="7">
                                             <strong> Progress <span class="color-red">*</span></strong>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) Effort towards improvement
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="effort" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="effort" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="effort" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="effort" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="effort" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Progress end -->
                                       <!-- Relationship start -->
                                       <tr rowspan="2">
                                          <td colspan="7">
                                             <strong>  Relationship <span class="color-red">*</span></strong>
                                          </td>
                                       </tr>
                                       <tr rowspan="3">
                                          <td colspan="2">
                                             a) Maintaining Rapport  
                                          </td>
                                          <td>
                                             <div style="width: 120px;"><input type="radio" name="marinating" value="Excellent"></div>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="marinating" value="Very Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="marinating" value="Good"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="marinating" value="Fair"></label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="marinating" value="Poor"></label>
                                          </td>
                                       </tr>
                                       <!-- Relationship end -->
                                       <!-- evaluated start -->
                                       <tr rowspan="3">
                                          <td>
                                             Evaluated by:  
                                          </td>
                                          <td colspan="2">
                                             <input class="form-control" name="evaluated1" id="evaluated1" type="text">
                                          </td>
                                          <td>
                                             Signature
                                          </td>
                                          <td colspan="5">
                                             <input class="form-control" name="signature" id="signature" type="file">
                                          </td>
                                       </tr>
                                       <!-- evaluated end -->
                                       <!-- Designation start -->
                                       <tr rowspan="3">
                                          <td>
                                             Designation:
                                          </td>
                                          <td colspan="2">
                                             <input class="form-control" name="designation" id="designation" type="text">
                                          </td>
                                          <td>
                                             Date
                                          </td>
                                          <td colspan="5">
                                             <input class="form-control" name="date" id="date" type="text">
                                          </td>
                                       </tr>
                                       <!-- Designation end -->
                                       <!-- Department start -->                       
                                       <tr rowspan="3">
                                          <td>
                                             Department:
                                          </td>
                                          <td colspan="2">
                                             <input class="form-control" name="department" id="department" type="text">
                                          </td>
                                          <td>
                                             Seal
                                          </td>
                                          <td colspan="5">
                                             <input class="form-control" name="seal" id="seal" type="file">
                                          </td>
                                       </tr>
                                       <!-- Department end --> 
                                    </tbody>
                                 </table>                                 
                              </div>
                           </div>
                           <!-- button -->
                           <div class="form-group">
                              <div class="col-sm-offset-4" style="padding-left: 15px;">
                                 <button type="submit" class="btn btn-primary bg-blue border-orange btn_survey">Submit</button>
                              </div>
                           </div>
                        </form>
                        <script src="{{ asset('js/pagejs/customer_survey.js?v=1.3') }}"></script>
                        <script>
							datepickr('#date', { dateFormat: 'd-m-Y' });
						</script>
                     </div>
                  </div>
               </div>
            </div>
            <!-- customer form end-->
            
            <!-- resources start -->
            <div class="tab-pane" id="customer_resources">               
               <p>@include('frontend.filemanager')</p>
            </div>
            <!-- resources end -->

            <div class="tab-pane" id="dem_req">
               @include('frontend.demo_request')
            </div>
            <div class="tab-pane" id="dem_feed">
               @include('frontend.demo_feedback')
            </div>

         </div>
      </div>
   </div>
</div>
@endif
</div>
<div id="mydeal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header" style="background: rgba(22, 88, 208, 0.65); color: #ffffff;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">View Deals</h4>
         </div>
         <div class="modal-body dealinfo">              
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function fnViewDeal(id) {
      $('#mydeal').modal('show');
      $.ajax({
          type: "POST",
          url: app_url + "/user/dashboard/dealinfo",
          data: {'_token': $('input[name=_token]').val(), 'id': id},
          success: function (resp) { 
             $('.dealinfo').html(resp);
          }
      });
   }
</script>
@endsection
