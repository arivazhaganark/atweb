@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Customer Support
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
                @if($cust_support->count() > 0)
                <div class="box-footer clearfix"> 
                    <form name="frm_action" id="frm_action" method="post" action="{{ url('/admin/customer_support/actionupdate') }}">
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
                    <table @if($cust_support->count()>0) id="example1" @else id="" @endif class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-gray color-palette">
                                <th class="head_text">#</th>
                                <th class="head_text">Customer</th>
                                <th class="head_text">Subject</th>
                                <th class="head_text">Product Type</th>
                                <th class="head_text">Product Name</th>
                                <th class="head_text">Action</th>
                                <th class="head_text">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @if ( $cust_support->count() > 0 )
                            @foreach( $cust_support as $cust_support )
                            <tr>           
                                <td>{{ $i }}</td>                        
                                <td>{{ getUserNameByEmail($cust_support->customerid) }} </td>
                                <td>{{ $cust_support->subject }} </td>  
                                <td>{{ $cust_support->product_type }} </td>  
                                <td>{{ $cust_support->product_name }} </td>  
                                <td><a class="btn btn-default" href="<?php echo url('admin/customer_support/show/'.$cust_support->cs_id); ?>" title="View"><i class="fa fa-file-text"></i></a></td>
                                <td><input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="{{ $cust_support->cs_id }}"></td>
                            </tr>
                            <?php $i++; ?>   
                            @endforeach
                            @else
                            <tr>          
                                <td colspan="7">No records found </td>
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