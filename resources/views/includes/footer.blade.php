<!--footer part-->
<footer class="">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-grey mt-5">
      <div class="container-fluid">
         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 border-r border-r-320">
            <?php 
              $cms_link = App\Model\backend\Cms_Model::where('cat_id', '9999')->get();    
              $res_link = '';
              foreach($cms_link as $c) {
                  if($c->columns=='Recent Feed') {
                    $recent_feed = $c->columns;
                    $feed_content = $c->content;
                  }
                  if($c->columns=='Resources') {
                    $resources = $c->columns;
                  }
                  if($c->columns=='About Us') {
                    $about_us = $c->columns;
                  }
                  if($c->columns=='Case Studies') {
                    $case_stud = $c->columns;
                  }
                  if($c->columns=='Connect') {
                    $connt = $c->columns;
                  }
              } 
            ?>
            <h4 class="font-blue"><strong>{{ @$recent_feed }}</strong></h4>
            {!! @$feed_content !!}
            <?php $s = setting(); ?>
            <ul class="social-icons pl-0px">
               <li>
                  <a href="{{ $s->facebook_link }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-facebook">
                  <i class="fa fa-facebook"></i>
                  </a>
               </li>
               <li>
                  <a href="{{ $s->twitter_link }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-twitter">
                  <i class="fa fa-twitter"></i>
                  </a>
               </li>
               <li>
                  <a href="{{ $s->linked_in }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-linkedin"><i class="fa fa-linkedin"></i></a>
               </li>
               <li>
                  <a href="{{ $s->google_plus }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-google-plus"><i class="fa fa-google-plus"></i></a>
               </li>
               <li>
                  <a href="{{ $s->pinterest }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-pinterest"><i class="fa fa-pinterest"></i></a>
               </li>
               <li class="hidden-sm">
                  <a href="{{ $s->youtube_link }}" target="_blank" class="btn azm-social azm-size-48 azm-r-square azm-youtube"><i class="fa fa-youtube"></i></a>
               </li>
            </ul>
         </div>
         <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <div class="row">
               <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                  <h4 class="font-blue"><strong>{{ @$resources }}</strong></h4>
                  <?php 
                    $link = DB::table('cms')->where('columns', @$resources)->orderBy('position', 'asc')->get();
                    foreach($link as $r) {
                      $title = seoUrl($r->footer_title);                      
                  ?>
                  <p><a href="{{ url($title) }}" class="font-black">{{ $r->footer_title }}</a></p>
                  <?php } ?>                 
               </div>               
               <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3  col-half-offset">
                  <h4 class="font-blue"><strong>{{ @$case_stud }}</strong></h4>
                  <?php 
                    $link = DB::table('cms')->where('columns', @$case_stud)->orderBy('position', 'asc')->get();
                    foreach($link as $r) {
                      $title = seoUrl($r->footer_title);
                  ?>
                  <p><a href="{{ url($title) }}" class="font-black">{{ $r->footer_title }}</a></p>
                  <?php } ?> 
               </div>
               <div class="col-xs-6 col-sm-3 col-md-4 col-lg-3  col-half-offset">
                  <h4 class="font-blue"><strong>{{ @$about_us }}</strong></h4>
                  <?php 
                    $link = DB::table('cms')->where('columns', @$about_us)->orderBy('position', 'asc')->orderBy('position', 'asc')->get();
                    foreach($link as $r) {
                      $title = seoUrl($r->footer_title);
                  ?>
                  <p><a href="{{ url($title) }}" class="font-black">{{ $r->footer_title }}</a></p>
                  <?php } ?>                      
               </div>
               <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3  col-half-offset">
                  <h4 class="font-blue"><strong>{{ @$connt }}</strong></h4>
                  <p><a href="http://atnetindia.net/partners" class="font-black">Partner Registration</a></p>
                  <?php 
                    $link = DB::table('cms')->where('columns', @$connt)->orderBy('position', 'asc')->orderBy('position', 'asc')->get();
                    foreach($link as $r) {
                        $title = seoUrl($r->footer_title);
                        if($r->footer_title == 'Partner Portal')
                            $link = url('partner-portal');
                        if($r->footer_title == 'Visitor/Guest Registration')
                            $link = url('visitors');
                        else
                            $link = url($title);
                  ?>
                  <p><a href="{{ $link }}" class="font-black">{{ $r->footer_title }}</a></p>
                  <?php } ?>
               </div>
            </div>
            <div class="row">
               <p class="text-right">© <?php echo date('Y'); ?> All rights reserved.</a></p>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>
<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
   $("#myModal").modal({
          show: false,
          backdrop: 'static'
      }); 
      $('#myCarousel .carousel').carousel({
  interval: 1200
});
(function(){
  $('.carousel1 .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      //itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      //if (!itemToClone.length) {
        //itemToClone = $(this).siblings(':first');
      //}

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child')
        //.addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
/*$('.carousel1 .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  if (next.next().length>0) {
 
      next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
      
  }
  else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
     
  }
});*/
</script>
<script>
   jQuery(function($) {
     $('.dropdown').hover(function() {
       $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
     }, function() {
       $(this).find('.dropdown-menu').first().stop(true, true).delay(400).slideUp();
     });
   });
        
</script>
<script type='text/javascript'>
   // When your page loads
   $(function(){
      // When the toggle areas in your navbar are clicked, toggle them
      $("#search-button, #search-icon").click(function(e){
          e.preventDefault();
          $("#search-button, #search-form").toggle();
      });
       });
        $('.search-box .icon-magnifier').on('click', function (e) {
        $('.search-bar').toggleClass("search-bar-open");
        $('.search-icon').toggleClass("search-icon-open");
        e.preventDefault();
   
    });
</script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<script src="{{ asset('assets/js/lightslider.js') }}"></script> 
<script>
   $(document).ready(function () {
       $("#content-slider").lightSlider({
           loop: true,
           keyPress: true
       });
       $('#image-gallery').lightSlider({
           gallery: true,
           item: 1,
           thumbItem: 4,
           slideMargin: 0,
           speed: 500,
           auto: true,
           loop: true,
           onSliderLoad: function () {
               $('#image-gallery').removeClass('cS-hidden');
           }
       });
       $('.fancybox').fancybox();
   });
   
   
   $(function(){
   $('a[title]').tooltip();
   });
   
</script>
<!-- sub page -->
<script>
   $(document).ready(function(){   
      $(".filter-button").click(function(){
          var value = $(this).attr('data-filter');        
          if(value == "all")
          {   
              $('.filter').show('1000');
          }
          else
          {   
              $(".filter").not('.'+value).hide('3000');
              $('.filter').filter('.'+value).show('3000');            
          }
      });   
   });
</script>

<!--  <script
  src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script>           
        $('.closer').click(function(){
         $(this).parent().hide(1000);
        });
      </script>
</body>
</html>
