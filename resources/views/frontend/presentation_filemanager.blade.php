<div class="row">
 <button id="back2" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none; margin-right: 10px;">Back</button>     
 <button id="back1" type="button" class="btn btn-danger btn-sm p-0-10 font-14 back" style="float: right; display: none;  margin-right: 10px;">Back</button>
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form name="frmfilemanager" id="frmfilemanager">
       {{ csrf_field() }}     
      <input type="hidden" name="pwd" id="pwd">                 
      <input type="hidden" name="file_id" id="file_id">
      <div class="file-manager">
         <div id="ajax-fm"></div>
      </div>
    </form>
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

<?php
   $filemanager = App\Model\backend\FileManagerModel::where('permission', 'LIKE', '%G%')
                    ->where('file_name', 'PRESENTATION')->first();
   $file_id = isset($filemanager->file_id)?$filemanager->file_id:'';
   $file_name = isset($filemanager->file_name)?$filemanager->file_name:'';
?>

<script type="text/javascript">
    $(function () {   
        $('.back').attr('value', '');
        $('#back1, #back2').hide();
        ajaxfm('<?php echo 'PRODUCT/'.$file_name; ?>', '<?php echo $file_id; ?>', "");   

        $('.back').click(function(){ 
            var s = $('.back').attr('value');    
            var subUrl = s.substring(0,s.lastIndexOf("/"));

            var str = $('.back').attr('value');  
            var lastIndex = str.lastIndexOf("/");
            str = str.substring(0, lastIndex); 
            $('.back').attr('value', str);

            var rest = str.substring(0, str.lastIndexOf("/") + 1);
            var last = str.substring(str.lastIndexOf("/") + 1, str.length);  
            $('.back').attr('attr', last);

            $.ajax({
                 type: "POST",
                 url: app_url + "/presentation/filemanager/parentinfo",
                 data: {'_token': $('input[name=_token]').val(), 'child': subUrl},
                 success: function (resp) { 
                    if(last=='PRESENTATION') {
                      $('#frm_search #pwd').val('');
                      $('#frm_search #file_id').val('');  
                      $('#frm_search #search_txt').val('');
                      ajaxfm('<?php echo 'PRODUCT/'.$file_name; ?>', '<?php echo $file_id; ?>', "");   
                      $('.back').hide();
                    } else {
                      $('.back').attr('value', subUrl);
                      $('#frm_search #pwd').val(subUrl);
                      $('#frm_search #file_id').val(resp);  
                      $('#frm_search #search_txt').val('');
                      if(subUrl=='<?php echo $file_name; ?>') {
                          $('.back').hide();
                      }
                      ajaxfm(subUrl, resp);
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
       $('#back1').remove();
       $('#back2').show();
       showBreadCrumbs(dir, file_id); 
       $.ajax({
           type: "POST",
           url: app_url + "/presentation/filemanager/ajaxfm",
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
           url: app_url + "/presentation/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': pwd, 'file_id': file_id, 'search_txt': search_txt},
           success: function (objResponse) {
               var response = $.trim(objResponse);
               $("#ajax-fm").html(response);
           }
       });
    }

    function fnShowImg(filename) {
       $('#mypic').modal('show');
       $('#imglang').attr('src', '<?php echo url('uploads/filemanager/'); ?>'+'/'+filename);
    }

    function showBreadCrumbs(dir, file_id) {
       $('.back').attr('value', dir);
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
