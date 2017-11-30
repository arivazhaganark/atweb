@extends('backend.layouts.app_inner')

@section('htmlheader_title')
Partners
@endsection


@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title text-navy">View Partner Details</h3>
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/partner/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="tab-content">
                        <div id="en" class="tab-pane fade in active">
                            <form role="form" class="form-horizontal" style="padding: 15px;">
                                <dl class="dl-horizontal">
                                    <dt>Partner Type :</dt>
                                    <dd>
                                      <?php 
                                        $partnertype = explode(',', $partner->partner_type);
                                      ?>
                                      @foreach($partnertype as $t)
                                      <span>{{ $t }}, </span>
                                      @endforeach
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Company :</dt>
                                    <dd>{{ $partner->companyname }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Street :</dt>
                                    <dd>{{ $partner->street }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Email :</dt>
                                    <dd>{{ $partner->email }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Phone :</dt>
                                    <dd>{{ $partner->phone }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>State :</dt>
                                    <dd>{{ $partner->state }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Years in Business :</dt>
                                    <dd>{{ $partner->year_of_establishment }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>No. of Sales Personnel :</dt>
                                    <dd>{{ $partner->no_of_sales }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>No. of Technical Support Engineers :</dt>
                                    <dd>{{ $partner->no_of_technical }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Annual Revenue :</dt>
                                    <dd>{{ $partner->annual_revenue }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Sales Territories Covered :</dt>
                                    <dd>{{ $partner->sales_territories }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Current Focus Segment :</dt>
                                    <dd>{{ $partner->current_focus }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Products/services offered :</dt>
                                    <dd>{{ $partner->product_offer }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Brands Dealt With :</dt>
                                    <dd>{{ $partner->brand_deal }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Created At :</dt>
                                    <dd>{{ $partner->created_at }}</dd>
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
