@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Blog
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
   @if(Session::has('message'))
   <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
   @endif  
   <div class="row">
      <div class="col-md-10 col-md-offset-1">
         <form role="form" method="post" name="edit_product" id="edit_product" action="{{ url('admin/blog/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{ $edit_blog->id }}"> 
            <div class="tab-content">
               <div id="en" class="tab-pane fade in active">
                  <div class="box box-primary">
                     <div class="box-header">
                        <h3 class="box-title text-navy">Edit Blog</h3>
                        <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/blog') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <!-- text input -->
                        <div class="form-group">
                           <label id="username">Name <span class="text-red">*</span></label>
                           <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $edit_blog->post_title }}" autocomplete="off" />
                        </div>
                        <div class="form-group">
                           <label id="username">Slug <span class="text-red">*</span></label>
                           <input name="slug" id="slug" type="text" class="form-control" placeholder="Slug" value="{{ $edit_blog->post_slug }}" autocomplete="off" />
                           <span id="slug_error" style="display: none;color: red;"></span>
                        </div>
                        <div class="form-group">
                           <label>Description <span class="text-red">*</span></label>
                           <textarea name="description" id="description" class="form-control">{!!$edit_blog->post_content!!}</textarea>
                        </div>
                        <div class="clearfix "></div>
                                <div class="form-group">
                                    <label>Image </label> 
                                    <input id="image[]" name="image[]" type="file" multiple="multiple" class="fileupload" />
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File <br/> Press CTRL+Select to Choose Muliple Images</div><br/><br/>
                                    <div id="dvPreview"></div>
                                   
                                    <?php 
                                        $image_count = DB::table('blog_image')->where('blog_id', $edit_blog->id)->count(); 
                                        $image = DB::table('blog_image')->where('blog_id', $edit_blog->id)->get();
                                        if($image_count>0) { 
                                    ?>
                                        <div style="font-weight: bold; margin-bottom: 10px;">Image Preview</div>
                                        @foreach($image as $i)
                                        <a href="javascript:" onclick="return fnDelete({{ $edit_blog->id }}, {{ $i->id }});" title="Delete"><i class="fa fa-times" aria-hidden="true" style="position: relative;left: 124px; top: -27px; background: #000000; color: #ffffff;"></i></a>
                                            <img src="{{ asset('uploads/blog_image') }}/{{ $edit_blog->id }}/{{ $i->image }}" width="128" height="80" style="border: 1px solid lightgray;">
                                        @endforeach
                                    <?php } ?>
                                </div>
                        <div class="box-footer">
                           <button class="btn btn-primary" name="btn_editproduct" id="btn_editproduct" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/product-validation.js?v=1.8') }}"></script>
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
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
   tinymce.init({
       selector: '#features, #description, #benefits, #technical_specification',
       height: 200,
       theme: 'modern',
       relative_urls: false,
       remove_script_host: false,
       convert_urls: true,
       plugins: [
           'advlist autolink lists link image charmap print preview hr anchor pagebreak',
           'searchreplace wordcount visualblocks visualchars code fullscreen',
           'insertdatetime media nonbreaking save table contextmenu directionality',
           'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
       ],
       toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
       toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
       image_advtab: true,
       templates: [
           {title: 'Test template 1', content: 'Test 1'},
           {title: 'Test template 2', content: 'Test 2'}
       ],
       content_css: [
           '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
           '//www.tinymce.com/css/codepen.min.css'
       ],
       file_browser_callback: RoxyFileBrowser
   });
   
   function RoxyFileBrowser(field_name, url, type, win) {
       var roxyFileman = app_url + '/js/tinymce/fileman/index.html';
       if (roxyFileman.indexOf("?") < 0) {
           roxyFileman += "?type=" + type;
       } else {
           roxyFileman += "&type=" + type;
       }
       roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
       if (tinyMCE.activeEditor.settings.language) {
           roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
       }
       tinyMCE.activeEditor.windowManager.open({
           file: roxyFileman,
           title: 'Roxy Fileman',
           width: 850,
           height: 650,
           resizable: "yes",
           plugins: "media",
           inline: "yes",
           close_previous: "no"
       }, {window: win, input: field_name});
       return false;
   }
    function fnDelete(blog_id, img_id) {
      var result = confirm("Do you want to delete this image?");
      if (result) {
          window.location.href = '{{ url("admin/blog/image_delete") }}'+"/"+blog_id+"/"+img_id;
      }
    }
</script>
@endsection