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
            
         </div>
      </div>
   </div>
</section>
<div class="container">
    @if(Session::has('message'))  
   <div class="alert alert-success" style="margin-top: 10px;">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>{{ Session::get('message') }}</p>
   </div>
   @endif
   <h3 class="font-blue">
      <strong>Endorse Us</strong>
   </h3>
   <div class="row">
      <form class="form-horizontal" name="testi" id="testi" method="post" action="{{ url('endorse_reg_save') }}">
         {{ csrf_field() }}
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
               <label class="control-label col-sm-4" for="author">Name <span class="color-red">*</span></label>
               <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="author">Designation <span class="color-red">*</span></label>
               <div class="col-sm-7">
                  <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="email">Email <span class="color-red">*</span></label>
               <div class="col-sm-7"> 
                  <input type="text" class="form-control" name="email" id="Temail" placeholder="Enter Email">
                  <div id="tEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;"></div>
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="website">Website</label>
               <div class="col-sm-7"> 
                  <input type="text" class="form-control" name="website" id="website" placeholder="Enter Website">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="location">Location</label>
               <div class="col-sm-7"> 
                  <input type="text" class="form-control" name="location" id="location">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="testimonial">Title of Testimonial</label>
               <div class="col-sm-7"> 
                  <input type="text" class="form-control" name="testi_title" id="testi_title" placeholder="Enter Testimonial">
               </div>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-4" for="address">Testimonial <span class="color-red">*</span></label>
               <div class="col-sm-7"> 
                  <textarea class="form-control" rows="5" id="testimonial" name="testimonial"></textarea>
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-offset-4" style="padding-left: 15px;">
                  <button type="button" class="btn btn-primary bg-blue border-orange btn_endorse_us">Submit</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>

<script src="{{ asset('js/pagejs/endorse-us-validation.js?v=1.5') }}"></script>

@endsection