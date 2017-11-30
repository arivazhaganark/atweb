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
               <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/ &nbsp;</span>
               <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
               <span>/ &nbsp;</span>
               <span>{{ $cms->footer_title }}</span>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

         <h3 class="font-blue">
            <strong>{{ $cms->footer_title }}</strong>
         </h3>

         <div class="col-xs-12">
               {!! $cms->content !!}
         </div>

      </div>      
      
   </div>
</div>
</div>
@endsection