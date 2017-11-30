<?php $blog_content = App\Model\backend\Blog::where('post_status',1)->orderBy('id','DESC')->get(); ?>
@foreach($blog_content as $value)
<?php $blog_image = DB::table('blog_image')->where('blog_id',$value->id)->orderBy('id','DESC')->take(1)->first(); ?>
<?php $blog_image_count = DB::table('blog_image')->where('blog_id',$value->id)->count(); ?>
<div class="row blogspace">
   <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
   @if($blog_image_count > '0')
   <img class="img-responsive blogimage" src="{{ url('/uploads/blog_image') }}/{{ $value->id }}/{{ $blog_image->image }}" />
   @else
   <img class="img-responsive" src="{{ url('/assets/images') }}/<?php echo 'no-blog-image.png'; ?>" />
   @endif
   </div>
   <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 only-contetn">
      <h3><a href="{{ url('/blog_detail') }}/{{ $value->post_slug }}">{{ $value->post_title }}</a></h3>

      <p class="post"><span style="color: #337ab7;">POSTED BY <?php if($value->post_author == 1){ echo 'ADMIN'; } ?> / <?php echo displaydate($value->post_date); ?> </span></p>
      <?php
          $content = $value->post_content;
          $content = preg_replace("/<img[^>]+\>/i", "", $content); 
      ?>
      <p class="blog-content">{!!str_limit($content, $limit = 480, $end = '...')!!}</p>
      <p class="pull-right"><a href="{{ url('/blog_detail') }}/{{ $value->post_slug }}">Read More</a></p>
   </div>
</div>
@endforeach