@extends('admin.layouts.app_inner')

@section('htmlheader_title')
	Category
@endsection


@section('content')
	<div class="container spark-screen" style="width:100%;">
		<div class="row">			

				<div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">View category </h3>
                  <div class="pull-right">
                                <a style="margin-right:4px; font-weight: bold;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/categories') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div><!-- /.box-header -->
                <div class="box-body">					
                  
	                  <form role="form" class="form-horizontal">          
		                <dl class="dl-horizontal">
		                  <dt>Title :</dt>
		                  <dd>{{ $category->name }}</dd>
		                </dl>
		                <dl class="dl-horizontal">
		                  <dt>Slug  :</dt>
		                  <dd>{{ $category->slug }}</dd>
		                </dl>
		              </form>

                </div>
              </div><!-- /.box -->


            </div>

		</div>
	</div>
@endsection
