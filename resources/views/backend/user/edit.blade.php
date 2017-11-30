@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Customers
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="client_reg" id="client_reg" action="{{ url('admin/user/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $user->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Customer</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/user') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">Company Name</label>
                                    <input name="companyname" id="companyname" type="text" class="form-control" placeholder="Company Name" value="{{ $user->companyname }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Contact Person</label>
                                    <input name="cperson" id="cperson" type="text" class="form-control" placeholder="Contact Person" autocomplete="off" value="{{ $user->cperson }}" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Email <span class="text-red">*</span></label>
                                    <input name="email" id="cemail" type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" autocomplete="off" />
                                </div>    
                                <div class="form-group">
                                    <label>Phone <span class="text-red">*</span></label> 
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone" autocomplete="off" value="{{ $user->phone }}" />
                                </div>  
                                <div class="form-group">
                                    <label id="username">Location</label>
                                    <input name="location" id="location" type="text" class="form-control" placeholder="Location" autocomplete="off" value="{{ $user->location }}" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Customer Name <span class="text-red">*</span></label>
                                    <input name="customer_name" id="customer_name" type="text" class="form-control" placeholder="Customer Name" value="{{ $user->first_name }} {{ $user->last_name }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label><strong>Would you also like to receive information on new products &amp; technologies from us?</strong><span class="color-red">*</span>
                                    </label><br/>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="1" @if($user->customer_notification==1) checked @endif>Yes</label>
                                    <label class="radio-inline"><input type="radio" name="optradio" value="0" @if($user->customer_notification==0) checked @endif>No</label>
                                </div>
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_client_reg" id="btn_client_reg" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/client-validation.js?v=1.8') }}"></script>
@endsection
