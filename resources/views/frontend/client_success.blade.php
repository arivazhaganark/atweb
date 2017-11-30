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
           </div>
         </div>
      </div>
   </div>
</section>

<div class="container">
   <div class="alert alert-success mt-10">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <p>Thank you for registering at A & T Client Zone. Your application is currently pending approval. You can access client area once admin approved.</p>
   </div>
</div>
@endsection