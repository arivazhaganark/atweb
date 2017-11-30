@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Banner
@endsection

@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="edit_banner" id="edit_banner" action="{{ url('admin/banner/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $banner->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Banner</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/banner') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">Name <span class="text-red">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $banner->name }}" autocomplete="off" />
                                </div>     
                                <div class="clearfix "></div>
                                <div class="form-group">
                                    <label id="username">Description <span class="text-red">*</span></label>
                                    <textarea name="description" id="description" class="form-control">{{ $banner->description }}</textarea>
                                </div>   
                                <div class="form-group">
                                    <label>Image</label> 
                                    <input type="file" id="image" name="image" placeholder="Upload Image">
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File</div><br/>
                                     <button type="button" id="clear" style="display: none;">Clear</button>
                                     <output id="result" /></output>

                                     @if($banner->image!='')
                                     <b>Preview</b><br/>
                                     <img src="<?php echo url('uploads/banner_attachment/'.$banner->id); ?>/<?php echo $banner->image; ?>" style="width:200px; height:100px;">
                                     @endif
                                </div> 
                                <div class="form-group">
                                    <label id="username">Order</label>
                                    <input name="position" id="position" type="text" class="form-control" placeholder="Order" value="{{ $banner->position }}" autocomplete="off" />
                                </div>   
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_edit_banner" id="btn_edit_banner" type="submit">Submit</button>
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

<script src="{{ asset('js/admin_pagejs/banner-validation.js?v=1.4') }}"></script>

@endsection
