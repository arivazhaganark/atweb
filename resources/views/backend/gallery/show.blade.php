@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Gallery
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
<div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title text-navy">View Gallery Details</h3>
            <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/gallery/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="tab-content">
               <div id="en" class="tab-pane fade in active">
                  <form role="form" class="form-horizontal">
                     <dl class="dl-horizontal">
                        <dt>Title :</dt>
                        <dd>{{ $show_gallery->title }}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Slug :</dt>
                        <dd>{{ $show_gallery->slug }}</dd>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Image :</dt>
                        <?php 
                            $image_count = DB::table('gallery')->where('id', $show_gallery->id)->count(); 
                            if($image_count>0) { 
                        ?>
                            <dd>
                                                             
                                <img src="{{ asset('uploads/gallery_image') }}/{{ $show_gallery->image }}" width="128" height="80" style="border: 1px solid lightgray;">
                            
                            </dd>
                        <?php } ?>
                     </dl>
                     <dl class="dl-horizontal">
                        <dt>Post Status :</dt>
                        <dd>{{ $show_gallery->status == '1' ? 'Active' : 'InActive' }}</dd>
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