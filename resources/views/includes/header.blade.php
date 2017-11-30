<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>A&T Video Networks</title>
      <?php $seo = seo_setting(); ?>
      <meta name="title" content="{{ @$seo->seo_title }}" />
      <meta name="description" content="{{ @$seo->seo_description }}" />
      <meta name="keywords" content="{{ @$seo->seo_keywords }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}"/>
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('assets/css/style.css?v=1.8') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Antic+Slab|Heebo" rel="stylesheet">
      <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/thumbGrid.css') }}"/>

      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery.validate.js') }}"></script>

      <link rel='stylesheet prefetch' href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
      <script src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
      
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepickr.min.css?v=1.1') }}">
	  <script src="{{ asset('assets/js/datepickr.min.js') }}"></script>

      <script>
          var app_url = '{{ url('') }}';
      </script>
      <style type="text/css">.error { color: crimson; font-size: 11px; font-style: italic; font-weight: bold; }</style>
   </head>
   <body>
      <div class="main_wrapper">
      <!-- Fixed navbar -->
      <!-- menu part -->      
      <nav class="navbar navbar-inverse navbar-default" data-spy="affix"  data-offset-top="10">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <?php $image = setting(); ?> 
               <a class="navbar-brand" href="{{ url('') }}">
               <img src="{{ asset('uploads/logo/') }}/{{ $image->id }}/{{ $image->logo }}" class="img-responsive logo"/>
               <p class="tag-line">innovating everything video</p> 
               </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">              
               <ul class="nav navbar-nav p-0-60 font-18 font-14-320 sidebar-menu top-menu" id="sildermenu_id">
                  <?php
                     $category = getCategory();
                     foreach($category as $c) {
                  ?>
                  <li class="dropdown mega-dropdown column">                     
                     <a href="javascript:" class="dropdown-toggle font-16" data-toggle="dropdown"> <?php echo $c->name; ?> <span class="caret"></span></a>                      
                     <?php $subcategory = getSubCategory($c->id); ?>
                     <ul class="dropdown-menu mega-dropdown-menu"> 
                        <?php $class = '';
                           foreach($subcategory as $sc) {
                              $cms_data = App\Model\backend\Cms_Model::where('cat_id', $sc->id)->select('slug')->first();
                              if($sc->parent==1 || $sc->parent==3) {
                                 $class='check_menu';                                
                                 if($sc->parent==1)
                                  $act1 = 'expertisemenu';
                                 if($sc->parent==3)
                                    $act2 = 'partnermenu';     
                              ?>    
                              <ul class="menuchild active" id="@if($sc->parent == 1)<?php echo $act1;?>@else<?php echo $act2; ?>@endif">                             
                              <li class="dropdown-header <?php echo $class; ?>"><a href="{{ url('') }}/{{ $cms_data->slug }}"><?php echo $sc->name; ?></a></li>
                              </ul>                        
                        <?php } else { ?>
                        <?php if(@$sc->slug!='ict-av-design') { ?>
                        <li class="col-sm-2 @if($sc->slug=='distribution') dis_menu @endif">                                 
                           <ul class="menuchild active">                             
                              <li class="dropdown-header <?php echo @$class; ?>"><a href="{{ url('') }}/{{ @$cms_data->slug }}"><?php echo @$sc->name; ?></a></li>
                                 <?php 
                                    $subsubcategory = getSubSubCategory($sc->id);
                                    foreach($subsubcategory as $ssc) {
                                        $cdata_count = App\Model\backend\Cms_Model::where('cat_id', $ssc->id)->select('slug')->count();
                                        if($cdata_count>0) {
                                             $cdata = App\Model\backend\Cms_Model::where('cat_id', $ssc->id)->select('slug')->first();
                                             $subpage = url('/'.$cms_data->slug.'/'.$cdata->slug);
                                        } else {
                                             $subpage = 'javascript:';
                                        }
                                 ?>
                                 <li><a href="{{ $subpage }}"><?php echo $ssc->name; ?></a></li>
                                 <?php } ?>                              
                           </ul>                           
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                     </ul>
                  </li>
                  <?php } ?>
               </ul>              
               <ul class="nav navbar-nav navbar-right font-18 font-14-320 emailblock">
                  <li class="email-form hidden-sm hidden-md">
                     <p classs="font-16">
                        <i class="fa fa-envelope font-black" aria-hidden="true"></i>
                        <span class="pl-10px font-grey-777">sales@atnetindia.net</span>
                     </p>
                  </li>
                   
                   
<!--
                  <li class="w-50-320">
                     <form class="search-box pull-right" action="#" method="post">
                        <span class="icon-magnifier search-icon">
                        <i class="fa fa-search p-22 c-pointer p-2-320"></i>
                        </span>      
                        <div class="form-group">
                           <div class="icon-addon addon-lg">
                              <input type="text" name="search-bar" class="search-bar form-control search-animate" placeholder="Search" style="
                                 ">
                           </div>
                        </div>                       
                     </form>
                  </li>
-->
                  <ul class="nav navbar-nav navbar-right font-18 font-14-320">
                  <li class="w-50-320">
                     <form class="search-box pull-right" method="get" action="{{ url('search') }}" onsubmit="return fnSearch();">
                        <span class="icon-magnifier search-icon">
                        <i class="fa fa-search p-22 c-pointer p-2-320 search-faicon"></i>
                        </span>      
                        <div class="form-group">
                           <div class="icon-addon addon-lg">
                              <input type="text" name="q" id="q" class="search-bar form-control search-animate" autocomplete="off" placeholder="Search" value="{{ @$_GET['q'] }}">
                           </div>
                        </div>
                     </form>
                  </li>
                  @if(Auth::guard('user')->user())
                  <li class="dropdown mega-dropdown loginform w-30-320">
                     <a href="{{ url('user/logout') }}" class="dropdown-toggle login mt-0-320px" data-toggle="dropdown">
                     <i class="fa fa-user font-18 v-a-t pr-5px"></i>
                     <span class=""> 
                     @if(Auth::guard('user')->user()->type=='P')
                        {{ Auth::guard('user')->user()->companyname }} 
                     @else
                        {{ Auth::guard('user')->user()->first_name }} 
                     @endif
                     </span>
                     </a>
                     <ul class="dropdown-menu mega-dropdown-menu1 p-0 w-0per r-5">
                        <div class="modal-body">   
                               @if(Auth::guard('user')->user()->type=='C')
                              <p class="text-left">
                              <a href="{{ url('user/dashboard') }}" class="font-blue font-12">Dashboard</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/myprofile') }}" class="font-blue font-12">My Profile</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/change_password') }}" class="font-blue font-12">Change Password</a></p>  <p class="text-left">
                              <a href="{{ url('user/logout') }}" class="font-blue font-12 mb-0">Logout</a></p>
                              @endif

                              @if(Auth::guard('user')->user()->type=='P')
                              <p class="text-left">
                              <a href="{{ url('user/dashboard') }}" class="font-blue font-12">Dashboard</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/myprofile') }}" class="font-blue font-12">My Profile</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/change_password') }}" class="font-blue font-12">Change Password</a></p>  <p class="text-left">
                              <a href="{{ url('user/logout') }}" class="font-blue font-12 mb-0">Logout</a></p>
                              @endif

                              @if(Auth::guard('user')->user()->type=='E')
                              <p class="text-left">
                              <a href="{{ url('user/dashboard') }}" class="font-blue font-12">Resources</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/myprofile') }}" class="font-blue font-12">My Profile</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/change_password') }}" class="font-blue font-12">Change Password</a></p>  <p class="text-left">
                              <a href="{{ url('user/logout') }}" class="font-blue font-12 mb-0">Logout</a></p>
                              @endif

                              @if(Auth::guard('user')->user()->type=='V')
                              <p class="text-left">
                              <a href="{{ url('user/dashboard') }}" class="font-blue font-12">Dashboard</a></p>
                              <p class="text-left">
                              <a href="{{ url('user/change_password') }}" class="font-blue font-12">Change Password</a></p>  <p class="text-left">
                              <a href="{{ url('user/logout') }}" class="font-blue font-12 mb-0">Logout</a></p>
                              @endif
                        </div>
                     </ul>
                  </li>
                  @else
                  <li class="dropdown mega-dropdown loginform">
                     <a href="#" class="dropdown-toggle login mt-0-320px w-30-320" data-toggle="dropdown">
                     <i class="fa fa-user font-18 v-a-t pr-5px"></i>
                     <span class=""> Login </span>
                     </a>
                     <ul class="dropdown-menu mega-dropdown-menu p-0 sidelogin">
                        <div class="modal-body">
                           <form id="login" name="login" method="POST" action="{{ url('user/authenticate') }}" onsubmit="return false;">
                              {{ csrf_field() }}
                              <div class="form-group mb-0">
                                 <div class="icon-addon addon-md" style="font-size:13px; font-weight: bold; margin-bottom: 7px; padding: 4px; text-align: center;">                                 

                                 </div>

                                 <div class="icon-addon addon-md">
                                    <input type="text" placeholder="user@domainname.com" class="form-control p-search" id="email" name="email">
                                    <span id="validEmail" style="color:crimson; font-size: 11px; font-weight: bold;"></span>
                                    <label for="email" class="glyphicon glyphicon-envelope" rel="tooltip" title="email" style="float: left;"></label>
                                 </div>
                                 <div class="icon-addon addon-md">
                                    <input type="password" placeholder="Password" class="form-control p-search" id="password" name="password">
                                    <label for="passowrd" class="glyphicon glyphicon-lock" rel="tooltip" title="email" style="float: left;"></label>
                                 </div>
                              </div>
                               <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                  

                               </div>
                               </div>
                              <div class="modal-footer pt-12">
                               <a href="{{ url('user/forgot_password') }}" class="font-blue font-12 pull-left">Forgot Password?</a>
                                 <button type="button" class="btn btn-primary bg-blue border-orange btn-login">Login</button>
                              </div>
                           </form>
                           <script src="{{ asset('js/pagejs/login-validation.js?v=2.8') }}"></script>
                        </div>
                     </ul>
                  </li>
                  @endif
               </ul>
               </ul>
               
            </div>
            <!--/.nav-collapse -->
         </div>
      </nav>
      <!-- menu end-->
          
      <script type="text/javascript">
      function fnSearch() {
         var inputValue = $('#q').val();
         if($.trim(inputValue)=='') {
            alert('Please enter the search text.');
            return false;
         } else 
            return true;
      }

      function fnLink(url) {
         window.location.href = url;
      }
      </script>
