@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Demo Request Form
@endsection
@section('content')
<style>
    dt {
        width:200px !important;
    }
    dd {
        margin-left:220px !important;
    }
    .text-navy { font-size: 20px; }
</style>
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 
            <div class="box box-primary">                 
                <div class="box-body">
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/demo_request/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                    <div class="tab-content">  
                        <h3 class="box-title text-navy">Demo Request Form Details</h3>

                        <div class="col-xs-12">  
                            <dl class="dl-horizontal">
                                <dt>User Name :</dt>
                                <dd>{{ getUserNameById($demo_request->user_id) }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Request for :</dt>
                                <dd>{{ $demo_request->request }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Demo at :</dt>
                                <dd>{{ $demo_request->demo_at }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Companyname :</dt>
                                <dd>{{ $demo_request->company_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Location :</dt>
                                <dd>{{ $demo_request->location }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Demo date :</dt>
                                <dd>{{ $demo_request->demo_date }} {{ $demo_request->demo_time }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Person InCharge :</dt>
                                <dd>{{ $demo_request->person_incharge }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Phone :</dt>
                                <dd>{{ $demo_request->phone }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Decision Making Authority’s presence :</dt>
                                <dd>{{ $demo_request->optradio }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Segment :</dt>
                                <dd>{{ $demo_request->segment }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Demo On :</dt>
                                <dd>{{ $demo_request->demon }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Product Name :</dt>
                                <dd>{{ $demo_request->product_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Solution Name :</dt>
                                <dd>{{ $demo_request->solution_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Created Date :</dt>
                                <dd>{{ $demo_request->created_at }}</dd>
                            </dl>       
                        </div> 

                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endsection
