@extends('layouts.frontpage')
@section('content')
<section class="innersubmenu mt-60 bg-grey">
   <div class="">
      <div class="">
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
               <span>Search</span>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         
            <div class="front">

               <div>&nbsp;</div>

               <div style="font-size: 16px;">Search for&nbsp; "<?php echo $_GET['q']; ?>"</div>

               <div id="tipue_search_content">
                  <div style="font-size: 12px;"><?php echo count($search_data); ?> results</div>

                  <?php $i=1; ?>
                  @foreach($search_data as $s)
                     @if($s->name!='')
                        <div class="searchpage">
                           <a class="searchpage-h3" href="{{ url('') }}/{{ $s->slug }}">  
                              <h3>{{ $i }}. {{ $s->name }}</h3>
                           </a>
                           <span class="searchpage-a"><a href="{{ url('') }}/{{ $s->slug }}">{{ url('') }}/{{ $s->slug }}</a></span>
                        </div>
                        <p class="searchpage-para">{!! strip_tags(str_limit($s->content, $limit = 150, $end = '...')) !!}</p>
                     @else
                        <div class="searchpage">
                           <a class="searchpage-h3" href="{{ url('/'.urlencode($s->footer_title)) }}"> 
                              <h3>{{ $i }}. {{ $s->footer_title }}</h3>
                           </a>
                           <span class="searchpage-a"><a href="{{ url('/'.urlencode($s->footer_title)) }}">{{ url('/'.urlencode($s->footer_title)) }}</a></span>
                        </div>
                        <p class="searchpage-para">{!! strip_tags(str_limit($s->content, $limit = 150, $end = '...')) !!} </p>
                     @endif
                  <?php $i++; ?>
                  @endforeach

               </div>

            </div>

      </div>            
   </div>
</div>
</div>
@endsection