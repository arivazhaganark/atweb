@extends('backend.layouts.app_inner')
@section('htmlheader_title')
File Permission
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
<div class="row">
   @if(Session::has('message'))
   <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
   @endif  
   <div class="col-md-12">
      <div class="tab-content">
         <div id="en" class="tab-pane fade in active">
            <div class="box box-primary">
               <div class="box-header">
                     <h3 class="box-title text-navy">File Permission Details<br/><span style="font-size: 12px;">Here you can see assigned folder / files for the corresponding user roles.</span></h3>
                  </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div id="assigngrp-err" class="error" align="center" style="padding:10px; font-size: 11px; font-weight: bold; display: none;"></div>
                  <!--beard crums -->
                  <section class="breadcrum pt-10px pb-10px">
                     <div class="bg-lit">
                        <div>

                           <form name="frm_perm" id="frm_perm" method="post">     
                              {{ csrf_field() }}     
                              <select name="role" id="role" class="form-control" style="width: 30%; padding: : 10px; float: left;" placeholder="Select Role">
                                <option>-- Select Role--</option>
                                <option value="C">Client</option>
                                <option value="P">Partner</option>
                                <option value="E">Employee</option>
                                <option value="G">Guest</option>
                                <option value="im">Gallery</option>
                              </select>    
                           </form>&nbsp;&nbsp;      

                           <form name="frm_action" id="frm_action" method="post" style="float: left;">         
                              {{ csrf_field() }}     
                              <input type="hidden" name="hid_selected_ids" id="hid_selected_ids" value="" />
                              <select name="act" id="act" class="form-control" style="width: 51%; float: left; margin-left: 10px; display: none;">
                                 <option value="unset">Unset</option>
                              </select>&nbsp;&nbsp;               
                              <button style="display: none;" onclick="return check_confirm_filemanager('Are you sure want to unset this folder / files?');" id="btn_action" value="Action" type="button" class="btn btn-primary btn-sm" name="btn_action">Submit</button>
                           </form>

                           <button id="back2" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none;">Back</button>     

                        </div>
                     </div>
                  </section>
                  <button id="back1" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none;">Back</button>

                  <br/> 
                  <div>&nbsp;</div>
                  <div>&nbsp;</div>

                  <div class="col-xs-12 col-md-6 col-lg-12 scroll-y">
                     <div class="">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="ibox float-e-margins">
                                 <div class="ibox-content">
                                    <form name="frmfilemanager" id="frmfilemanager">
                                       {{ csrf_field() }}     
                                      <input type="hidden" name="pwd" id="pwd">                 
                                      <input type="hidden" name="file_id" id="file_id">
                                      <div class="file-manager">
                                         <div id="ajax-fm"></div>
                                      </div>
                                    </form>
                                    <br/><br/>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- fodlers end-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<input type="hidden" name="hid_file_selected_id" id="hid_file_selected_id" />
<input type="hidden" name="hid_file_selected_name" id="hid_file_selected_name" />
<div id="mypic" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Images</h4>
         </div>
         <div class="modal-body">            
            <img src="" id="imglang" class="img-responsive m-auto"/>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
    $(function () {   
        $("#role").change(function() {
            $('.back').attr('value', '');
            $('#back1, #back2').hide();
            //$('#act, #btn_action').show();
            ajaxfm();   
        });

        $('.back').click(function(){ 
            var str = $('.back').attr('value');      
            var lastIndex = str.lastIndexOf("/");
            str = str.substring(0, lastIndex);
            $('.back').attr('value', str);

            var rest = str.substring(0, str.lastIndexOf("/") + 1);
            var last = str.substring(str.lastIndexOf("/") + 1, str.length);
            $('.back').attr('attr', last);

            $.ajax({
                 type: "POST",
                 url: app_url + "/admin/filepermission/parentinfo",
                 data: {'_token': $('input[name=_token]').val(), 'child': last},
                 success: function (resp) { 
                    if(resp=='') {
                      $('#frm_search #pwd').val('');
                      $('#frm_search #file_id').val('');  
                      $('#frm_search #search_txt').val('');
                      ajaxfm(); 
                      $('.back').hide();
                    } else {
                      $('#frm_search #pwd').val(str);
                      $('#frm_search #file_id').val(resp);  
                      $('#frm_search #search_txt').val('');
                      ajaxfm(str, resp);
                    }
                 }
             });
         });

    });
   
    function refresh() {
       $("#ajax-fm").html('Loading...');
       ajaxfm();
    }

    function fnTs(dir, file_id) {
       var type = $('#role').val();
       $('#back1').remove();
       $('#back2').show();
       showBreadCrumbs(dir, file_id);
       $.ajax({
           type: "POST",
           url: app_url + "/admin/filepermission/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': dir, 'file_id': file_id, 'type': type},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm").html(response);
           }
       });
    }

    function ajaxfm(pwd=null, file_id=null, search_txt=null) {
       var type = $('#role').val();
       $.ajax({
           type: "POST",
           url: app_url + "/admin/filepermission/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': pwd, 'file_id': file_id, 'search_txt': search_txt, 'type': type},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm").html(response);
           }
       });
    }

    function fnShowImg(filename) {
       $('#mypic').modal('show');
       $('#imglang').attr('src', '<?php echo url('uploads/filemanager'); ?>'+'/'+filename);
    } 

    function showBreadCrumbs(dir, file_id) {
       $('.back').attr('value', dir);
    }

    function check_confirm_filemanager(custom_msg, type)
    {
        var checked = [];
        $("input[name='chkall[]']:checked").each(function () {
            checked.push($(this).val());
        });
        $("#hid_selected_ids").val(checked);
        if (checked == "")
        {
            alert("Please select atleast one checkbox.")
            return false;
        } else
        {
            if (custom_msg) {
                var checkconfirm = confirm(custom_msg);
                if (checkconfirm == false)
                {
                    return false;
                } else {
                    $.ajax({
                      type: "POST",
                      url: app_url + "/admin/filepermission/unset",
                      data: $('#frm_action').serialize(),
                      success: function (resp) {
                          
                      }
                  });
                }
            }
        }
        return true;
    }
</script>
@endsection