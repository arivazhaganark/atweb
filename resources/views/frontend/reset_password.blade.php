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
               <span>Reset password &nbsp;</span>
           </div>
         </div>
      </div>
   </div>
</section>

<div class="container">
   @if(Session::has('message'))  
   <div class="alert {{ Session::get('alert-class', 'alert-info') }} mt-10">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>{{ Session::get('message') }}</p>
   </div>
   @else   
   <h3 class="font-blue">
      <strong>Reset Password</strong>
   </h3>
   <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <form class="form-horizontal" role="form" name="reset_pass" id="reset_pass" method="POST" action="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
            {{ csrf_field() }}
            <input type="hidden" name="current_url" id="current_url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label">E-Mail Address</label>

                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7 pl-0px">
                    <input id="email" type="email" class="form-control" name="email" value="<?php echo urldecode($_GET['email']); ?>" readonly="">
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label">Password</label>

                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7 pl-0px">
                    <input id="passwrd" type="password" class="form-control" name="passwrd">
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 control-label">Confirm Password</label>
                <div class="col-xs-12 col-sm-5 col-md-7 col-lg-7 pl-0px">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-5 pl-0px">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i> Reset Password
                    </button>
                </div>
            </div>
        </form>
     </div>
   </div>
   @endif
</div>
<script src="{{ asset('js/pagejs/reset-password-validation.js?v=1.4') }}"></script>
@endsection