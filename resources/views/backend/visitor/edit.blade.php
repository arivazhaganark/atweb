@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Visitor
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="visitor" id="visitor" action="{{ url('admin/visitor/update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $user->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Visitor</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/visitor') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">Name</label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $user->first_name }} {{ $user->last_name }}" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Email <span class="text-red">*</span></label>
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" autocomplete="off" />
                                </div>                                  
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_visitor" id="btn_visitor" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/visitor-validation.js?v=1.1') }}"></script>
@endsection
