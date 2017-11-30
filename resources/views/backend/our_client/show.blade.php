@extends('backend.layouts.app_inner')

@section('htmlheader_title')
Our Clients
@endsection


@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title text-navy">View Client Details</h3>
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/client/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="tab-content">
                        <div id="en" class="tab-pane fade in active">
                            <form role="form" class="form-horizontal">
                                <dl class="dl-horizontal">
                                    <dt>Link :</dt>
                                    <dd>{{ $client->link }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Image  :</dt>
                                    <dd>
                                        @if($client->image!='')
                                            <img src="<?php echo url('uploads/clients/'.$client->id); ?>/<?php echo $client->image; ?>" style="width:180px; height:58px;">
                                        @else
                                            <img src="<?php echo url('images/no-image.png'); ?>" style="width:100px; height:90px;">
                                        @endif
                                    </dd>
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
