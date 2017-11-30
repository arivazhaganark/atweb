@extends('layouts.frontpage')
@section('content')
<!--image -->
<section>
   <div class='subpage-img'></div>
</section>
<!--image -->
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
            <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
            <span>/ &nbsp;</span>
            <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
            <span>/ &nbsp;</span>
            <span>Connect</span> 
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue">
               <strong>Visitors/Guests Registration</strong>
            </h3>
            <p>
               Please complete the below form to  gain access to our network and request for a Demo . Get Registered!
            </p>
         </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-block">
         <div class="border p-5">
            <h4 class="font-green text-center">
               <strong>Visitors/Guests Registration</strong>
            </h4>
            <form id="visitors_reg" name="visitors_reg" method="POST" action="{{ url('visitor/save') }}" onsubmit="return false;" novalidate="novalidate">
               {{ csrf_field() }}              
               <input type="hidden" name="type" id="type" value="V">
               <div class="form-group mb-0">
                  <div class="icon-addon addon-md" style="font-size:13px; font-weight: bold; margin-bottom: 7px; padding: 4px; text-align: center;">
                  </div>
                  <div class="icon-addon addon-md">
                     <i class="fa fa-user inside" aria-hidden="true"></i>
                     <input type="text" placeholder="Name" class="form-control inside-input" id="visitors_name" name="visitors_name">
                     <span id="visitors_name" style="color:crimson; font-size: 11px; font-weight: bold;"></span>
                  </div>
                  <br>
                  <div class="icon-addon addon-md">
                     <i class="fa fa-envelope inside font-15" aria-hidden="true"></i>
                     <input type="text" placeholder="Email" class="form-control inside-input" id="visitors_email" name="visitors_email">
                     <div id="visitorEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;">&nbsp;</div>
                  </div>
                  <div class="icon-addon addon-md" style="margin-top: 10px;">
                     <i class="fa fa-lock inside font-19" aria-hidden="true"></i>
                     <input type="password" placeholder="Password" class="form-control inside-input" id="visitors_password" name="visitors_password">
                  </div>
                  <br>
                  <div style="margin-left: 55px; margin-bottom: -20px;">
                     <input type="hidden" class="hiddenRecaptcha" name="visitorRecaptcha" id="visitorRecaptcha">   
                     {!! app('captcha')->display(); !!}
                  </div>
                  <div id="captcha-err" style="padding:10px; text-align: right;" class="error"></div>
                  <p class="text-center font-12 mt-2 pt-12">
                     Please enter your email address to become your username to log in to the network
                  </p>
               </div>
               <div class="modal-footer border-none">
                  <button type="button" class="btn btn-primary bg-blue border-orange btn-partner-login btn-visitor-reg">Register</button>
                  <div class="pt-12">
                     <div class="border-top pt-12">
                        <p class="text-center">
                           <a href="{{ url('visitors_signin') }}" class="font-blue"> <strong>Already have an account? Sign in</strong></a>
                        </p>
                     </div>
                  </div>
               </div>
            </form>
            <script src="{{ asset('js/pagejs/visitor.js?v=2.3') }}"></script>
            <style> .g-recaptcha {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;} </style> 
         </div>
      </div>
   </div>
</section>
@endsection