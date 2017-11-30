@extends('backend.layouts.app_inner')

@section('htmlheader_title')
Category
@endsection

@section('content')
<div class="container spark-screen" style="width:100%;">
    <form name="frmdeletepost" id="frmdeletepost" method="POST" onsubmit="return false;">
        {{ csrf_field() }}
        <input type="hidden" name="catid" id="catid" value="{{ @$_GET['cat_id'] }}">

        @if(Session::has('message'))
        <div @if(Session::get('alert-class', 'alert-info')=='alert-warning') align="center" @endif class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}
            @if(Session::get('alert-class', 'alert-info')=='alert-warning')
            <div align="center" style="margin-top: 20px;"><input type="button" name="ok" id="ok" value="OK" class="btn btn-primary btn-sm" onclick="return fnDeletePost();">&nbsp;&nbsp;<input type="submit" name="cancel" id="cancel" value="CANCEL" class="btn btn-danger btn-sm" onclick="window.location.reload()"></div>
            @endif
        </div>
        @endif
    </form> 
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> <a class="btn btn-app" href="{{ url('admin/categories/add') }}" title="Add"> <i class="fa fa-plus"></i> Add </a></div>
        <div class="col-xs-12">

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">List categories </h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <link href="{{ asset('css/jquery.treegrid.css') }}" rel="stylesheet">                    

                    <link rel="stylesheet" href="{{ asset('css/bootstrap-treeview.min.css') }}" type="text/css" media="all">
                    <script src="{{ asset('js/bootstrap-treeview.min.js?v=2.0') }}"></script>
                    <script src="{{ asset('js/treeview-script.js?v=1.2') }}"></script>

                    <div class="row">   
                        <div class="col-md-12" id="treeview"></div>  
                    </div>  

                </div><!-- /.box-body -->
            </div><!-- /.box -->     

        </div>
    </div>
</div>

<style type="text/css">
    .node-selected { color: #000000 !important; background-color: #ffffff !important; }
</style>

<script type="text/javascript">
function fnDeletePost() {
    var catid = $('#catid').val();
    $.ajax({
        type: 'POST',
        url: app_url + "/admin/categories/delete_post_by_cat",
        data: $('#frmdeletepost').serialize(),
        success: function (response)
        {
            window.location.href = app_url + '/admin/categories';
        }
    });
}
</script>
@endsection
