@extends('backend.layouts.app_inner')
@section('htmlheader_title')
View My Deals
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
                <div class="box-footer clearfix"> 
                    <form name="frm_action" id="frm_action" method="post" action="{{ url('/admin/deal/actionupdate') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="hid_selected_ids" id="hid_selected_ids" value="" />
                        <input type="hidden" name="user_id" id="user_id" value="{{ Request::segment(4) }}">
                        <div style="text-align:right;padding-top:18px;" class="col-sm-12">
                            @if($deal_reg->count()>0)
                            Action :
                            <select id="action" name="action" style="width:100px; margin-right:5px;">
                                <option value="Delete">Delete</option>  
                            </select>
                            <button onclick="return check_confirm('Are you sure want to do the action?');" id="btn_action" value="Action" type="button" 
                                    class="btn btn-primary btn-sm " name="btn_action"><i class="fa fa-bolt"></i>Action</button>
                            <button onclick="if (markAll())
                                             return false;" type="button" class="btn btn-primary btn-sm">Select all</button>
                            <button onclick="if (unmarkAll())
                                             return false;" type="button" class="btn btn-primary btn-sm">Deselect All</button>
                            @endif
                            <button type="button" onclick="window.location='{{ url('/admin/partner') }}'" class="btn btn-success btn-sm">Back</button>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <table @if($deal_reg->count()>0) id="example1" @else id="" @endif class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-gray color-palette">
                                <th class="head_text">#</th>
                                <th class="head_text">Partner</th>
                                <th class="head_text">End Customer</th>
                                <th class="head_text">Opportunity/Products</th>
                                <th class="head_text">Expected Closing date</th>
                                <th class="head_text">Status</th>
                                <th class="head_text" width="20%">Action</th>
                                <th class="head_text">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @if($deal_reg->count() > 0)
                            @foreach($deal_reg as $deal_reg)
                            <tr>           
                                <td>{{ $i }}</td>     
                                <td>{{ getUserNameById($deal_reg->user_id) }} </td>                    
                                <td>{{ $deal_reg->endcustomer }} </td> 
                                <td>{{ $deal_reg->opportunity_products }} </td>  
                                <td>{{ $deal_reg->expected_closing_date }} </td>
                                <td>
                                  @if($deal_reg->status==1) 
                                      <span style="color:green;">Approved</span> 
                                  @elseif($deal_reg->status==2) 
                                      <span style="color:crimson;">Rejected</span> 
                                  @else
                                      <span style="color:blue;">Pending Approval</span> 
                                  @endif
                                </td>
                                <td><button class="btn btn-primary btn-xs" onclick="return fnViewDeal({{ $deal_reg->id }});">View</button>&nbsp;<button class="btn btn-success btn-xs" onclick="return fnApprove({{ $deal_reg->id }});">Approve</button>&nbsp;<button class="btn btn-danger btn-xs" onclick="return fnReject({{ $deal_reg->id }});">Reject</button></td>
                                <td><input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="{{ $deal_reg->id }}"></td>
                            </tr>
                            <?php $i++; ?>   
                            @endforeach
                            @else
                            <tr>          
                                <td colspan="9">No records found </td>
                            </tr>   
                            @endif                    
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box --> 
        </div>
    </div>
</div>

<div id="mydeal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header" style="background: #1ca8dd; color: #ffffff;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">View Deals</h4>
         </div>
         <div class="modal-body dealinfo">              
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   function fnViewDeal(id) {
      $('#mydeal').modal('show');
      $.ajax({
          type: "POST",
          url: app_url + "/admin/deal/dealinfo",
          data: {'_token': $('input[name=_token]').val(), 'id': id},
          success: function (resp) { 
             $('.dealinfo').html(resp);
          }
      });
   }

   function fnApprove(id) {
      window.location = app_url + "/admin/deal/deal_approve/"+id;
   }

   function fnReject(id) {
      window.location = app_url + "/admin/deal/deal_reject/"+id;
   }
</script>
@endsection 