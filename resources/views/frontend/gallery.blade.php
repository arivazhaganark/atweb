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
<section class="breadcrum">
  <div class="bg-lit">
     <div class="container">
        <div class="row">
              <a href=""><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
              <span>/</span>
              <span>About Us &nbsp;</span>
              <span>&nbsp; / &nbsp;</span>
              <span>The Story So Far &nbsp;/ &nbsp;</span>
              <span>Gallery</span>
        </div>
     </div>
  </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h3 class="font-orange">
            <strong>Gallery</strong>        
         </h3>
      </div>
   </div>

   <div class="list-group gallery-page" id="">
      @include('frontend.gallery_filemanager')
   </div>
</div>
@endsection