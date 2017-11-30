@extends('layouts.frontpage')
@section('content')
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
               <a href=""><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/</span>
               <span>Our Product &nbsp;</span>
               <span>&nbsp; / &nbsp;</span>
               @if($slug1 != '')
               <span>{{ $cms_main->name }} &nbsp;/ &nbsp;</span>
               <span>{{ $cms_data->name }} &nbsp;/ &nbsp;</span>
               @else
               <span>{{ $cms_data->name }} &nbsp;/ &nbsp;</span>
               @endif
               <span>{{ $product_getid->name }}</span>
         </div>
      </div>
   </div>
</section>
<section class="Content">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-orange">
               <strong>{{ $cms_data->name }}</strong>        
            </h3>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="border-grey">
               <div class="clearfix" style="">
                  <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                     @foreach($product_image as $pi)
                     <li data-thumb="{{ asset('uploads/product') }}/{{ $product_id }}/{{ $pi->image }}" class="fancybox"  href="{{ asset('uploads/product') }}/{{ $product_id }}/temp/{{ $pi->image }}" data-fancybox-group="gallery"> 
                        <img src="{{ asset('uploads/product') }}/{{ $product_id }}/temp/{{ $pi->image }}"  class="img-responsive" data-highres="{{ asset('uploads/product') }}/{{ $product_id }}/temp/{{ $pi->image }}" data-caption="" />
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <h3 class="font-black m-0">
               <strong>{{ $product_getid->name }}</strong>
            </h3>
            <h5 class="font-black">
               <strong>Description</strong>
            </h5>
            <p class="line-h-26">     
               {!!$product_getid->description!!}
            </p>
            <button class="bg-orange font-white p-button m-auto d-block">Buy Now</button> 
         </div>
      </div>
   </div>
</section>
<section class="tabs">
   <div class="container">
      <!-- <h2>
         Description
      </h2> -->
   </div>
   <div id="exTab2" class="container">
      <div class="mt-1 mb-5">
         <ul class="nav nav-tabs">
            <li class="active">
               <a  href="#1" data-toggle="tab" class="border-r border-grey font-black">Features</a>
            </li>
            <li><a href="#2" data-toggle="tab" class="border-r border-grey font-black">Benefits</a>
            </li>
            <li><a href="#3" data-toggle="tab" class="border-r border-grey font-black">Technical Specification</a>
            </li>
            <li><a href="#4" data-toggle="tab" class="border-r border-grey font-black">Data Sheet</a>
            </li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="1">
               <p class="mt-10">
                  {!!$product_getid->features!!}
               </p>
            </div>
            <div class="tab-pane" id="2">
               <p class="mt-10">
                  {!!$product_getid->benefits!!}
               </p>
            </div>
            <div class="tab-pane" id="3">
               <p class="mt-10">
                  {!!$product_getid->technical_specification!!}
               </p>
            </div>
            <div class="tab-pane" id="4">
               <p class="mt-10">
                  @if($product_getid->data_sheet != '')
                  <a href="<?php echo url('uploads/data_sheet/'); ?>/{{ $product_getid->data_sheet }}" target="new" style="color:white;float:left;background:crimson; padding:5px;">Preview Pdf File</a>
                  @else
                  ---
                  @endif
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection