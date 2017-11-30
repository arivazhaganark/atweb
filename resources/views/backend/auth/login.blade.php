@extends('backend.layouts.app')
@section('htmlheader_title')
Login
@endsection
@section('content')

<div class="container">
    <div style="margin-bottom:200px;"></div> 
    <div class="row">
        <div class="login-logo"></div>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">     
                <?php $image = setting(); ?>            
                <div align="center" style="background: #f5f5f5;">
                    <img src="{{ asset('uploads/logo/') }}/{{ $image->id }}/{{ $image->logo }}" class="img-responsive logo" style="padding: 9px;">
                </div>
                <div style="text-align: center;font-weight: normal;font-weight: bold;" class="panel-heading">A&amp;T Video Networks - Admin Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/authenticate') }}">
                        {{ csrf_field() }}                  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if (session('status'))
                                <div style="font-size: 11px; color: crimson; font-weight: bold;">
                                    {{ session('status') }}
                                </div>
                                @endif
                                @if (count($errors)) 
                                   <div>
                                        @foreach($errors->all() as $error) 
                                            <p>{{ $error }}</p>
                                        @endforeach 
                                    </div>
                                @endif 
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button> &nbsp; <button type="button" class="btn btn-danger" onclick="window.location='{{ url('admin') }}'">
                                    <i class="fa fa-btn fa-times"></i> Cancel
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection