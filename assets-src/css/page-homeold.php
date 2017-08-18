<?php
/*
Template Name: Foo Page
 */
get_header();

$gallery = get_field('gallery');

?>

<section id="home-page">
	<div class="row">
		<div class="col-md-9">
			
			<?php
		    $args = array(  'post_type' => 'product', 
		     								//'meta_key' => '_featured',
		     								'product_cat' => 'ceramic',
		     								'posts_per_page' => -1,
		     								'columns' => '3', 
		     								//'meta_value' => 'yes' 
		     								);
		     
		    $loop = new WP_Query( $args );
		    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <li class="product">    
                            <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>hello">
                                <h3><?php the_title(); ?>HI</h3><br /><span class="price"><?php echo $product->get_price_html(); ?></span><br />
                                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?></a>
                                <span class="motangan"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?></span><br />
                        </li>
                <?php
            /**
             * woocommerce_pagination hook
             *
             * @hooked woocommerce_pagination - 10
             * @hooked woocommerce_catalog_ordering - 20
             */
            do_action( 'woocommerce_pagination' );
        ?>
<?php endwhile; ?>
<?php wp_reset_query(); ?>



		<?php 
			// if($gallery){
			// 	foreach ($gallery as $cover) {
			// 		$cover_image = $cover['cover_image']['url'];
			// 		echo '<div class="gallery-thumb col-sm-3"><a href="#"><div class="covers"><img src="' . $cover_image . '" alt=""><div class="discipline"><div class="title-link">TITLE</div></div></div></a></div>'; 
			// 	}
			// }		
		?>
		</div>
		<div class="col-md-3 sidebar">
		<?php get_template_part('content', 'sidebar'); ?>
		</div>
	</div><!-- .row -->

</section><!-- #home-page -->


<?php get_footer(); ?>