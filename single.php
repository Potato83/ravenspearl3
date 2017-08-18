<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RavensPearl
 */

get_header(); 
get_template_part('content', 'header');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="padder"></div>

			<div class="container blog-container">
				<div class="row">
					<div class="col-md-12">
						
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
					</div><!-- col-md-8 -->
					
						<?php get_template_part('content', 'sidebar'); ?>
					
				</div><!-- row -->
			</div><!-- blog-container -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="padder"></div>
<?php
get_footer();
