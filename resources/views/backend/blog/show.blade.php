@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Blog
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
<div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title text-navy">View Blog Details</h3>
            <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/blog/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="tab-content">
               <div id="en" class="tab-pane fade in active">
                  <form role="form" class="form-horizontal">
                     <dl class="dl-horizontal">
                        <dt>Title :</dt>
                        <dd>{{ $show_blog->post_title }}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Slug :</dt>
                        <dd>{{ $show_blog->post_slug }}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Description :</dt>
                        <dd>{!!$show_blog->post_content!!}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Image :</dt>
                        <?php 
                            $image_count = DB::table('blog_image')->where('blog_id', $show_blog->id)->count(); 
                            $image = DB::table('blog_image')->where('blog_id', $show_blog->id)->get();
                            if($image_count>0) { 
                        ?>
                            <dd>
                            @foreach($image as $i)                                        
                                <img src="{{ asset('uploads/blog_image') }}/{{ $show_blog->id }}/{{ $i->image }}" width="128" height="80" style="border: 1px solid lightgray;">
                            @endforeach
                            </dd>
                        <?php } ?>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Post Date :</dt>
                        <dd><?php echo displaydate($show_blog->post_date); ?></dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Post Author :</dt>
                        <dd>{{ $show_blog->post_author == '1' ? 'Admin' : '' }}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Post Status :</dt>
                        <dd>{{ $show_blog->post_status == '1' ? 'Active' : 'InActive' }}</dd>
                     </dl>
                  </form>
               </div>
            </div>
            <!-- /.box-body --> 
            <!-- /.box --> 
         </div>
      </div>
   </div>
</div>
@endsection