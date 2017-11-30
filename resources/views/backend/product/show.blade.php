@extends('backend.layouts.app_inner')

@section('htmlheader_title')
Product
@endsection


@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title text-navy">View Product Details</h3>
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/product/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="tab-content">
                        <div id="en" class="tab-pane fade in active">
                            <form role="form" class="form-horizontal">
                                <dl class="dl-horizontal">
                                    <dt>Name :</dt>
                                    <dd>{{ $product->name }}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Cms page :</dt>
                                    <?php $cms = App\Model\backend\Category::where('id',$product->cms_id)->first(); ?>
                                    <dd>{{ $cms->name }}</dd>
                                </dl> 
                                <dl class="dl-horizontal">
                                    <dt>Features :</dt>
                                    <dd>{!!$product->features!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Technical Specification :</dt>
                                    <dd>{!!$product->technical_specification!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Description :</dt>
                                    <dd>{!!$product->description!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Benefits :</dt>
                                    <dd>{!!$product->benefits!!}</dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Data Sheet :</dt>
                                    <dd>
                                        @if($product->data_sheet != '')
                                           <a href="<?php echo url('uploads/data_sheet/'); ?>/<?php echo $product->data_sheet; ?>" style="color:white;float:left;background:crimson; padding:5px;" target="new">Preview Excel File</a>
                                           @else
                                           ---
                                        @endif
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                    <dt>Image :</dt>
                                    <?php 
                                        $image_count = DB::table('product_image')->where('product_id', $product->id)->count(); 
                                        $image = DB::table('product_image')->where('product_id', $product->id)->get();
                                        if($image_count>0) { 
                                    ?>
                                        <dd>
                                        @foreach($image as $i)                                        
                                            <img src="{{ asset('uploads/product') }}/{{ $product->id }}/{{ $i->image }}" width="128" height="80" style="border: 1px solid lightgray;">
                                        @endforeach
                                        </dd>
                                    <?php } ?>
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
