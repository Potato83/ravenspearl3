<header>
	<?php get_template_part('content', 'menu'); ?>
	<div class="container-fluid banner"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
		<a href="#disciplines" rel='m_PageScroll2id'>
			<div id="scroll-down">
		    <i class="fa fa-angle-down"></i>
		  </div>
	  </a>
	</div> 
	  
</header>
	<div id="disciplines"></div>
	<div class="container-fluid main-container">
		<div class="site-content">
			
<script> 






var hitherto = '<?php 


$ref=@$_SERVER[HTTP_REFERER];
	if (preg_match("/work/", $ref)) {
    $referer = "work";
    echo $referer;
	} else if (preg_match("/ravenspearl/", $ref)){
		$referer = "home";
    echo $referer;
	}else {
		$referer = "elsewhere";
    echo $referer;
	}
?>';	
//console.log(hitherto);
var wideness = $(window).width();
var the_width = wideness;
if(wideness > 767){
	wideness = "wide enough";
	console.log(wideness);	
}


var HereNow = '<?php echo get_page_template_slug( $post_id ); ?>';
var blog = '<?php if ( is_home() || is_single() || is_archive() || is_search() || is_404()  ) {
  echo "blog";
} ?>';
if(HereNow == 'page-gallery.php' || HereNow == 'page-gallerysubcats.php' || HereNow == 'page-subsub.php'){
	HereNow = 'workpage';
}
if(HereNow == 'page-contact.php'){
	HereNow = 'blog';
}
if(blog == 'blog'){
	HereNow = 'blog';
}


if(hitherto == 'elsewhere'){
	$(function() {
		console.log('hitherto == "elsewhere"');
		if(wideness > 768){
			// $('.link-spoof').addClass('noclick');
			console.log('formerly noclick');
		}		
		setTimeout(
		  function() 
		  {
		    $('.banner').addClass('shrunk');
		  }, 25);
   if(wideness == "wide enough"){
   	setTimeout(
		  function() 
		  {
		    // $('html, body').animate({ scrollTop: 520 }, 1000);
		    console.log("this one here buddeh - no longer autoscrolls");
		  }, 3400);
   	setTimeout(
		  function() 
		  {
		    $('.link-spoof').removeClass('noclick');
		  }, 4400);
   }
   
	});

}else if (HereNow == "workpage"){
	$(function() {
    $('.banner').addClass('native-shrunk');
    console.log('HereNow == "workpage"');
	});
}else if (HereNow == "blog"){
	$('.banner').addClass('native-shrunk');
	if(wideness == "wide enough" && the_width != 1024){
		$('html, body').animate({ scrollTop: 975 }, 500); // query screen size?
		console.log('HereNow == "blog"' + the_width);
	}
	if(the_width == 1024){
		$('html, body').animate({ scrollTop: 750 }, 500);
		console.log('HereNow == "blog, iPad"');
	}
  
}else if (hitherto == 'home' || hitherto == 'work'){
	$(function() {
    $('.banner').addClass('native-shrunk');
    if(wideness == "wide enough"){
  	// $('html, body').animate({ scrollTop: 220 }, 500);
  	console.log("formerly short scroll");
  	}    
    console.log('hitherto == "work/home"');
	});
}
console.log(HereNow);
</script>

