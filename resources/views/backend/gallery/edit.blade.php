@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Gallery
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
   @if(Session::has('message'))
   <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
   @endif  
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         <form role="form" method="post" name="edit_gallery" id="edit_gallery" action="{{ url('admin/gallery/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <div class="tab-content">
               <div id="en" class="tab-pane fade in active">
                  <div class="box box-primary">
                     <div class="box-header">
                        <h3 class="box-title text-navy">Edit Gallery</h3>
                        <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/gallery') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                     <input type="hidden" name="id" id="id" value="{{ $edit_gallery->id }}">
                        <!-- text input -->
                        <div class="form-group">
                           <label id="username">Title <span class="text-red">*</span></label>
                           <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $edit_gallery->title }}" autocomplete="off" />
                        </div>
                        <div class="form-group">
                           <label id="username">Slug <span class="text-red">*</span></label>
                           <input name="slug" id="slug" type="text" class="form-control" placeholder="Slug" value="{{ $edit_gallery->slug }}" autocomplete="off" />
                           <span id="slug_error" style="display: none;color: red;"></span>
                        </div>
                        <div class="form-group">
                                    <label>Image </label> 
                                    <input id="image" name="image" type="file" class="fileupload" />
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File <br/> </div><br/><br/>
                                    <div id="dvPreview"></div>
                                   
                                    <?php 
                                        $image_count = DB::table('gallery')->where('id', $edit_gallery->id)->count(); 
                                        if($image_count>0) { 
                                    ?>
                                        <div style="font-weight: bold; margin-bottom: 10px;">Image Preview</div>
                                        
                                            <img src="{{ asset('uploads/gallery_image') }}/{{ $edit_gallery->image }}" width="128" height="80" style="border: 1px solid lightgray;">
                                        
                                    <?php } ?>
                                </div>
                        <div class="clearfix "></div>
                        <div class="box-footer">
                           <button class="btn btn-primary" name="btn_editgallery" id="btn_editgallery" type="submit">Submit</button>
                        </div>
         </form>
         </div>
         <!-- /.box-body --> 
         <!-- /.box --> 
         </div>
         </div>                 
         </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(function () {
       $("#name").keyup(function () {
           var Text = $(this).val();
           Text = Text.toLowerCase();
           Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
           $("#slug").val(Text);
       });
   });
</script>
<script language="javascript" type="text/javascript">
$(function () {
    $(".fileupload").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:100px;width: 100px;margin-right:7px;");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    file.val("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>
<script src="{{ asset('js/admin_pagejs/gallery-validation.js?v=1.8') }}"></script>
@endsection