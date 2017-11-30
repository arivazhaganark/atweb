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
      <div class="container-fluid">
         <div class="row">
            <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
            <span>/ &nbsp;</span>
            <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
            <span>/ &nbsp;</span>
            <span>My Profile</span> 
         </div>
      </div>
   </div>
</section>

<div class="container-fluid">
    <h3 class="font-blue">
      <strong>My Profile</strong>
    </h3>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  

    <!--dashboard block -->
    <div class="container-fluid">      
          <div class="row">
            @if(Auth::guard('user')->user()->type=='C')
              @include('frontend.profile_client')
            @endif

            @if(Auth::guard('user')->user()->type=='P')
              @include('frontend.profile_partner')
            @endif

            @if(Auth::guard('user')->user()->type=='E')
              @include('frontend.profile_employee')
            @endif
        </div>
    </div>
</div>
@endsection