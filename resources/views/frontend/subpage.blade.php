@extends('layouts.frontpage')
@section('content')
<section class="innersubmenu mt-60 bg-grey">
         <div id="exTab2">
            <div class="">
               <div class="pull-left pnamecs">
                  <span>{{ getParentName($cms_data->parent) }}</span>
               </div>
                <div class="bg-grey">
               <ul class="nav nav-tabs subpage-nav font-12">
                  <?php 
                  if(@Request::segment(1)!='') {
                    $par = App\Model\backend\Cms_Model::where('slug', @Request::segment(1))->select('parent')->first();
                    $parent = @$par->parent;
                    $subcategory = getSubCategory($parent); 
                  } else {
                    $subcategory = getSubCategory($cms_data->parent); 
                  }
                  ?>
                  <?php 
                     foreach($subcategory as $sc) { 
                        $dat = App\Model\backend\Cms_Model::where('slug', @Request::segment(1))->select('cat_id')->first();
                        $subsub_id = $dat->cat_id;

                        $clink = App\Model\backend\Cms_Model::where('cat_id', @$sc->id)->select('slug')->first();
                        $clink = @$clink->slug;
                        if($clink!='')
                           $curl = url('/'.$clink);
                        else
                           $curl = 'javascript:';
                  ?>
                  <?php if(@$sc->slug!='ict-av-design') { ?>
                  <li <?php if(@$dat->cat_id==$sc->id) { ?>class="active"<?php } ?>>
                     <a href="<?php echo $curl; ?>" class="border-r font-black"><?php echo $sc->name; ?></a>
                  </li>
                  <?php } ?>
                  <?php } ?>
                  </div>

                  <?php 
                     $subsubcat_count = App\Model\backend\Category::where('parent', @$subsub_id)->select('*')->count();
                     if($subsubcat_count>0) {
                  ?>
                  <div class="tab-content font-12">
                     <div class="tab-pane active" id="audio">
                         <div class="row m-0">
                        <ul class="subpage ml-10px">
                           <?php
                           $subsubcat = App\Model\backend\Category::where('parent', @$subsub_id)->select('*')->get();
                           foreach($subsubcat as $ssc) { 
                              $dat = App\Model\backend\Cms_Model::where('slug', @Request::segment(1))->select('cat_id')->first();
                              $subsubsub_id = $dat->cat_id;

                              $cclink = App\Model\backend\Cms_Model::where('cat_id', @$ssc->id)->select('slug')->first();
                              $cclink = @$cclink->slug;
                              if($cclink!='')
                                 $ccurl = url('/'.@Request::segment(1).'/'.$cclink);
                              else
                                 $ccurl = 'javascript:';
                           ?>
                           <li>
                              <i class="fa fa-check pr-5 font-orange"></i><a href="<?php echo $ccurl; ?>">{{ $ssc->name }}</a>
                           </li>
                           <?php } ?>
                        </ul>
                             </div>
                     </div>                     
                  </div>  
                  <?php } ?>   

                  <?php 
                     $ccount =  App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                                   ->where('cms.slug', @Request::segment(2))
                                   ->select('cms.cat_id')
                                   ->count();
                     if($ccount>0) {
                  ?>
                  <div class="tab-content font-12">
                     <div class="tab-pane active border-dotted border-dotted-bottom">
                          <div class="row m-all pb-5px">
                        <ul class="subpageul ml-10px">
                           <?php
                           $cat = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                                   ->where('cms.slug', @Request::segment(2))
                                   ->select('cms.cat_id')
                                   ->first();
                           $cat_id = @$cat->cat_id;
                           $subsubsubcat = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                                   ->where('cms.parent', @$cat_id)
                                   ->select('cms.id', 'categories.name')
                                   ->get();     
                           foreach($subsubsubcat as $sssc) { 
                              $ccclink = App\Model\backend\Cms_Model::where('id', @$sssc->id)->select('slug')->first();
                              $ccclink = @$ccclink->slug;
                              if($ccclink!='')
                                 $cccurl = url('/'.@Request::segment(1).'/'.@Request::segment(2).'/'.@$ccclink);
                              else
                                 $cccurl = 'javascript:';
                           ?>
                           <li>
                              <i class="fa fa-caret-right pr-5 font-orange font-16 v-align-text"></i><a href="<?php echo $cccurl; ?>">{{ $sssc->name }}</a>
                           </li>
                           <?php } ?>
                        </ul>
                         </div>
                     </div>                     
                  </div>  
                  <?php } ?>              
               </ul>               
               <!--
                  <div class="tab-content font-12">
                     
                  </div>
                  -->
            </div>
         </div>
</section>
<!--image -->
<section>
   <div class='subpage-img'></div>
