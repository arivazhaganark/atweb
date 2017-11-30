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
      <div class="container">
         <div class="row">
            <div class="">
               <a href="{{ url('') }}" class="c-pointer"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/ &nbsp;</span>
               <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
               <span>/ &nbsp;</span>
               <span>Forgot password &nbsp;</span>
           </div>
         </div>
      </div>
   </div>
</section>

<div class="container">

   <div class="alert alert-success mt-10" style="display: none;">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>We have emailed your password reset link!</p>
   </div>
   <div class="alert alert-danger mt-10" style="display: none;">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>We can't find a user with that e-mail address.</p>
   </div>


   <h3 class="font-blue">
      <strong>Forgot Password</strong>
   </h3>
   <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <form role="form" method="post" name="forgot_pass_form" id="forgot_pass_form" class="form-horizontal" action="" onsubmit="return false;">
            {{ csrf_field() }}            
            <!-- text input -->
            <div class="form-group">
                <label for="email" class="col-md-5 control-label">E-Mail Address <span class="color-red">*</span></label>
                <div class="col-md-7 pl-0px">
                <input name="email" id="forgot_email" type="text" class="form-control" placeholder="Enter Email" value="" /> 
                <span id="forgotEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;"></span>
                </div>
            </div>
            <div class="form-group ">
            <div class="col-md-offset-5 pl-0px">
                <button class="btn btn-primary btn_submit forgot_pass" name="submit" id="submit" type="button">Submit</button>
            </div>
            </div>
        </form> 
     </div>
   </div>
</div>
<script src="{{ asset('js/pagejs/forgot-password-validation.js?v=2.3') }}"></script>
@endsection