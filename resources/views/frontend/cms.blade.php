@extends('layouts.frontpage')
@section('content')
<section class="innersubmenu mt-60 bg-grey">
   <div class="container">
      <div class="row">
         <div id="exTab2" class="container">
           
         </div>
      </div>
   </div>
</section>
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
            <div class="">
               <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/ &nbsp;</span>
               <span>Home &nbsp;</span>
               <span>/ &nbsp;</span>
               <span>{{ getParentName($cms_data->parent) }} &nbsp;</span>
               <span>/ &nbsp;</span>
               <span>{{ $cms_data->name }}</span>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="form-group" style="margin-top: 20px;">
        <h3 class="font-blue">{{ $cms_data->name }}</h3>
        {!! $cms_data->content !!}
   </div>
</div>
@endsection