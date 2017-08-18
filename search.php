<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RavensPearl
 */

get_header(); 
get_template_part('content', 'header'); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header center">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ravenspearl' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<div class="container ">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 blog-container index-container">
						<!-- <div class="row"> -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			//the_posts_navigation();
			?>

					</div>
					
						
					

			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		
					<!-- </div> -->
					</div><!-- col-md-10 -->
					<?php get_template_part('content', 'sidebar'); ?>
				</div><!-- row -->
			</div><!-- blog-container -->
			
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="padder"></div>

<?php

get_footer();
