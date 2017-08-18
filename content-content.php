<section class="default-page">
	
		<div class="row">				
				<!-- <div class="home-content"> -->
				hello
					<p>
							<?php while ( have_posts() ) : the_post(); ?>
					
								<?php the_content(); ?>
								
							<?php endwhile; ?>
					</p>
				<!-- </div> -->
		</div>

</section><!-- .default-page -->
