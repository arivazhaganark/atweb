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
             <a href="{{ url('') }}" class="c-pointer"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
             <span>/ &nbsp;</span>
             <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
             <span>/ &nbsp;</span>
             <span>Change Password</span> 
         </div>
      </div>
   </div>
</section>
<div class="container">
   @if(Session::has('message'))  
   <div class="alert alert-success mt-10">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>{{ Session::get('message') }}</p>
   </div>
   @endif
   <h3 class="font-blue">
      <strong>Change Password</strong>
   </h3>
   <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <form role="form" method="post" name="password_form" class="form-horizontal" id="password_form" action="{{ url('user/change_password/store') }}" onsubmit="return false;">
            {{ csrf_field() }}            
            <!-- text input -->
            <div class="form-group">
                <label class="control-label col-sm-5">Old Password <span class="color-red">*</span></label>
<div class="col-sm-7 pl-0px">                
                <input name="old_password" id="old_password" type="password" class="form-control" placeholder="Current Password" value="" /> 
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-5">New Password <span class="color-red">*</span></label>
    <div class="col-sm-7 pl-0px">             
                <input  name="new_password" id="new_password" type="password" class="form-control" placeholder="New Password" value="" />
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-5">Confirm Password <span class="color-red">*</span></label>
        <div class="col-sm-7 pl-0px">            
                <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" value="" />
                </div>
            </div>               
<div class="form-group ">
  <div class="col-md-offset-5 col-sm-offset-5 pl-0px">
                    <button class="btn btn-primary" name="btn_password_tab" id="btn_password_tab" type="button">Submit</button>
            </div>
</div>
        </form> 
     </div>
   </div>
</div>
<script src="{{ asset('js/pagejs/user-change-password-validation.js?v=1.6') }}"></script>
@endsection