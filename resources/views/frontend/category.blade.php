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
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h3 class="font-blue text-center mb-2">{{ @$cat_name }} </h3>
           @foreach($catlist as $c)
           <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding: 10px;">
              <div class="bg-grey p-40 of-hidden">
                 <div class="d-inline-table">
                    <span class="p-11-18 v-midd"><strong>{{ $c->name }} </strong></span>
                 </div>
                 <div>                     
                     <p class="pt-10px"> {{ substr($c->short_desc, 0, 100) }} </p>
                     <span>
                     <a href="{{ url('') }}/{{ $c->slug }}" class="font-grey read-arrow pull-right"><i class="fa fa-angle-right"></i></a>
                     </span>
                  </div>
              </div>
           </div>
           @endforeach
         </div>
      </div>
</div>
@endsection
