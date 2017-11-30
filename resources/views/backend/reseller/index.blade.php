@extends('backend.layouts.app_inner')
@section('htmlheader_title')
View Reseller
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
                    <form name="frm_action" id="frm_action" method="post" action="{{ url('/admin/reseller/actionupdate') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="hid_selected_ids" id="hid_selected_ids" value="" />
                        <input type="hidden" name="user_id" id="user_id" value="{{ Request::segment(4) }}">
                        <div style="text-align:right;padding-top:18px;" class="col-sm-12">
                            @if($reseller->count()>0)
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
                    <table @if($reseller->count()>0) id="example1" @else id="" @endif class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-gray color-palette">
                                <th class="head_text">#</th>
                                <th class="head_text">Partner</th>
                                <th class="head_text">Frim Name</th>
                                <th class="head_text">Address</th>
                                <th class="head_text">Phone</th>
                                <th class="head_text">Email</th>
                                <th class="head_text">Action</th>
                                <th class="head_text">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @if($reseller->count() > 0)
                            @foreach($reseller as $reseller)
                            <tr>           
                                <td>{{ $i }}</td>     
                                <td>{{ getUserNameById($reseller->user_id) }} </td>                    
                                <td>{{ $reseller->frimname }} </td> 
                                <td>{{ $reseller->address }} </td>  
                                <td>{{ $reseller->phone }} </td>  
                                <td>{{ $reseller->email }} </td>
                                <td><a class="btn btn-default" href="javascript:" title="View" onclick="return fnViewReseller({{ $reseller->resel_id }});"><i class="fa fa-file-text"></i></a></td>
                                <td><input name="chkall[]" id="chkall" class="chkall" type="checkbox" value="{{ $reseller->resel_id }}"></td>
                            </tr>
                            <?php $i++; ?>   
                            @endforeach
                            @else
                            <tr>          
                                <td colspan="8">No records found </td>
                            </tr>   
                            @endif                    
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box --> 
        </div>
    </div>
</div>

<div id="myresel" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header" style="background: #1ca8dd; color: #ffffff;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">View Reseller</h4>
         </div>
         <div class="modal-body reselinfo">              
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   function fnViewReseller(id) {
      $('#myresel').modal('show');
      $.ajax({
          type: "POST",
          url: app_url + "/admin/reseller/resel_info",
          data: {'_token': $('input[name=_token]').val(), 'id': id},
          success: function (resp) { 
             $('.reselinfo').html(resp);
          }
      });
   }
</script>
@endsection 