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
               <span>{{ $cms->columns }}</span>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      @if($cms->footer_title=='Partner Portal')
      <h3 class="font-blue"><strong>Partner Registration</strong></h3>
      @elseif($cms->footer_title == 'Blog')
         @include('frontend.blog')
      @else
         <h3 class="font-blue">
            <strong>{{ $cms->footer_title }}</strong>
         </h3>
      @endif
      
      @if($cms->footer_title != 'Blog')
         <div class="col-xs-12">
            @if($cms->footer_title!="Brochures")
               {!! $cms->content !!}
            @endif
         </div>
      @endif
      
      <br/><br/>

      @if($cms->footer_title=='Streaming Calculator')
         @include('frontend.streaming_calculator')
      @endif

      @if($cms->footer_title=='Customer Registration')
         <?php if(!Auth::guard('user')->user()) { ?>
            @include('frontend.client_register')
         <?php } else { 
            header('Location: '.url('user/dashboard').'');
            exit;
         } ?>
      @endif

      @if(Session::has('message'))
       <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif  

      @if($cms->footer_title=='Partner Registration')
         <?php if(!Auth::guard('user')->user()) { ?>
            @include('frontend.partner_register')
         <?php } else { 
            header('Location: '.url('user/dashboard').'');
            exit;
         } ?>
      @endif

      @if($cms->footer_title=='Brochures')
         @include('frontend.brochure_filemanager')
      @endif

      @if($cms->footer_title=='Datasheets')
         @include('frontend.datasheet_filemanager')
      @endif

      @if($cms->footer_title=='Videos')
         @include('frontend.video_filemanager')
      @endif

      @if($cms->footer_title=='Presentations')
         @include('frontend.presentation_filemanager')
      @endif

      @if($cms->footer_title=='Customer Support')
         @include('frontend.customer_support')
      @endif 
        
      </div>      
      
   </div>
</div>
</div>
@endsection