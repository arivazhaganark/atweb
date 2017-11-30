@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Customer Support
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
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/customer_support/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                    <div class="tab-content">  
                        <h3 class="box-title text-navy">Customer Support Details</h3>

                        <div class="col-xs-12">  
                            <dl class="dl-horizontal">
                                <dt>Customer :</dt>
                                <dd>{{ getUserNameByEmail($cust_support->customerid) }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Subject :</dt>
                                <dd>{{ $cust_support->subject }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Product Type :</dt>
                                <dd>{{ $cust_support->product_type }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Product Name :</dt>
                                <dd>{{ $cust_support->product_name }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Product Serial No. :</dt>
                                <dd>{{ $cust_support->p_serial_no }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Physical Condition :</dt>
                                <dd>{{ $cust_support->physical_condition }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Problem at the time of complaint :</dt>
                                <dd>{{ $cust_support->p_complaint }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Any action taken locally :</dt>
                                <dd>{{ $cust_support->locally }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Date of Purchase :</dt>
                                <dd>{{ $cust_support->purchase }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Specify the time you’d like us to contact you :</dt>
                                <dd>{{ $cust_support->specify }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Description :</dt>
                                <dd>{{ $cust_support->support_desc }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Created Date :</dt>
                                <dd>{{ $cust_support->created_date }}</dd>
                            </dl>       
                        </div>                        

                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endsection
