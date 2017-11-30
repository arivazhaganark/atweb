@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Category
@endsection

@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">           
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit category </h3>
                    <div class="pull-right">
                        <a style="margin-right:4px; font-weight: bold;" class="btn  btn-default btn-xs text-purple" href="{{ url('admin/categories') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" name="category_update" id="category_update" role="form" method="POST" action="" onsubmit="return false;">
                        {{ csrf_field() }}
                        <input type="hidden" name="hidid" id="hidid" value="{{ $category->id }}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Root</label>
                                <?php 
                                $categoryList = fetchCategoryTree();
                                ?>
                                <select name="parent" id="parent" class="form-control">
                                <option value="">Select</option>
                                <?php foreach($categoryList as $cl) { ?>
                                <option value="<?php echo $cl["id"] ?>" @if($cl["id"] == $category->parent) selected="selected" @endif><?php echo $cl["name"]; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $category->name }}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ $category->slug }}" >
                            </div>
                            <div class="form-group">
                                <label>Position</label> 
                                <input type="text" style="width: 110px;" class="form-control" name="position" id="position" autocomplete="off" placeholder="Position" value="{{ $category->position }}" autocomplete="off"/>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" id="btn_update_category" name="submit" value="Submit" class="btn btn-primary" />&nbsp;&nbsp;
                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location ='{{ url('admin/categories') }}'" />
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</div>
<script src="{{ asset('js/admin_pagejs/category-validation.js?v=1.7') }}"></script>
<script src="{{ asset('js/admin_pagejs/category-action.js?v=1.9') }}"></script>
@endsection
