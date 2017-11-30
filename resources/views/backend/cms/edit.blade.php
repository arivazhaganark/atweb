@extends('backend.layouts.app_inner')
@section('htmlheader_title')
CMS
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

            <form class="form-horizontal" role="form" name="edit_cms" id="edit_cms" method="POST" enctype="multipart/form-data" action="{{ asset('admin/cms/update') }}" onsubmit="return fnTinyMce();">
                <input type='hidden' name="hid_pagetype" id="hid_pagetype" value="{{ $cms->page_type}}" />
                <input type="hidden" name="id" value="{{ $cms->id }}" />
                <input type="hidden" name="page_type" id="page_type" value="content">
                {{ csrf_field() }}
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit CMS</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/cms') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="padding:25px;">
                                <div class="error" id="err" style="font-weight: bold; float: right;"></div>       
                                <!--<div class="form-group">
                                    <label for="exampleInputFile">Type</label>
                                    <div class="radio">
                                        <label><input name="page_type" id="page_type1" class="" value="content" onclick="div_display_fn('content');" 
                                                      @if($cms->page_type == 'content') checked="checked" @endif type="radio">Content
                                        </label>
                                    </div>
                                </div>-->                                        
                                <div id="contentdiv" @if($cms->page_type=='content') style="display:block;" @else style="display:none;" @endif>
                                    <div class="form-group">
                                        <label id="username">Category <span class="text-red">*</span></label>
                                        <?php $categoryList = fetchCategoryTree(); ?>
                                        <select name="category" id="category" class="form-control">
                                        <option value="">Select</option>
                                        <?php foreach($categoryList as $cl) { ?>
                                        <option value="<?php echo $cl["id"] ?>" @if($cl["id"] == $cms->cat_id) selected="selected" @endif><?php echo $cl["name"]; ?></option>
                                        <?php } ?>
                                        <option value="9999" @if($cms->cat_id == '9999') selected="selected" @endif>Footer</option>
                                        <option value="10000" @if($cms->cat_id == '10000') selected="selected" @endif>Sublink Page</option>
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <label id="username">Slug <span class="text-red">*</span></label>
                                        <input name="slug" id="slug" type="text" class="form-control" placeholder="Slug" value="{{ $cms->slug }}" autocomplete="off" />                                    
                                    </div>
                                    @if($cms->cat_id == '9999')
                                    <div class="form-group">
                                        <label id="username">Permalink</label>
                                        <input name="permalink" id="permalink" type="text" class="form-control" placeholder="Permalink" value="{{ url(seoUrl($cms->footer_title)) }}" autocomplete="off" />
                                        <a href="{{ url(seoUrl($cms->footer_title)) }}" target="_blank" class="view-page">View Page</a>    
                                    </div>
                                    @elseif($cms->cat_id == '10000')
                                    <div class="form-group">
                                        <label id="username">Permalink</label>
                                        <input name="permalink" id="permalink" type="text" class="form-control" placeholder="Permalink" value="{{ url('sublink_page/'.seoUrl($cms->slug)) }}" autocomplete="off" />
                                        <a href="{{ url('sublink_page/'.seoUrl($cms->slug)) }}" target="_blank" class="view-page">View Page</a>    
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label id="username">Permalink</label>
                                        <input name="permalink" id="permalink" type="text" class="form-control" placeholder="Permalink" value="{{ url('/'.$cms->slug) }}" autocomplete="off" />
                                        <a href="{{ url('/'.$cms->slug) }}" target="_blank" class="view-page">View Page</a>    
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label id="username">Image</label>
                                        <input name="image" id="image" type="file" />
                                        @if($cms->image!='')
                                        <div style="margin-top: 10px;"></div>
                                        <img src="{{ url('uploads/cms_icon') }}/{{ $cms->id }}/{{ $cms->image }}" style="width: 64px; height: 64px;">
                                        @endif
                                    </div>
                                    @if($cms->columns!='' && $cms->columns!='Sublink Page')
                                    <div class="form-group">
                                        <label>Column <span class="text-red">*</span></label>
                                        <select name="column" id="column" class="form-control">
                                            <option value="">Select</option>
                                            <option @if($cms->columns=='Recent Feed') selected @endif>Recent Feed</option>
                                            <option @if($cms->columns=='Resources') selected @endif>Resources</option>
                                            <option @if($cms->columns=='About Us') selected @endif>About Us</option>
                                            <option @if($cms->columns=='Case Studies') selected @endif>Case Studies</option>
                                            <option @if($cms->columns=='Resellers') selected @endif>Resellers</option>
                                            <option @if($cms->columns=='Connect') selected @endif>Connect</option>
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group" id="foot_title" @if($cms->cat_id=='9999') style="display: block;" @elseif($cms->cat_id=='10000') style="display: block;" @else style="display: none;" @endif>
                                        <label>Title <span class="text-red">*</span></label>
                                        <input type="text" name="footer_title" id="footer_title" value="{{ $cms->footer_title }}" class="form-control" required>
                                        <div id="foot_title_err" class="error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label id="username">Short Description <span class="text-red">*</span></label>
                                        <textarea name="short_desc" id="short_desc" class="form-control" style="height: 100px;">{{ $cms->short_desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Long Description <span class="text-red">*</span></label> 
                                        <div><textarea id="editor1" name="editor1" rows="10" cols="80">{!! $cms->content !!}</textarea></div>
                                        <div class="error" id="editor1_err" style="font-weight: bold;"></div>
                                    </div>
                                    <div class="box-header">
                                        <h3 class="box-title text-navy">Seo Settings</h3>
                                    </div>  <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" value="{{$cms->seo_title}}" maxlength="200" placeholder="Title" class="form-control" id="seo_title" name="seo_title">
                                        <span style="font-size:12px;" class="text-light-blue">Most search engines use a maximum of 60 chars for the title.</span> </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="4" placeholder="Description" id="seo_description" name="seo_description">{{$cms->seo_description}}</textarea>
                                        <span style="font-size:12px;" class="text-light-blue">Most search engines use a maximum of 160 chars for the description.</span> </div>
                                    <div class="form-group">
                                        <label>Keywords <span style="font-size:12px;" class="text-light-blue">(comma separated)</span></label>
                                        <textarea class="form-control" rows="5" placeholder="Keywords" id="seo_keywords" name="seo_keywords">{{$cms->seo_keywords}}</textarea>
                                        <span style="font-size:12px;" class="text-light-blue"> Most search engines use a maximum of 200 chars for the Keywords.</span> </div>
                                </div>
                                <div class="form-group">
                                    <label>Position</label> 
                                    <input type="text" style="width: 110px;" class="form-control" name="position" id="position" autocomplete="off" placeholder="Position" value="{{ $cms->position }}" autocomplete="off"/>
                                </div>   
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_update" id="btn_update" type="submit">Submit</button>
                                </div>
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
<script src="{{ asset('js/admin_pagejs/cms-validation.js?v=2.5') }}"></script>
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#editor1, #cont',
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
