@extends('layouts.frontpage')
@section('content')
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
            <div class="mt-5">
               <a href=""><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/</span>
               <span>Our Product &nbsp;</span>
               <span>&nbsp; / &nbsp;</span>
               <span>Telly Video Confrencing &nbsp;/ &nbsp;</span>
               <span>Telly 2000</span>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="Content">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-orange">
               <?php 
                  $cms_data = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.id', $product->cms_id)
                    ->select('categories.name')
                    ->first();
               ?>
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
                     <li data-thumb="{{ asset('uploads/product') }}/{{ $product->id }}/{{ $pi->image }}" class="fancybox"  href="{{ asset('uploads/product') }}/{{ $product->id }}/temp/{{ $pi->image }}" data-fancybox-group="gallery"> 
                        <img src="{{ asset('uploads/product') }}/{{ $product->id }}/temp/{{ $pi->image }}"  class="img-responsive" data-highres="{{ asset('uploads/product') }}/{{ $product->id }}/temp/{{ $pi->image }}" data-caption="" />
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <h3 class="font-black m-0">
               <strong>{{ $product->name }}</strong>
            </h3>
            <h5 class="font-black">
               <strong>Features</strong>
            </h5>
            <p class="line-h-26">     
               {{ $product->features }}
            </p>
            <h5 class="font-black">
               <strong>Specification</strong>
            </h5>
            {{ $product->specification }}
            <button class="bg-orange font-white p-button m-auto d-block">Buy Now</button>
         </div>
      </div>
   </div>
</section>
<section class="tabs">
   <div class="container">
      <h2>
         Description
      </h2>
   </div>
   <div id="exTab2" class="container">
      <div class="mt-1 mb-5">
         <ul class="nav nav-tabs">
            <li class="active">
               <a  href="#1" data-toggle="tab" class="border-r border-grey font-black">Overview</a>
            </li>
            <li><a href="#2" data-toggle="tab" class="border-r border-grey font-black">Without clearfix</a>
            </li>
            <li><a href="#3" data-toggle="tab" class="border-r border-grey font-black">Solution</a>
            </li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="1">
               <p class="mt-10">
                  {{ $product->description }}
               </p>
            </div>
            <div class="tab-pane" id="2">
               <p class="mt-10">
                  {{ $product->without_clearfix }}
               </p>
            </div>
            <div class="tab-pane" id="3">
               <p class="mt-10">
                  {{ $product->solution }}
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection