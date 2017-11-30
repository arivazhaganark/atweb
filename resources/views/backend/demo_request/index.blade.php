@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Demo Request Form
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif 
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> </div>
        <div class="col-xs-12">
            <div class="box">                
                @if($demo_request->count() > 0)
                <div class="box-footer clearfix"> 
                    <form name="frm_action" id="frm_action" method="post" action="{{ url('/admin/demo_request/actionupdate') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="hid_selected_ids" id="hid_selected_ids" value="" />
                        <div style="text-align:right;padding-top:18px;" class="col-sm-12">Action :
                            <select id="action" name="action" style="width:100px; margin-right:5px;">
                                <option value="Delete">Delete</option>  
                            </select>
                            <button onclick="return check_confirm('Are you sure want to do the action?');" id="btn_action" value="Action" type="button" 
                                    class="btn btn-primary btn-sm " name="btn_action"><i class="fa fa-bolt"></i>Action</button>
                            <button onclick="if (markAll())
                                             return false;" type="button" class="btn btn-primary btn-sm">Select all</button>
                            <button onclick="if (unmarkAll())
                                             return false;" type="button" class="btn btn-primary btn-sm">Deselect All</button>
                        </div>
                    </form>
                </div>
                @endif
                <div class="box-body">
                    <table @if($demo_request->count()>0) id="example1" @else id="" @endif class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-gray color-palette">
                                <th class="head_text">#</th>
                                <th class="head_text">Type</th>
                                <th class="head_text">User Name</th>
                                <th class="head_text">Request for</th>
                                <th class="head_text">Demo at</th>
                                <th class="head_text">Demo on</th>
                                <th class="head_text">Location</th>
                                <th class="head_text">Demo Date</th>
                                <th class="head_text">Action</th>
                                <th class="head_text">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @if ( $demo_request->count() > 0 )
                            @foreach( $demo_request as $demo_request )
                            <tr>           
                                <td>{{ $i }}</td>   
                                <td>
                                    <?php 
                                        $type = getUserTypeById($demo_request->user_id);
                                        if($type=='V')
                                            echo 'Visitor';
                                        if($type=='P')
                                            echo 'Partner';
                                        if($type=='C')
                                            echo 'Customer';
                                    ?>                                        
                                </td>       
                                <td>{{ getUserNameById($demo_request->user_id) }}</td>   
                                <td>{{ $demo_request->request }} </td>  
                                <td>{{ $demo_request->demo_at }} </td>             
                                <td>{{ $demo_request->demon }} </td>
                                <td>{{ $demo_request->location }} </td>  
                                <td>{{ $demo_request->demo_date }} <br/> {{ $demo_request->demo_time }}</td>  
                                <td><a class="btn btn-default" href="<?php echo url('admin/demo_request/show/'.$demo_request->id); ?>" title="View"><i class="fa fa-file-text"></i></a></td>
                                <td><input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="{{ $demo_request->id }}"></td>
                            </tr>
                            <?php $i++; ?>   
                            @endforeach
                            @else
                            <tr>          
                                <td colspan="10">No records found </td>
                            </tr>   
                            @endif                    
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box --> 
        </div>
    </div>
</div>
@endsection 