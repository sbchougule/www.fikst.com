<?php if ( have_posts() ) : ?>
<section class="featured-video-module">
	<div class="container">
		<h3 class="fvm-heading">Featured Video</h3>
		<div class="fvm-innerpage-carousel">
	                <div id="slider" class="slides fvm-slider-for popup-gallery">
	                	<?php while ( have_posts() ) : the_post(); ?>
				          		<div><a href="<?php echo get_field('post_video_link'); ?>" class="popup-youtube"><?php 
						$image = get_field('post_video_thumbnail');
						if( !empty( $image ) ): ?><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>"><?php endif; ?><span class="fvm-title"><?php echo get_field('video_name'); ?></span></a></div>
						<?php endwhile; ?>
			        </div>
			        <div id="carousel" class="slides fvm-slider-nav">
			        	<?php while ( have_posts() ) : the_post(); ?>
				       
				          		<div><?php 
						$image = get_field('post_video_thumbnail');
						if( !empty( $image ) ): ?><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>"><?php endif; ?></div>
					  	<?php endwhile; ?>
			        </div>
		        </div>
	</div>
</section>
<?php endif; ?>