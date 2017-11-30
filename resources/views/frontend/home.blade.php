@extends('layouts.frontpage')

@section('content')

@if(count($banner)>0)
<!-- banner part -->
<section>
   <div class="banner" id="startchange">
      <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4000">
         <ol class="carousel-indicators">
            <?php $dot = 0; ?>            
               @foreach($banner as $b)
               <li data-target="#myCarousel" data-slide-to="<?php echo $dot ?>" <?php if($dot==0) { ?>class="active"<?php } ?>></li>
               <?php $dot++; ?>
               @endforeach
         </ol> 
         <div class="carousel-inner" id="">
            <?php $i=1; ?>
            @foreach($banner as $b)
            <div class="item <?php if($i==1) { ?>active<?php } ?> image">
               <img src="{{ asset('uploads/banner_attachment') }}/{{ $b->id }}/{{ $b->image }}" class="w-100p">
               <div class="container">
                  <div class="carousel-caption p-20px">
                     <h1 class="text-center font-white mb-5px mt-0">{{ $b->name }}</h1>
                     <p class="text-center font-white">{{ $b->description }}</p>
                  </div>
               </div>
            </div><?php $i++; ?>
            @endforeach
         </div>
      </div>
   </div>
</section>
@endif


<?php
$exp_count = DB::table('categories')->where('parent', $exp->id)->count();
if($exp_count>0) {
?>
<section class="expertise bg-expertise pb-3">
   <div class="container-fluid">
   <div class="row">
      <h3 class="font-blue text-center mb-2">{{ $exp->name }}</h3>
      <div id="expertise">
         <ul class="expertise">
         <?php 
            $expertise = DB::select('SELECT a.name, b.short_desc, b.id, b.slug, b.image FROM categories a, cms b where a.id = b.cat_id and a.parent = '.$exp->id.'');  
         ?>
            @foreach($expertise as $e)
            <li class="border-r">
               <img src="{{ asset('uploads/cms_icon') }}/{{ $e->id }}/{{ $e->image }}" class="img-responsive m-auto mb-10p" alt="">
               <h4 class="text-center mb-5px m-0"><strong>{{ $e->name }}</strong></h4>
               <p class="text-center line-h-22 of-hidden mh-105 font-12 text-center-xs">
                  {{ $e->short_desc }}
               </p>
               <a href="{{ url('') }}/{{ $e->slug }}" class="font-grey read-arrow-expertise pull-right"><i class="fa fa-angle-right"></i></a>
            </li>
            @endforeach
         </ul>
      </div>
   </div>
</section>
<?php } ?>


