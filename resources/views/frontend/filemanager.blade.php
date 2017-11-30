<h4 class="font-20  border-dotted-bottom pb-14 mb-2 mt-0"><strong>Resources</strong></h4>
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


<script type="text/javascript">
    $(function () {   
        $('.back').attr('value', '');
        $('#back1, #back2').hide();
        ajaxfm();   

        $('.back').click(function(){ 
            var str = $('.back').attr('value');    
            var subUrl = str.substring(0,str.lastIndexOf("/"));

            $.ajax({
                 type: "POST",
                 url: app_url + "/user/filemanager/parentinfo",
                 data: {'_token': $('input[name=_token]').val(), 'child': subUrl},
                 success: function (resp) { 
                    if(resp=='') {
                      $('#frm_search #pwd').val('');
                      $('#frm_search #file_id').val('');  
                      $('#frm_search #search_txt').val('');
                      ajaxfm(); 
                      $('.back').hide();
                    } else {
                      $('.back').attr('value', subUrl);
                      $('#frm_search #pwd').val(subUrl);
                      $('#frm_search #file_id').val(resp);  
                      $('#frm_search #search_txt').val('');
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
           url: app_url + "/user/filemanager/ajaxfm",
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
           url: app_url + "/user/filemanager/ajaxfm",
           data: {'_token': $('input[name=_token]').val(), 'dir': pwd, 'file_id': file_id, 'search_txt': search_txt},
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
