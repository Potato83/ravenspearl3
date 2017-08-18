
<?php if (have_rows('gallery', 'option')): ?>
	<div class="row">
		<div class="col-md-12 main-covers">	
		
		<?php while(have_rows('gallery', 'option')): the_row(); ?>
			<div class="gallery-thumb col-sm-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?><?php $string = get_sub_field('alt'); 
			$string = str_replace(' ', '-', $string);
			echo $string; ?><?php echo '#gallery1'; ?>"><div class="covers darken"><img src="<?php the_sub_field('cover_image'); ?>" alt="cov" width="300" height="300"><div class="discipline"><div class="title-link"><?php the_sub_field('alt'); ?></div></div></div></a></div>
		<?php endwhile; ?>
		
		</div>
	</div><!-- .row -->
<?php endif; ?>

