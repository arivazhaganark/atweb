@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Admin Settings
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="box box-primary">
                <div class="box-body" style="padding: 20px;">
                    @foreach($setting as $s)
                    <form role="form" method="post" name="frm_new" id="frm_new" action="{{ url('admin/setting/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}                        

                        <h4 style="color: green;">Admin Email Setting</h4>
                        <div class="form-group">
                            <label>SMTP E-mail</label>
                            <input name="from_email" id="from_email" type="text" class="form-control" placeholder="Admin from email" maxlength="200" value="{{ $s->from_email }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>From email display name</label>
                            <input name="from_email_display_name" id="from_email_display_name" type="text" class="form-control" placeholder="From email display name" maxlength="200" value="{{ $s->from_email_display_name }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Support email</label>
                            <input name="support_email" id="support_email" type="text" class="form-control" placeholder="Support Email" maxlength="200" value="{{ $s->support_email }}" style="width: 350px" autocomplete="off"  />
                        </div>

                        <h4 style="color: green;">Site Setting</h4>
                        <div class="form-group">
                            <label>Logo</label>
                            <input name="logo" id="logo" type="file" />
                            <div style="color: blue; font-size: 12px; float: left;"><<< Upload Photo only (.jpg, .png, .gif) File</div><br/>
                             <button type="button" id="clear" style="display: none;">Clear</button>
                             <output id="result" /></output>
                             
                            <div><img src="{{ asset('uploads/logo/') }}/{{ $s->id }}/{{ $s->logo }}" style="width: 193px; height: 47px; margin-top:10px;"></div>                            
                        </div>

                        <h4 style="color: green;">Social Media Network</h4>
                        <div class="form-group">
                            <label>Facebook</label>
                            <input name="facebook_link" id="facebook_link" type="text" class="form-control" placeholder="Facebook Link" maxlength="200" value="{{ $s->facebook_link }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Twitter</label>
                            <input name="twitter_link" id="twitter_link" type="text" class="form-control" placeholder="Twitter Link" maxlength="200" value="{{ $s->twitter_link }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Youtube</label>
                            <input name="youtube_link" id="youtube_link" type="text" class="form-control" placeholder="Youtube Link" maxlength="200" value="{{ $s->youtube_link }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Linked In</label>
                            <input name="linked_in" id="linked_in" type="text" class="form-control" placeholder="Linked In Link" maxlength="200" value="{{ $s->linked_in }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Google Plus</label>
                            <input name="google_plus" id="google_plus" type="text" class="form-control" placeholder="GooglePlus Link" maxlength="200" value="{{ $s->google_plus }}" style="width: 350px" autocomplete="off"  />
                        </div>
                        <div class="form-group">
                            <label>Pinterest</label>
                            <input name="pinterest" id="pinterest" type="text" class="form-control" placeholder="Pinterest Link" maxlength="200" value="{{ $s->pinterest }}" style="width: 350px" autocomplete="off"  />
                        </div>

                        <h4 style="color: green;">Script Content</h4>
                        <div class="form-group">
                            <label>Header</label>
                            <textarea name="header_script" id="header_script" class="form-control" placeholder="Header Script"  rows="7">{{ $s->header_script }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Footer</label>
                            <textarea name="footer_script" id="footer_script" class="form-control" placeholder="Footer Script"  rows="7">{{ $s->footer_script }}</textarea>
                        </div>

                        <div class="box-footer">
                            <center>
                                <button class="btn btn-primary" name="btn_sub" id="btn_sub" type="submit">Submit</button>
                            </center>
                        </div>

                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
window.onload = function () {
//Check File API support
    if (window.File && window.FileList && window.FileReader)
    {
        $('#logo').on("change", function (event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for (var i = 0; i < files.length; i++)
            {
                var file = files[i];
                //Only pics
                // if(!file.type.match('image'))
                if (file.type.match('image.*')) {
                    if (this.files[0].size < 2097152) {
                        // continue;
                        var picReader = new FileReader();
                        picReader.addEventListener("load", function (event) {
                            var picFile = event.target;
                            var div = document.createElement("div");
                            div.innerHTML = "<img class='thumb' src='" + picFile.result + "'" +
                                    "title='preview image' width='100' />";
                            output.insertBefore(div, null);
                        });
                        //Read the image
                        $('#clear, #result').show();
                        picReader.readAsDataURL(file);
                    } else {
                        alert("Image Size is too big. Minimum size is 2MB.");
                        $(this).val("");
                    }
                } else {
                    alert("You can only upload image file.");
                    $(this).val("");
                }
            }
        });

    } else
    {
        console.log("Your browser does not support File API");
    }
}

$('#logo').on("click", function () {
    $('.thumb').parent().remove();
    $('result').hide();
    $(this).val("");
});

$('#clear').on("click", function () {
    $('.thumb').parent().remove();
    $('#result').hide();
    $('#logo').val("");
    $(this).hide();
});
</script>
@endsection
