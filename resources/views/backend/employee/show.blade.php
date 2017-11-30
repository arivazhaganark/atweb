@extends('backend.layouts.app_inner')

@section('htmlheader_title')
Employee
@endsection


@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title text-navy">View Employee Details</h3>
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/employee/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="tab-content">
                        <div id="en" class="tab-pane fade in active">
                            <form role="form" class="form-horizontal">
                                <dl class="dl-horizontal">
                                    <dt>First Name :</dt>
                                    <dd>{{ $employee->first_name }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Last Name :</dt>
                                    <dd>{{ $employee->last_name }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Email :</dt>
                                    <dd>{{ $employee->email }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Employee Id :</dt>
                                    <dd>{{ $employee->employee_id }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Designation :</dt>
                                    <dd>{{ $employee->designation }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Mobile :</dt>
                                    <dd>{{ $employee->mobile }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Location :</dt>
                                    <dd>{{ $employee->location }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Created At :</dt>
                                    <dd>{{ $employee->created_at }}</dd>
                                </dl>
                            </form>
                        </div>                       
                    </div>
                    <!-- /.box-body --> 
                    <!-- /.box --> 
                </div>
            </div>
        </div>
    </div>
    @endsection
