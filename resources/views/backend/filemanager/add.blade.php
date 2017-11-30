@extends('backend.layouts.app_inner')
@section('htmlheader_title')
File Manager
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
               <div align="center" class="box-header">
                     <!--<h3 class="box-title text-navy">File Manager</h3>-->
                     <span id="brdcrum" style="float: left;">
                        <a href="javascript:" class="root">Root</a> &nbsp;&raquo;&nbsp; 
                     </span>
                  </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div id="assigngrp-err" class="error" align="center" style="padding:10px; font-size: 11px; font-weight: bold; display: none;"></div>
                  <!--beard crums -->
                  <section class="breadcrum pt-10px pb-10px">
                     <div class="bg-lit">
                        <div class="pull-right" style="margin-right: 40px;">
                           <form name="frm_search" id="frm_search" method="post" style="float: left;">     
                              {{ csrf_field() }}     
                              <input type="hidden" name="pwd" id="pwd">                 
                              <input type="hidden" name="file_id" id="file_id">                         
                              <input type="text" name="search_txt" id="search_txt" placeholder="Enter search text"  autocomplete="off" style="height: 23px">
                              <input type="button" name="search" id="search" value="Search" class="btn btn-primary btn-sm p-0-10 font-14">      
                           </form>
                           &nbsp;&nbsp;
                           <button type="button" class="btn btn-warning btn-sm p-0-10 font-14 assign-per" onclick="window.location.reload();">Refresh</button>
                           <button type="button" class="btn btn-success btn-sm p-0-10 font-14" style="background: darkcyan; border: none;" data-toggle="modal" data-target="#upFile">Upload file <i class="fa fa-upload" aria-hidden="true"></i></button>
                           <button type="button" class="btn btn-info btn-sm p-0-10 font-14" data-toggle="modal" data-target="#myModal">Create Folder <i class="fa fa-folder-open" aria-hidden="true"></i></button>  
                           <input type="button" id="assign_group" class="btn btn-success btn-sm p-0-10 font-14" value="Assign Group" />
                           <form name="frm_action" id="frm_action" method="post" style="float: right;">
                              {{ csrf_field() }}     
                              <input type="hidden" name="hid_selected_ids" id="hid_selected_ids" value="" />
                              <select name="act" id="act" style="background: #1ca8dd; color: white; display: none;">
                                 <option value="C">Client</option>
                                 <option value="P">Partner</option>
                                 <option value="E">Employee</option>
                                 <option value="G">Guest</option>
                                 <option value="GAL">Gallery</option> 
                              </select>
                              <button style="height: 23px;padding-top: 2px; display: none;" onclick="return check_confirm_filemanager('Are you sure want to do the action?');" id="btn_action" value="Action" type="button" class="btn btn-primary btn-sm" name="btn_action">Submit</button>&nbsp;
                              <button id="back2" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none;">Back</button>
                           </form>
                           <button id="back1" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none;">Back</button>
                           <br/>
                        </div>
                     </div>
                  </section>
                  <br/> 
                  <div>&nbsp;</div>
                  <div>&nbsp;</div>
                  <div class="col-xs-12 col-md-6 col-lg-12 scroll-y">
                     <div class="">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="ibox float-e-margins">
                                 <div class="ibox-content">
                                    <form name="frmfilemanager" id="frmfilemanager" onsubmit="return false;">
                                      <input type="hidden" name="pwd" id="pwd">                 
                                      <input type="hidden" name="file_id" id="file_id">
                                      <input type="hidden" name="search_txt" id="search_txt">
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

<!-- Modal -->
<form method="post" name="folder_create" id="folder_create" onsubmit="return false;">
   {{ csrf_field() }} 
   <input type="hidden" name="pwd" id="pwd">
   <input type="hidden" name="file_id" id="file_id">
   <input type="hidden" name="current_url" id="current_url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
   <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Creata a new folder</h4>
            </div>
            <div class="modal-body">
               <label>Folder Name</label>
               <input type="text" name="folder_name" id="folder_name" class="form-control" autocomplete="off" required>
               <div class="error" id="folerr" style="font-size: 12px; font-weight: bold;"></div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default btn-folder-create">Create</button>
            </div>
         </div>
      </div>
   </div>
</form>