</section>
<!--image -->
<section class="breadcrum">
   <div class="bg-lit">
      <div class="container">
         <div class="row">
            <div class="">
               <a href="{{ url('') }}" style="cursor: pointer;"><i class="fa fa-home p-2-320 p-15 fa-2x font-orange"></i></a>
               <span>/ &nbsp;</span>
               <span><a href="{{ url('') }}">Home</a> &nbsp;</span>
               <span>/ &nbsp;</span>
               <?php 
                  if(@Request::segment(1)!='') {
                    $par = App\Model\backend\Cms_Model::where('slug', @Request::segment(1))->select('parent')->first();
                    $parent = @$par->parent;
                    $scat = getParentName($parent);
                    $slink = categorySlugById($parent);
                  } else {
                    $scat = getParentName($cms_data->parent);
                    $slink = categorySlugById($cms_data->parent);
                  }
               ?>
               <span><a href="{{ url('category') }}/{{ $slink }}">{{ $scat }}</a> &nbsp;</span>
              
               <?php 
                  if(@Request::segment(2)!='') {
                    $par = App\Model\backend\Cms_Model::where('slug', @Request::segment(2))->select('parent')->first();
                    $parent = @$par->parent;
                    $cat = App\Model\backend\Category::where('id', $parent)->select('name')->first();
                    $x = $cat->name;
                  } else {
                    $x = $cms_data->name;
                  }
               ?>

               <?php if(@Request::segment(1)!='' && @Request::segment(2)!='') { ?>
               <span>/ &nbsp;</span>
               <span><a href="{{ url('') }}/{{ @Request::segment(1) }}">{{ $x }}</a> &nbsp;</span>
               <?php } ?>

               <?php if(@Request::segment(1)!='' && @Request::segment(2)!='' && @Request::segment(3)!='') { ?>
               <span>/ &nbsp;</span>
               <?php $cms = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.slug', @Request::segment(2))
                    ->select('categories.name')
                    ->first()
               ?>
               <span><a href="{{ url('') }}/{{ @Request::segment(1) }}/{{ @Request::segment(2) }}">{{ @$cms->name }}</a></span>
               <?php } ?>

               <?php /*if(@Request::segment(3)!='') { ?>
               <span>/ &nbsp;</span>
               <?php $cms = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.slug', @Request::segment(3))
                    ->select('categories.name')
                    ->first()
               ?>
               <span><a href="">{{ @$cms->name }}</a></span>
               <?php }*/ ?>

            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <?php $xid = 0;
      if(@Request::segment(3)!='') 
         $xid = @Request::segment(3);
      else
         $xid = @Request::segment(2);
      $cdat = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                    ->where('cms.slug', @$xid)
                    ->select('categories.name', 'cms.content')
                    ->first();
      if(@$cdat->name!='') {
   ?>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue">
               <strong>{{ $cdat->name }}</strong>
            </h3>
            <div class="contentofpage">
               {!! $cdat->content !!}
            </div>
         </div>
      </div>
   <?php } else { ?>      
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue">
               <strong>{{ $cms_data->name }}</strong>
            </h3>
            @if($cms_data->slug=='partner-portal') 
            <div class="col-xs-12">
               {!! $cms_data->content !!}
            </div>
            @else
            <div class="col-xs-12">
               {!! $cms_data->content !!}
            </div>
            @endif
         </div>
      </div>

      @if($cms_data->slug=='partner-portal')     
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 center-block">
      <div class="border p-5">
      <h4 class="font-green text-center">
        <strong>Partner Login</strong>
      </h4>
        <form id="part_login" name="part_login" method="POST" action="{{ url('partner/authenticate') }}" onsubmit="return false;">
          {{ csrf_field() }}
          <div class="form-group mb-0">
             <div class="icon-addon addon-md" style="font-size:13px; font-weight: bold; margin-bottom: 7px; padding: 4px; text-align: center;">
             </div>
             <div class="icon-addon addon-md">
             <i class="fa fa-envelope inside" aria-hidden="true"></i>
                <input type="text" placeholder="Email" class="form-control inside-input" id="partemail" name="email">
                <span id="partvalidEmail" style="color:crimson; font-size: 11px; font-weight: bold;"></span>
             </div><br/>
             <div class="icon-addon addon-md">
             <i class="fa fa-lock inside font-19" aria-hidden="true"></i>
                <input type="password" placeholder="Password" class="form-control inside-input" id="password" name="password">
             </div>
          </div>
          <div class="modal-footer pt-12 border-none">
<!--           <a href="{{ url('user/forgot_password') }}" class="font-blue font-12 pull-left">Forgot Password?</a>-->
             <button type="button" class="btn btn-primary bg-blue border-orange btn-partner-login">Login</button>
               <div class="pt-12">
            <div class="border-top pt-12">
              <p class="pull-left forgotpwd-partner">
                <a href="{{ url('user/forgot_password') }}" class="font-blue font-12 pull-left">Forgot Password?</a>
              </p>
              <p class="pull-right">
                <a href="{{ url('partners') }}" class="font-blue"> <strong>Sign Up as partner</strong></a>
              </p>
            </div>
            </div>
          </div>
          
       </form>
       <script src="{{ asset('js/pagejs/partner-login-validation.js?v=1.7') }}"></script>
      </div>
      </div>
      <!-- <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8 mt-5perc-320px">
      <h4 class="font-green text-center">
      <a href="http://systimanx.xyz/atnet_web/public/subpage/partnerships" class="btn btn-primary bg-blue border-orange btn-partner-login m-50 p-13">
      <i class="fa fa-sign-in font-18 pr-12" aria-hidden="true"></i> 
        <strong> Sign Up here</strong>
        </a>
      </h4>
      </div> -->
        </div>
      @endif
   <?php } ?>
</div>
@endsection