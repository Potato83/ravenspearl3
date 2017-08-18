<?php
/*
Template Name: Contact Page 
 */
get_header(); 
get_template_part('content', 'header');
?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		

		<div class="padder"></div>
			<div class="container blog-container contact-container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="center">CONTACT</h1>
						<?php while ( have_posts() ) : the_post(); ?>
					
							<?php the_content(); ?>
							
						<?php endwhile; ?>
						<h1>&nbsp;</h1>
						<h1>&nbsp;</h1>
						<h1>&nbsp;</h1>
						<h1>&nbsp;</h1>
					</div>
				</div><!-- row -->
			</div><!-- blog-container -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="padder"></div>

<?php get_footer(); ?>
