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
<div class="container">
   <div class="row blogspace">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <h3>{{ $get_blog_detail->post_title }}</h3>
         <p class="post">POSTED BY <?php if($get_blog_detail->post_author == 1){ echo 'ADMIN'; } ?> / <?php echo displaydate($get_blog_detail->post_date); ?> </p>

         <?php $blog_image = DB::table('blog_image')->where('blog_id',$get_blog_detail->id)->orderBy('id','ASC')->get(); ?>
         @foreach($blog_image as $value)
<!--
         <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
         <div class="blogspace">
         	<img class="img-responsive" src="{{ url('/uploads/blog_image') }}/{{ $get_blog_detail->id }}/{{ $value->image }}" />
         </div>
         </div>
-->
         @endforeach
         <div class="clearfix"></div>
         <p class="blog-content">{!!$get_blog_detail->post_content!!}</p>
      </div>
   </div>
</div>
@endsection