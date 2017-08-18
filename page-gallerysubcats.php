<?php
/*
Template Name: Gallery With Subcats
 */
get_header();
get_template_part('content', 'header');


?>

<div class="cover-padder"></div>
<?php get_template_part('content', 'covers'); ?>

<div class="fullwidth">
	<div class="work-title-sub"><?php echo $title =  get_the_title(); ?></div>
</div>
<div class="container">
<?php $subcats = woocommerce_subcats_from_parentcat_by_NAME($title);

	// for ($i=count($subcats)-1; $i >= 0 ; $i--){
	for ($i=0; $i < count($subcats) ; $i++){
		
			$args = array(  'post_type' => 'product', 
 								'product_cat' => $subcats[$i],
 								'posts_per_page' => -1,
 								'columns' => '3', 
 								'orderby' => 'menu_order',
 								'order' => 'ASC' 							
 								);
	
$loop = new WP_Query( $args ); ?>

<div class="row">
	<p id="gallery<?php echo $i+1; ?>" class="anchor-p"></p>
	<p id="<?php echo $subcats[$i]; ?>" class="anchor-p"></p>
	<div class="work-sub-title"><?php echo $subcats[$i]; ?></div>
	
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

<?php $j++; endwhile;
	
	$num = $loop->post_count;
	if($num % 3 === 0){
		echo '</div>';
	} 
	if($num % 3 === 1){
		echo '<li class=" col-md-4 testy-row-blank"></li>';
		echo '<li class=" col-md-4 testy-row-blank"></li>';
		echo '</div>';
		echo '<div class="clearfix"></div>';

	}
	if($num % 3 === 2){
		echo '<li class=" col-md-4 testy-row-blank"></li>';
		echo '</div>';
		echo '<div class="clearfix"></div>';
	}

 
}


?>


<?php


wp_reset_query(); ?>
<div class="clearfix"></div>
<div class="padder"></div>
<div class="center col-md-12">
	<i class="fa fa-chevron-up to-top"></i>
</div>
<div class="cover-padder downlo"></div>

<?php get_footer(); ?>