<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RavensPearl
 */

get_header(); 
get_template_part('content', 'header');
?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="padder"></div>
		<?php
		 if ( have_posts() ) :

		 	if ( is_home() && ! is_front_page() ) : ?>
				<header>
		 			<h1 class="page-title screen-reader-text center"><?php single_post_title(); ?></h1>

		 		</header>
				
		 	<?php
		 	endif;
		 	?>

		
			
			<div class="container ">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 blog-container index-container">
						<div class="row">

		<?php	/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_format() ); ?>
				
				<div class="single-preview col-md-4">
					<div class="preview-inner"><a href="<?php the_permalink(); ?>">
				<h2 class="center"><?php the_title(); ?></h2>	
				<?php  if(has_post_thumbnail()){ ?>
				
				<?php
					echo the_post_thumbnail( 'full', array( 'class'  => 'img-responsive' ));
					echo '<div class="padder"></div>';
				} else{
					echo '';
				}

				the_excerpt();
				echo '<hr>';
				echo '</a></div></div><!-- single-preview -->';
			endwhile; ?>
			

			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
						</div>
					</div><!-- col-md-10 -->
				</div><!-- row -->
			</div><!-- blog-container -->
			
			<?php get_template_part('content', 'sidebar'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="padder"></div>

<?php get_footer(); ?>
