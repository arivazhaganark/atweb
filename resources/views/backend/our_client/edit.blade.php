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
            <form role="form" method="post" name="edit_client" id="edit_client" action="{{ url('admin/client/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $client->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Client</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/client') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Image</label> 
                                    <input type="file" id="image" name="image" placeholder="Upload Image">
                                    <div style="color: blue; font-size: 12px; float: left;"><<< Upload Image only (.jpg, .png, .gif) File</div><br/>
                                     <button type="button" id="clear" style="display: none;">Clear</button>
                                     <output id="result" /></output>

                                     @if($client->image!='')
                                     <b>Preview</b><br/>
                                     <img src="<?php echo url('uploads/clients/'.$client->id); ?>/<?php echo $client->image; ?>" style="width:180px; height:58px;">
                                     @endif
                                </div> 
                                <div class="clearfix "></div>
                                <div class="form-group">
                                    <label id="username">Link <span class="text-red">*</span></label>
                                    <input name="link" id="link" type="text" class="form-control" placeholder="Link" value="{{ $client->link }}" autocomplete="off" />
                                </div>    
                                <div class="clearfix "></div> 
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_edit_client" id="btn_edit_client" type="submit">Submit</button>
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

<script src="{{ asset('js/admin_pagejs/our-client-validation.js?v=1.1') }}"></script>

@endsection
