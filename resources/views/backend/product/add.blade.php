@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Product
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="product" id="product" action="{{ url('admin/product/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="hidid" id="hidid"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Add Product</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/product') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">Name <span class="text-red">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                        <label id="username">Slug <span class="text-red">*</span></label>
                                        <input name="slug" id="slug" type="text" class="form-control" placeholder="Slug" value="" autocomplete="off" />
                                        <span id="slug_error" style="display: none;color: red;"></span>
                                    </div>
                                <div class="form-group">
                                    <label>Choose CMS <span class="text-red">*</span></label> 
                                    <select name="cms" id="cms" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($cms_data as $c)
                                        <option value="{{ $c->cat_id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: blue; font-size: 12px; float: left;"><<< This product under this cms page</div><br/>
                                </div>                 
                                <div class="form-group">
                                    <label>Description </label> 
                                    <textarea name="description" id="description" class="form-control" required=""></textarea>
                                </div>                
                                <div class="form-group">
                                    <label id="username">Features </label>
                                    <textarea name="features" id="features" class="form-control" required=""></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Specification </label> 
                                    <textarea name="specification" id="specification" class="form-control"></textarea>
                                </div> -->           
                                
                                <div class="form-group">
                                    <label>Benefits </label> 
                                    <textarea name="benefits" id="benefits" class="form-control" required=""></textarea>
                                </div> 
                                <div class="form-group">
                                    <label>Techincal Specification </label> 
                                    <textarea name="technical_specification" id="technical_specification" class="form-control" required=""></textarea>
                                </div> 
                                <!-- <div class="form-group">
                                    <label>Without clearfix </label> 
                                    <textarea name="without_clearfix" id="without_clearfix" class="form-control"></textarea>
                                </div> 
                                <div class="form-group">
                                    <label>Solution </label> 
                                    <textarea name="solution" id="solution" class="form-control"></textarea>
                                </div> -->
                                <div class="clearfix "></div>
                                <div class="form-group">
                                    <label>Data Sheet </label> 
                                    <input type="file" id="data_sheet" name="data_sheet" placeholder="Upload Pdf File" class="data_sheet_file">
                                    <div style="color: blue; font-size: 11px; float: left;"><<< Upload Pdf File only (.pdf) File</div><br/>
                                    <button type="button" id="clear1" style="display: none;">Clear</button>
                                    <output id="result1" /></output>
                                </div>
                                <div class="form-group">
                                    <label>Image </label> 
                                    <input id="image[]" name="image[]" type="file" multiple="multiple" class="fileupload" />
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File <br/> Press CTRL+Select to Choose Muliple Images</div><br/><br/>
                                    <div id="dvPreview"></div>
                                </div> 
                                <!-- <div class="form-group">
                                    <label>Attach files </label>
                                    <div class="input_fields_wrap">
                                        <input id="file_name[]" name="file_name[]" type="text" class="form-control" style="width: 50%;" placeholder="File name" /> 
                                        <input id="file" name="file[]" type="file" style="float:right; margin-top: -30px; margin-right: 90px;" />
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary btn-danger btn-xs add_field_button" style="float: right;">Add More</button>
                                    </div><br/>
                                </div>  -->
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_product" id="btn_product" type="submit">Submit</button>
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

    $(".data_sheet_file").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#result1");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.pdf)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var picReader = new FileReader();
                        picReader.addEventListener("load", function (event) {
                            var picFile = event.target;
                            var div = document.createElement("div");
                            div.innerHTML = "<a class='resum' href='" + picFile.result + "'" +">Preview Resume</a>";
                            output.insertBefore(div, null);
                        });
                        picReader.readAsDataURL(file);
                } else {
                    alert(file[0].name + " is not a valid pdf file.");
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
</script>
@endsection