<section class="whatwedo">
   <div class="mt-2 mb-5">
      <div class="container-fluid">
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue text-center mb-3per">{{ $whatwedo->name }}</h3>

            <?php 
               $dist_count = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                        ->where('categories.parent', $whatwedo->id)
                        ->where('categories.slug', 'Distribution')
                        ->select('categories.name', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                        ->count(); 
               if($dist_count>0) {
            ?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2-320 p-3">
               <?php 
                     $whatdo = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                        ->where('categories.parent', $whatwedo->id)
                        ->where('categories.slug', 'Distribution')
                        ->select('categories.name', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                        ->first(); 
               ?>              
               <div class="border software p-12 col-lg-12 bg-pink">
                  <h4 class="font-white"><strong>{{ $whatdo->name }} </strong></h4>
                  <img src="{{ asset('uploads/cms_icon/') }}/{{ $whatdo->id }}/{{ $whatdo->image }}" class="img-responsive pull-left pr-18px">
                  <p class="mt-6 font-white line-h-22 m-0-768px of-hidden h-395 font-12">
                     {{ $whatdo->short_desc }}
                  </p>
                  <p class="text-right mt-29">
                     <a href="{{ url('') }}/{{ $whatdo->slug }}" class="font-grey read-arrow-white"><i class="fa fa-angle-right"></i></a>
                  </p>
               </div>              
            </div>
            <?php } ?>
             
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
               <div class="row pb-15">
                  <?php 
                  $ict_count = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                                 ->where('categories.parent', $whatwedo->id)
                                 ->where('categories.slug', 'ict-av-design')
                                 ->select('categories.name', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                                 ->count();
                  if($ict_count>0) {
                  ?>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-3">
                        <?php 
                              $whatdo = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                                 ->where('categories.parent', $whatwedo->id)
                                 ->where('categories.slug', 'ict-av-design')
                                 ->select('categories.name', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                                 ->first(); 
                        ?>
                        <div class="border software p-12 col-lg-12 col-sm-12 col-md-12 col-xs-12 bg-green">
                           
                              <h4 class="font-white"><strong>{{ $whatdo->name }}</strong></h4>
                              <img src="{{ asset('uploads/cms_icon/') }}/{{ $whatdo->id }}/{{ $whatdo->image }}" class="img-responsive pull-left pr-18px">      
                                    <p class="font-white line-h-22 m-0 of-hidden h-150px font-12">
                                 {{ $whatdo->short_desc }}
                              </p>
                              <p class="text-right m-0">
                                 <a href="{{ url('') }}/{{ $whatdo->slug }}" class="font-grey read-arrow-white"><i class="fa fa-angle-right"></i></a>
                              </p>                           
                        </div>
                  </div>
                  <?php } ?>

                  <?php 
                  $tech_count = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                     ->where('categories.parent', $whatwedo->id)
                     ->whereIn('categories.slug', array('technical-services', 'software', 'video-as-a-service'))
                     ->select('categories.name', 'categories.slug', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                     ->count();  
                  if($tech_count>0) {
                     $backcolor = '';
                     $whatdo = App\Model\backend\Category::join('cms', 'cms.cat_id', '=', 'categories.id')
                        ->where('categories.parent', $whatwedo->id)
                        ->whereIn('categories.slug', array('technical-services', 'software', 'video-as-a-service'))
                        ->select('categories.name', 'categories.slug', 'cms.short_desc', 'cms.id', 'cms.slug', 'cms.image')
                        ->get();  
                  ?>
                  @foreach($whatdo as $w) 
                     <?php 
                        if($w->slug=='technical-services')
                           $backcolor = 'bg-yellow';                        
                        if($w->slug=='software')
                           $backcolor = 'bg-sblue';
                        if($w->slug=='video-as-a-service')
                           $backcolor = 'bg-cgreen';
                     ?>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-2-320 p-3">
                     <div class="border software p-12 {{ $backcolor }}">
                        <h4 class="font-white"><strong>{{ $w->name }} </strong></h4>
                         <p class="mt-5px font-white line-h-22 of-hidden h-240 font-12">
                        <img src="{{ asset('uploads/cms_icon/') }}/{{ $w->id }}/{{ $w->image }}" class="img-responsive pull-left pr-18px">                             
                        <span>
                           {{ $w->short_desc }}
                        </span>
                         </p>
                        <p class="text-right mb-2">
                           <a href="{{ url('') }}/{{ $w->slug }}" class="font-grey read-arrow-white"><i class="fa fa-angle-right"></i></a>
                        </p>
                     </div>
                  </div>
                  @endforeach
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>

<?php 
$indust_count = DB::table('categories')->where('parent', $indust->id)->count();
if($indust_count>0) {
?>
<!-- Industries-->
<section class="Verticals bg-grey">
   <div class="mt-5 mb-5">
      <div class="container-fluid">         
         <div class="row">
            <h3 class="font-blue text-center">{{ $indust->name }}</h3>
            <ul class="work-withUs-points clear">
            <?php                
               $indust = DB::select('SELECT a.name, b.short_desc, b.id, b.slug, b.image FROM categories a, cms b where a.id = b.cat_id and a.parent = '.$indust->id.'');  
            ?>
               @foreach($indust as $i)
               <li class="clear h-auto">
                  <div class="workWith-img"><img src="{{ asset('uploads/cms_icon/') }}/{{ $i->id }}/{{ $i->image }}" alt=""></div>
                  <div class="workWith-txt">
                     <h6><strong>{{ $i->name }}</strong></h6>
                     <p>{{ $i->short_desc }}</p>
                     <span>
                     <a href="{{ url('') }}/{{ $i->slug }}" class="font-grey read-arrow pull-right"><i class="fa fa-angle-right"></i></a>
                     </span>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</section>
<?php } ?>


<?php 
$partner_count = DB::table('categories')->where('parent', $partner->id)->count();
if($partner_count>0) {
?>
<section class="bg-white partner">
   <div class="container-fluid">
      <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="font-blue text-center mb-2">{{ $partner->name }} </h3>
              <?php $partner = DB::select('SELECT a.name, b.short_desc, b.id, b.slug, b.image FROM categories a, cms b where a.id = b.cat_id and a.parent = '.$partner->id.'');  ?>
               @foreach($partner as $p)
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mb-responsive">
                 <div class="bg-grey p-40">
                    <div class="d-inline-table">
                       <img src="{{ asset('uploads/cms_icon/') }}/{{ $p->id }}/{{ $p->image }}" width="42" height="32" class="pull-left pr-10px">
                       <span class="p-11-18 v-middle"><strong>{{ $p->name }} </strong></span>
                    </div>
                    <div class="d-inline-table">                     
                        <p class="pt-10px of-hidden mh-210 line-h-22 m-0">{{ $p->short_desc }} </p>
                        <span>
                        <a href="{{ url('') }}/{{ $p->slug }}" class="font-grey read-arrow pull-right"><i class="fa fa-angle-right"></i></a>
                        </span>
                     </div>
                 </div>
              </div>
              @endforeach
            </div>
      </div>
   </div>
</section>
<?php } ?>


<section class="testimonial">
<div class="mt-5 mb-5">
<div class="container-fluid">
<div class="row">
<h3 class="font-blue text-center mb-2">Testimonial & Our Clients </h3>
<div class="col-lg-12">

<?php if(count($testi)>0) { ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 border mb-2-320">
   <div class="carousel slide" data-ride="carousel" id="quote-carousel"  data-interval="5000">
      <!-- Bottom Carousel Indicators -->
      <ol class="carousel-indicators">
         <?php $dot = 0; ?>
         @foreach($testi as $t)
         <li data-target="#quote-carousel" data-slide-to="<?php echo $dot; ?>" <?php if($dot==0) { ?>class="active"<?php } ?>></li>
         <?php $dot++; ?>
         @endforeach
      </ol>
      <div class="carousel-inner">
         <?php $j = 1; ?>
         @foreach($testi as $t)
         <div class="item of-hidden h-178 <?php if($j==1) { ?>active<?php } ?>">
            <div class="quotation-mark">
               <div class="pt-8">
                  <p class="font-16 font-14-320">
                     {{ $t->description }}
                  </p>
                  <small>{{ $t->name }} | <span class="font-blue">{{ $t->designation }}</span></small>
               </div>
            </div>
         </div><?php $j++; ?>
         @endforeach
      </div>
   </div>
</div>
<?php } ?>

<?php if(count($client)>0) { ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 pl-6 pr-3">
   <div id="myCarousel5" class="fade-carousel carousel-fade carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="item active">
            <ul class="fff">
               <?php $k = 1; ?>
               @foreach($client as $c)
                  <?php if($k>=1 && $k<=3) { ?>
                  <li class="col-sm-4 pr-0 pl-5 pb-4px">
                     <div class="fff">
                        <div class="thumbnail">
                           <a href="#"><img src="{{ asset('uploads/clients') }}/{{ $c->id }}/{{ $c->image }}" alt=""></a>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <?php if($k>=4 && $k<=6) { ?>
                  <li class="col-sm-4 pr-0 pl-5 pb-4px">
                     <div class="fff">
                        <div class="thumbnail">
                           <a href="#"><img src="{{ asset('uploads/clients') }}/{{ $c->id }}/{{ $c->image }}" alt=""></a>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <?php $k++; ?>
               @endforeach
            </ul>
         </div>
         <?php if(count($client)>=7) { ?>
         <div class="item">
            <ul class="fff">
               <?php $k = 1; ?>
               @foreach($client as $c)
                  <?php if($k>=7 && $k<=9) { ?>
                  <li class="col-sm-4 pr-0 pl-5 pb-4px">
                     <div class="fff">
                        <div class="thumbnail">
                           <a href="#"><img src="{{ asset('uploads/clients') }}/{{ $c->id }}/{{ $c->image }}" alt=""></a>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <?php if($k>=10 && $k<=13) { ?>
                  <li class="col-sm-4 pr-0 pl-5 pb-4px">
                     <div class="fff">
                        <div class="thumbnail">
                           <a href="#"><img src="{{ asset('uploads/clients') }}/{{ $c->id }}/{{ $c->image }}" alt=""></a>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <?php $k++; ?>
               @endforeach
            </ul>
         </div>
         <?php } ?>
      </div>
   </div>
   <!-- /.control-box -->   
</div>
<?php } ?>
<!-- /#myCarousel -->

<!-- sticky start-->
<!--
 <div class="bodypanel">        
         {{--<div class="ads ad1 ads-left" id="ad1">
            <span class="closer">
               <img src="{{ asset('assets/images/close.png') }}"/>
            </span>
            <a href="http://www.didacindia.com" target="_blank">
               <img src="{{ asset('assets/images/sticky1_re.png') }}" class="img-responsive"/> 
            </a>       
         </div>--}}
         <div class="ads ad2">
             <span class="closer">
                  <img src="{{ asset('assets/images/close.png') }}"/>
             </span>
             <a href="http://www.infocomm-india.com"  target="_blank"><img src="{{ asset('assets/images/sticky2.png') }}" class="img-responsive"/>
             </a>
         </div>
      </div>
-->
<!-- sticky end -->
</section>
@endsection    
    