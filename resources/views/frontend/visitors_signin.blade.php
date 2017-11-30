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
            <span>Dashboard</span> 
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue">
               <strong>Visitors/Guests Sign In</strong>
            </h3>
            <p>
               Please enter your mail ID gain access to our network.
            </p>
         </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-block">
         <div class="border p-5">
            <h4 class="font-green text-center">
               <strong>Visitors/Guests Sign In</strong>
            </h4>
            <form id="visitors_login" name="visitors_login" method="POST" action="{{ url('') }}" onsubmit="return false;" novalidate="novalidate">
               {{ csrf_field() }}   
               <div class="form-group mb-0">
                  <div class="icon-addon addon-md" style="font-size:13px; font-weight: bold; margin-bottom: 7px; padding: 4px; text-align: center;">
                  </div>
                  <div class="icon-addon addon-md">
                     <i class="fa fa-envelope inside font-15" aria-hidden="true"></i>
                     <input type="text" placeholder="Email" class="form-control inside-input" id="visitors_email" name="visitors_email">
                     <div id="visitorEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;">&nbsp;</div>
                  </div>
                  <br>
                  <div class="icon-addon addon-md">
                     <i class="fa fa-lock inside font-19" aria-hidden="true"></i>
                     <input type="password" placeholder="Password" class="form-control inside-input" id="visitors_password" name="visitors_password">
                  </div>
                  <br>
               </div>
               <div class="modal-footer border-none mb-2">
                  <button type="button" class="btn btn-primary bg-blue border-orange btn-visitor-login">Sign In</button>
               </div>
            </form>
            <script src="{{ asset('js/pagejs/visitor-login.js?v=1.1') }}"></script>
         </div>
      </div>
   </div>
</section>
@endsection