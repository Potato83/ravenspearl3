<header>
	<?php get_template_part('content', 'menu'); ?>
	<div class="container-fluid banner native-shrunk"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a></div> 
</header>
	<div class="container-fluid main-container">
		<div class="site-content">
<script>
$(function() {

		var wideness = $(window).width();
		if(wideness > 1374){
			wideness = "extra wide";
			console.log(wideness);	
			$('html, body').animate({ scrollTop: 1000 }, 400);
    	console.log('content-header-work xtra-wide hello');
    	
		}if(wideness > 767 && wideness < 1375 && wideness != 768 && wideness != 1024){
			wideness = "wide enough";
			console.log(wideness);	
			$('html, body').animate({ scrollTop: 925 }, 400);
    	console.log('content-header-work wide hello');
		}



		if(wideness < 768){
			$('html, body').animate({ scrollTop: 300 }, 400);
    	console.log('content-header-work narrow hello');
    	
		}

		if(wideness == 1024){
			$('html, body').animate({ scrollTop: 800 }, 400);
    	console.log('content-header-work ipad landscape');
		}

		if(wideness == 768){
			$('html, body').animate({ scrollTop: 550 }, 400);
    	console.log('content-header-work ipad portrait');
		}
   
   	
    

	});
</script>
			