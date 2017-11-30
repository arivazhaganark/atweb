@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Employee
@endsection

@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="employee" id="employee" action="{{ url('admin/employee/store') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="hidid" id="hidid"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Add Employee</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/employee') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label id="username">First Name <span class="text-red">*</span></label>
                                    <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name" value="" autocomplete="off" />
                                </div>     
                                <div class="form-group">
                                    <label id="username">Last Name <span class="text-red">*</span></label>
                                    <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name" value="" autocomplete="off" />
                                </div>   
                                <div class="form-group">
                                    <label id="username">Email <span class="text-red">*</span></label>
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="" autocomplete="off" />
                                </div> 
                                <div class="form-group">
                                    <label id="username">Password <span class="text-red">*</span></label>
                                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" value="" autocomplete="off" />
                                </div> 
                               <div class="form-group">
                                    <label id="username">Employee Id <span class="text-red">*</span></label>
                                    <input name="employee_id" id="employee_id" type="text" class="form-control" placeholder="Employee Id" value="" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Designation <span class="text-red">*</span></label>
                                    <input name="designation" id="designation" type="text" class="form-control" placeholder="Designation" value="" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Mobile <span class="text-red">*</span></label>
                                    <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile" value="" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label id="username">Location <span class="text-red">*</span></label>
                                    <input name="location" id="location" type="text" class="form-control" placeholder="Location" value="" autocomplete="off" />
                                </div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_add_emp" id="btn_add_emp" type="submit">Submit</button>
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
<script src="{{ asset('js/admin_pagejs/employee-validation.js?v=1.6') }}"></script>
@endsection
