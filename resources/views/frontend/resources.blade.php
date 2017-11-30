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
             <span>Dashboard</span> 
         </div>
      </div>
   </div>
</section>

<div class="container"><br/>
  @include('frontend.filemanager')   
</div>

@endsection