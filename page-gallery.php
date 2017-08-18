<?php
/*
Template Name: Gallery Page
 */
get_header();
get_template_part('content', 'header');


?>

<div class="cover-padder"></div>
<?php get_template_part('content', 'covers'); ?>
<p id="gallery1"></p>
<div class="fullwidth">
	<div class="work-title"><?php echo $title =  get_the_title(); ?></div>
</div>
<?php

$args = array(  'post_type' => 'product', 
 								'product_cat' => $title,
 								'posts_per_page' => -1,
 								'columns' => '3', 
 								'orderby' => 'menu_order',
 								'order' => 'ASC' 							
 								);
 
$loop = new WP_Query( $args ); ?>
<div class="container">
<div class="row">
<?php $j = 1; ?>
<?php while ( $loop->have_posts() ) : $loop->the_post();
  if(has_post_thumbnail()){ 
		$string = get_the_title();
		$string = str_replace(' ', '', $string); ?>
		<li class="product col-md-4 testy-row" id="<?php echo $string; ?>">
		<!-- <a href="<?php echo the_post_thumbnail_url(); ?>" data-rel="lightbox" ><div class="thumb darken"> -->
		<!-- link to single product page instead of opening lightbox -->
		<a href="<?php echo the_permalink(); ?>" data-rel="lightbox" ><div class="thumb darken">
	<?php
		echo the_post_thumbnail( 'full', array('class' => 'img-responsive'));
		echo "</div></a>";
	} else{
		echo '';
	} ?>
		
		<div class="info-box"><a href="<?php echo the_permalink(); ?>" class="clearfix">info</a></div>
	</li>
	<?php 

if($j % 3 == 0){
	echo "</div><div class='row'>";
}

?>
<?php $j++; endwhile; ?>
</div><!-- container -->
<?php wp_reset_query(); ?>
<div class="clearfix"></div>
<div class="padder"></div>
<div class="center col-md-12">
	<i class="fa fa-chevron-up to-top"></i>
</div>
<div class="cover-padder downlo"></div>

<?php get_footer(); ?>