<div id="upFile" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Files</h4>
         </div>
         <div class="modal-body">
            <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
               {{ csrf_field() }} 
               <input type="hidden" name="pwd" id="pwd">
               <input type="hidden" name="file_id" id="file_id">
               <input type="hidden" name="current_url" id="current_url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">
               <div>
                  <h3 align="center">Upload Multiple File By Click On Box</h3>
               </div>
            </form>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>

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

<input type="hidden" name="hid_file_selected_id" id="hid_file_selected_id" />
<input type="hidden" name="hid_file_selected_name" id="hid_file_selected_name" />
<input type="hidden" name="hid_file_selected_title" id="hid_file_selected_title" />
<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<link href="{{ asset('css/contextmenu.css') }}" rel="stylesheet">
<script src="{{ asset('js/contextmenu.js') }}"></script> 

<script type="text/javascript">
   $(function () {
   
       ajaxfm();
   
       Dropzone.options.imageUpload = {
           url: '{{ url("admin/filemanager/create_file") }}',
           maxFilesize: 50, //MB
           //acceptedFiles: ".jpeg,.jpg,.png,.gif"
           queuecomplete: function() {
              $('div.dz-message').hide();
           }
       };

       $('#upFile').on('hidden.bs.modal', function () {
           var pwd = $('#image-upload #pwd').val();
           var file_id = $('#image-upload #file_id').val();
           ajaxfm(pwd, file_id);
       });
   
       $('#folder_create').on('hidden.bs.modal', function () {
           $("#folder_create").trigger('reset');
           $("#folerr").hide();
       });

       $('#upFile').on('hidden.bs.modal', function () {
           $('div.dz-success').remove();
           $('div.dz-message').show();
       });
   
       $('.btn-folder-create').click(function(){
           $("#folerr").show();
           var pwd = $('#pwd').val();
           var file_id = $('#file_id').val();
           if($.trim($('#folder_name').val())=='') {
               $('#folerr').html('Enter folder name.')
           } else {          
             createfolder(pwd, file_id);          
           }
       });
   
       $('#search').click(function(){
           var pwd = $('#frm_search #pwd').val();
           var file_id = $('#frm_search #file_id').val();
           var search_txt = $('#frm_search #search_txt').val();
           ajaxfm(pwd, file_id, search_txt);
       });
   
       $('#search_txt').keyup(function(){
             var pwd = $('#frm_search #pwd').val();
             var file_id = $('#frm_search #file_id').val();
             var search_txt = $('#frm_search #search_txt').val();
             ajaxfm(pwd, file_id, search_txt);
             return false;
       });

       $('#search_txt').keypress(function(e){
          if(e.which == 13) {
            e.preventDefault();
          }
       });

       $('.root').click(function(){
          $('#frm_search #pwd').val('');
          $('#frm_search #file_id').val('');  
          $('#frm_search #search_txt').val('');
          ajaxfm();
          $('.back').hide();
       });

       $.contextMenu({ 
          selector: '.context-menu-one', 
          build: function($trigger, e) { 
              // var pwd = $('#frm_search #pwd').val();
              // var file_id = $('#frm_search #file_id').val();  
              // var search_txt = $('#frm_search #search_txt').val();
              // ajaxfm(pwd, file_id, search_txt);
              var previous_file_id = $("#hid_file_selected_id").val(); 
              var previous_file_name = $("#hid_file_selected_name").val(); 
              var previous_file_title = $("#hid_file_selected_title").val(); 
              if(previous_file_id !='') {
                  $("#file_name_area_"+previous_file_id).html(previous_file_name);
              }
              $("#hid_file_selected_id").val(e.currentTarget.id);
              $("#hid_file_selected_name").val(e.currentTarget.innerText);      

              $.ajax({
                  type: "POST",
                  url: app_url + "/admin/filemanager/get_title_fileid",
                  data: {'_token': $('input[name=_token]').val(), 'file_id': e.currentTarget.id, 'dir': $("#pwd").val()},
                  success: function (resp) { 
                      $("#hid_file_selected_title").val(resp);      
                  } 
              });

              return {
                  callback: function(key, options) {  
                      var file_id = $("#hid_file_selected_id").val();
                      var file_name = $("#hid_file_selected_name").val();
                      var titl = $("#hid_file_selected_title").val();
                      if(key == "edit") { 
                          $("#file_name_area_"+file_id).html("<input type='text' name='"+file_id+"' id='file_"+file_id+"' value='"+file_name+"' autocomplete='off' onblur='rename_file(this)' class='filenam' style='width:70px; height:20px;' />");
                      } else if(key == "delete") {
                          if (confirm("Are you sure want to do delete this record?")) {
                            delete_file();
                          }
                      } if(key == "add_title") {
                          $('.file_title').show();
                          $("#file_title_area_"+file_id).html("<input type='text' name='"+file_id+"' id='file_"+file_id+"' value='"+titl+"' autocomplete='off' onblur='add_title(this)' class='filenam' style='width:70px; height:20px;' />");
                      } 
                  },
                  items: {
                      "edit": {name: "Rename"}, 
                      "delete": {name: "Delete"},
                      "add_title": {name: "Add Title"},
                      //"quit": {name: "Quit", icon: function($element, key, item){ return 'context-menu-icon'; }}
                  }
              };
            }
        });
   
   });

   function rename_file(e) { 
      var new_value = e.value;
      var file_id = e.name;
      if(new_value !='') {
          $.ajax({
              type: "POST",
              url: app_url + "/admin/filemanager/rename",
              data: {'_token': $('input[name=_token]').val(), 'file_id': file_id, 'new_name': new_value, 'old_name': $("#hid_file_selected_name").val(), 'dir': $("#pwd").val()},
              success: function (objResponse) { 
                  $("#file_name_area_"+file_id).html(new_value);
                   var pwd = $('#frm_search #pwd').val();
                   var file_id = $('#frm_search #file_id').val();  
                   var search_txt = $('#frm_search #search_txt').val();
                   ajaxfm(pwd, file_id, search_txt);
              } 
          });
      } else {
          alert("Please enter the value"); 
          $("#file_name_area_"+file_id).html($("#hid_file_selected_name").val());
      }
   }

   function add_title(e) { 
      var title = e.value;
      var file_id = e.name;
      if(title !='') {
          $.ajax({
              type: "POST",
              url: app_url + "/admin/filemanager/add_title",
              data: {'_token': $('input[name=_token]').val(), 'file_id': file_id, 'title': title, 'dir': $("#pwd").val()},
              success: function (objResponse) { 
                   $("#file_title_area_"+file_id).html(title);
                   var pwd = $('#frm_search #pwd').val();
                   var file_id = $('#frm_search #file_id').val();  
                   var search_txt = $('#frm_search #search_txt').val();
                   ajaxfm(pwd, file_id, search_txt);
              } 
          });
      } 
   }

   function delete_file() {
      $.ajax({
          type: "POST",
          url: app_url + "/admin/filemanager/delete",
          data: {'_token': $('input[name=_token]').val(), 'file_id': $("#hid_file_selected_id").val(), 'file_name': $("#hid_file_selected_name").val(), 'dir': $("#pwd").val()},
          success: function (objResponse) {
              var pwd = $('#frm_search #pwd').val();
              var file_id = $('#frm_search #file_id').val();  
              var search_txt = $('#frm_search #search_txt').val();
              ajaxfm(pwd, file_id, search_txt);
          } 
      });
   }
   
   var action = 1;
   $('#assign_group').on("click", assignGroup);
   
   function assignGroup() {
       if ( action == 1 ) {
           $('#assign_group').removeClass('btn-success');
           $('#assign_group').addClass('btn-danger');
           $('#assign_group').attr('value','UnAssign Group');
           $('.chkall').show();
           $('.lbl').show();
           $('#act, #btn_action').show();
           action = 2;
       } else {
           $('#assign_group').removeClass('btn-danger');
           $('#assign_group').addClass('btn-success');
           $('#assign_group').attr('value','Assign Group');
           $('.chkall').hide();
           $('.lbl').hide();
           $('#act, #btn_action').hide();
           action = 1;
       }
   }
   
   function refresh() {
       $("#ajax-fm").html('Loading...');
       ajaxfm();
   }
   
   function fnTs(dir, file_id) {
       $('#search_txt').val('');
       $('#folder_create #pwd, #image-upload #pwd, #frm_search #pwd, #frmfilemanager #pwd').val(dir);
       $('#folder_create #file_id, #image-upload #file_id, #frm_search #file_id, #frmfilemanager #file_id').val(file_id);
       $('#back1').remove();
       $('#back2').show();
       hideAssignGroup();
       showBreadCrumbs(dir, file_id);
       $('.back').show();
       $.ajax({
           type: "POST",
           url: app_url + "/admin/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': dir, 'file_id': file_id},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm").html(response);
           }
       });
   }
   
   function ajaxfm(pwd=null, file_id=null, search_txt=null) {
       $.ajax({
           type: "POST",
           url: app_url + "/admin/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': pwd, 'file_id': file_id, 'search_txt': search_txt},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm").html(response);
           }
       });
   }
   
   function createfolder(pwd=null, file_id=null) { 
       $.ajax({
           type: "POST",
           url: app_url + "/admin/filemanager/create_folder",
           data: $('#folder_create').serialize(),
           success: function (resp) {
               if(resp=='success') {
                 $('#myModal').modal('hide');
                 $("#myModal").trigger('reset');
                 ajaxfm(pwd, file_id);
               } else {
                 $('#folerr').html('Folder is already added.')
               }
           }
       });
   }
   
   function fnShowImg(filename) {
       $('#mypic').modal('show');
       $('#imglang').attr('src', '<?php echo url('uploads/filemanager'); ?>'+'/'+filename);
   }

   jQuery(".chkall").on("click", function() {
      $(this).closest("tr").addClass( this.checked ? "warning" : "").removeClass(this.checked ? "" : "warning");
   });

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
                      url: app_url + "/admin/filemanager/store",
                      data: $('#frm_action').serialize(),
                      success: function (resp) {
                          var pwd = $('#pwd').val();
                          var file_id = $('#file_id').val();
                          var data = 'This folder(or)files has been assigned for this group.';
                          if(resp=='success') {
                              $('#assign_group').removeClass('btn-danger');
                              $('#assign_group').addClass('btn-success');
                              $('#assign_group').attr('value','Assign Group');
                              $('.chkall').hide();
                              $('.lbl').hide();
                              $('#act, #btn_action').hide();
                              ajaxfm(pwd, file_id, "");                              
                              $('#assigngrp-err').hide().html(data).fadeIn('slow');
                              setTimeout(function() { $('#assigngrp-err').hide(); }, 4000);
                          }
                      }
                  });
              }
          }
      }
      return true;
   }

   function hideAssignGroup() {
      $('#assign_group').removeClass('btn-danger');
      $('#assign_group').addClass('btn-success');
      $('#assign_group').attr('value','Assign Group');
      $('.chkall').hide();
      $('.lbl').hide();
      $('#act, #btn_action').hide();
   }  

   function showBreadCrumbs(dir, file_id) {
      $('.back').attr('value', dir);
   }

   $('.back').click(function(){ 
      hideAssignGroup();
      var str = $('.back').attr('value');    
      var subUrl = str.substring(0,str.lastIndexOf("/"));
      //var lastIndex = str.lastIndexOf("/");
      //str = str.substring(0, lastIndex);
      //$('.back').attr('value', str);

      //var rest = str.substring(0, str.lastIndexOf("/") + 1);
      //var last = str.substring(str.lastIndexOf("/") + 1, str.length);
      //$('.back').attr('attr', last);

      $.ajax({
           type: "POST",
           url: app_url + "/admin/filemanager/parentinfo",
           data: {'_token': $('input[name=_token]').val(), 'path': subUrl},
           success: function (resp) { 
              if(resp=='') {
                $('#frm_search #pwd, #frmfilemanager #pwd, #folder_create #pwd, #image-upload #pwd').val('');
                $('#frm_search #file_id, #frmfilemanager #file_id, #folder_create #file_id, #image-upload #file_id').val('');  
                $('#frm_search #search_txt, #frmfilemanager #search_txt').val('');
                ajaxfm(); 
                $('.back').hide();
              } else {
                $('.back').attr('value', subUrl);
                $('#frm_search #pwd, #frmfilemanager #pwd, #folder_create #pwd, #image-upload #pwd').val(subUrl);
                $('#frm_search #file_id, #frmfilemanager #file_id, #folder_create #file_id, #image-upload #file_id').val(resp);  
                $('#frm_search #search_txt, #frmfilemanager #search_txt').val('');
                ajaxfm(subUrl, resp);
              }
           }
       });
   });

</script>
@endsection