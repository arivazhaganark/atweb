@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Testimonials
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="testi" id="testi" action="{{ url('admin/testimonials/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $testimonials->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Testimonials</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/testimonials') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">Name <span class="text-red">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $testimonials->name }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Designation <span class="text-red">*</span></label>
                                    <input name="designation" id="designation" type="text" class="form-control" placeholder="Designation" value="{{ $testimonials->designation }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Email <span class="text-red">*</span></label>
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="{{ $testimonials->email }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Website</label>
                                    <input name="website" id="website" type="text" class="form-control" placeholder="Website" value="{{ $testimonials->website }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Location</label>
                                    <input name="location" id="location" type="text" class="form-control" placeholder="Location" value="" autocomplete="off" value="{{ $testimonials->location }}" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Title of Testimonial</label>
                                    <input name="testi_title" id="testi_title" type="text" class="form-control" placeholder="Testimonial Title" value="{{ $testimonials->testi_title }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>Description <span class="text-red">*</span></label> 
                                    <textarea name="description" id="description" class="form-control">{{ $testimonials->description }}</textarea>
                                </div>           
                                <div class="clearfix "></div>
                                <div class="form-group">
                                    <label>Photo</label> 
                                    <input type="file" id="image" name="image" placeholder="Upload Photo">
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Photo only (.jpg, .png, .gif) File</div><br/>
                                     <button type="button" id="clear" style="display: none;">Clear</button>
                                     <output id="result" /></output>

                                     @if($testimonials->image!='')
                                     <b>Preview</b><br/>
                                     <img src="<?php echo url('uploads/testimonials_photo/'.$testimonials->id); ?>/<?php echo $testimonials->image; ?>" style="width:100px; height:80px;">
                                     @endif
                                </div> 
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_testi" id="btn_testi" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/testimonials-validation.js?v=2.2') }}"></script>
@endsection
