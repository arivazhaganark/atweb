@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Change password
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    <div class="row">           
        <div class="col-md-10 col-md-offset-1">

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif  

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title text-olive">Change password</h3>
                </div>
                @if($errors->all())
                <div id="form-errors">
                    <p>The following errors have occurred:</p>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><!-- end form-errors -->
                @endif

                <div class="box-body">  
                    <form role="form" method="post" name="password_form" id="password_form" action="{{ url('admin/change_password/store') }}" onsubmit="return false;">
                        {{ csrf_field() }}
                        
                        <!-- text input -->
                        <div class="form-group">
                            <label>Old Password <span class="text-red">*</span></label>
                            <input name="old_password" id="old_password" type="password" class="form-control" placeholder="Current Password" value="" /> 
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label>New Password <span class="text-red">*</span></label>
                            <input  name="new_password" id="new_password" type="password" class="form-control" placeholder="New Password" value="" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-red">*</span></label>
                            <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" value="" />
                        </div>               

                        <div class="box-footer"><center>
                                <button class="btn btn-primary" name="btn_password_tab" id="btn_password_tab" type="button">Submit</button></center>
                        </div>
                    </form> 
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</div> 
<script src="{{ asset('js/pagejs/change-password-validation.js?v=1.9') }}"></script>  
@endsection
