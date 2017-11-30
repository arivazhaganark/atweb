<div class="row">

  <div class="pull-right pr-15">
      <button id="back2_dgm" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back_dgm" style="float: right; display: none;">Back</button>     
      <button id="back1_dgm" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back_dgm" style="float: right; display: none;">Back</button>
  </div>

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
    <form name="frmfilemanager_dgm" id="frmfilemanager_dgm">
       {{ csrf_field() }}     
      <input type="hidden" name="pwd" id="pwd">                 
      <input type="hidden" name="file_id" id="file_id">
      <div class="file-manager">
         <div id="ajax-fm-diagram"></div>
      </div>
    </form>
 </div>
</div>


<div id="mypic_dgm" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Images</h4>
         </div>
         <div class="modal-body">            
            <img src="" id="imglang_dgm" class="img-responsive m-auto"/>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>

<?php
    $filemanager = App\Model\backend\FileManagerModel::where('file_id', '<>', 0);
    $filemanager = $filemanager->where('file_name', 'DIAGRAMS')->where('permission', 'LIKE', '%E%')->first();
    $file_id = @$filemanager->file_id;
    $file_name = @$filemanager->file_name;
?>

<script type="text/javascript">
    $(function () {   
        $('.back_dgm').attr('value', '');
        $('#back1_dgm, #back2_dgm').hide();
        ajaxfm_diagram('<?php echo $file_name; ?>', '<?php echo $file_id; ?>', "");   

        $('.back_dgm').click(function(){ 
            var str = $('.back_dgm').attr('value');    
            var subUrl = str.substring(0,str.lastIndexOf("/"));

            $.ajax({
                 type: "POST",
                 url: app_url + "/emp_diagram/filemanager/parentinfo",
                 data: {'_token': $('input[name=_token]').val(), 'child': subUrl},
                 success: function (resp) { 
                    if(resp=='') {
                      ajaxfm_diagram(); 
                      $('.back_dgm').hide();
                    } else {
                      $('.back_dgm').attr('value', subUrl);
                      if(subUrl=='<?php echo $file_name; ?>') {
                          $('.back_dgm').hide();
                      }
                      ajaxfm_diagram(subUrl, resp);
                    }
                 }
             });
         });

    });

    function fnTs_dgm(dir, file_id) {
       $('#back1_dgm').remove();
       $('#back2_dgm').show();
       $('.back_dgm').attr('value', dir);
       $.ajax({
           type: "POST",
           url: app_url + "/emp_diagram/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': dir, 'file_id': file_id},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm-diagram").html(response);
           }
       });
    }

    function ajaxfm_diagram(pwd=null, file_id=null, search_txt=null) {
       $.ajax({
           type: "POST",
           url: app_url + "/emp_diagram/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': pwd, 'file_id': file_id, 'search_txt': search_txt},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm-diagram").html(response);
           }
       });
    }

    function fnShowImg_dgm(filename) {
       $('#mypic_dgm').modal('show');
       $('#imglang_dgm').attr('src', '<?php echo url('uploads/filemanager/'); ?>'+'/'+filename);
    }
</script>

<style type="text/css">
.file-manager 
.col-sm-2:nth-child(7), 
.col-sm-2:nth-child(13), 
.col-sm-2:nth-child(19),
.col-sm-2:nth-child(25), 
.col-sm-2:nth-child(31), 
.col-sm-2:nth-child(37),
.col-sm-2:nth-child(43), 
.col-sm-2:nth-child(49), 
.col-sm-2:nth-child(55),
.col-sm-2:nth-child(61)
{
clear: both;
}
</style>