<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RavensPearl
 */


get_template_part('content', 'header'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header center">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container blog-container">
				<div class="row">
					<div class="col-md-12">
		<!-- whoa la (template-parts/content-page.php) -->
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ravenspearl' ),
				'after'  => '</div>',
			) );
		?>
				</div>
			</div><!-- row -->
		</div><!-- blog-container -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			// edit_post_link(
			// 	sprintf(
			// 		esc_html__( 'Edit %s', 'ravenspearl' ),
			// 		the_title( '<span class="screen-reader-text">"', '"</span>', false )
			// 	),
			// 	'<span class="edit-link">',
			// 	'</span>'
			// );
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<div class="padder"></div>