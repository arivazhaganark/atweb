@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Our Clients
@endsection

@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="add_client" id="add_client" action="{{ url('admin/client/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="hidid" id="hidid"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Add New Client</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/client') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Image <span class="text-red">*</span></label> 
                                    <input type="file" id="image" name="image" placeholder="Upload Image">
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File</div><br/>
                                     <button type="button" id="clear" style="display: none;">Clear</button>
                                     <output id="result" /></output>
                                </div> 
                                <div class="clearfix "></div>
                                <div class="form-group">
                                    <label id="username">Link <span class="text-red">*</span></label>
                                    <input name="link" id="link" type="text" class="form-control" placeholder="Link" value="" autocomplete="off" />
                                </div>       
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_add_client" id="btn_add_client" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/our-clients-validation.js') }}"></script>
@endsection
