@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Customer Survey
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
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/customer_survey/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                    <div class="tab-content">  
                        <h3 class="box-title text-navy">Customer Details</h3>

                        <div class="col-xs-12">  
                            <dl class="dl-horizontal">
                                <dt>User :</dt>
                                <dd>{{ getUserNameById($cust_survey->user_id) }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Customer Name :</dt>
                                <dd>{{ $cust_survey->customer_name }}</dd>
                            </dl>

                        <h3 class="box-title text-navy">Survey Details</h3>

                        <div class="col-xs-12">  
                            <dl class="dl-horizontal">
                                <dt>Supply Commitment :</dt>
                                <dd>
                                a) On-time Delivery: {{ $cust_survey->ontime }} <br/>
                                b) Response to crisis: {{ $cust_survey->response }} <br/>
                                </dd>  
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Product Quality :</dt>
                                <dd>
                                a) Meeting Intended Performance: {{ $cust_survey->meeting }} <br/>
                                b) Meeting implied Requirement: {{ $cust_survey->meeting_imp }} <br/>
                                </dd>
                            </dl>       
                            <dl class="dl-horizontal">
                                <dt>Response :</dt>
                                <dd>
                                a) Towards Queries/Concerns: {{ $cust_survey->towards }} <br/>
                                b) Action against complaints: {{ $cust_survey->action_c }} <br/>
                                </dd>
                            </dl>  
                            <dl class="dl-horizontal">
                                <dt>Communication :</dt>
                                <dd>
                                a) Informing Process: {{ $cust_survey->informing_p }} <br/>
                                b) Sharing information for help(When required): {{ $cust_survey->sharing_info }} <br/>
                                </dd>
                            </dl>         
                            <dl class="dl-horizontal">
                                <dt>Progress :</dt>
                                <dd>
                                a) Effort towards improvement: {{ $cust_survey->effort }} <br/>
                                </dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Relationship :</dt>
                                <dd>
                                a) Marinating Rapport : {{ $cust_survey->marinating }} <br/>
                                </dd>
                            </dl>    

                            @if($cust_survey->evaluated1!='')    
                            <dl class="dl-horizontal">
                                <dt>Evaluated by :</dt>
                                <dd>{{ $cust_survey->evaluated1 }}</dd>
                            </dl>   
                            @endif    

                            @if($cust_survey->signature!='')    
                            <dl class="dl-horizontal">
                                <dt>Signature :</dt>
                                <dd><a href="{{ url('uploads/customer_survey/'.$cust_survey->survey_id.'/'.$cust_survey->signature) }}">View Signature</a></dd>
                            </dl>
                            @endif 

                            @if($cust_survey->designation!='')    
                            <dl class="dl-horizontal">
                                <dt>Designation :</dt>
                                <dd>{{ $cust_survey->designation }}</dd>
                            </dl>
                            @endif 

                            @if($cust_survey->date!='')    
                            <dl class="dl-horizontal">
                                <dt>Date :</dt>
                                <dd>{{ $cust_survey->date }}</dd>
                            </dl>
                            @endif 

                            @if($cust_survey->department!='')    
                            <dl class="dl-horizontal">
                                <dt>Department :</dt>
                                <dd>{{ $cust_survey->department }}</dd>
                            </dl>
                            @endif 

                            @if($cust_survey->seal!='')    
                            <dl class="dl-horizontal">
                                <dt>Seal :</dt>
                                <dd><a href="{{ url('uploads/customer_survey/'.$cust_survey->survey_id.'/'.$cust_survey->seal) }}">View Seal</a></dd>
                            </dl>
                            @endif 

                            <dl class="dl-horizontal">
                                <dt>Created Date :</dt>
                                <dd>{{ $cust_survey->created_at }}</dd>
                            </dl>       
                        </div>                        

                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endsection
