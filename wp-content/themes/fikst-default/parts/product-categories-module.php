<section class="more-capcbilities">
	<div class="container <?php echo !empty(get_field('container_padding','option')) ? get_field('container_padding','option') : 'py-5' ?>">
		<?php if (get_field('mc_heading','option')): ?>
			<h2 class="cbssm-title"><?php echo get_field('mc_heading','option'); ?></h2>
		<?php endif ?>

	    <div class="cbs-slider">
		<?php if (have_rows('cbss_add_buckets','option')): ?>
			<?php while (have_rows('cbss_add_buckets','option')): the_row(); ?>
	      	<div>
		      	<?php 
				$link = get_sub_field('cbss_bucket_link','option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'] ? $link['title'] : 'Subheader';
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">	<?php 
						$image1 = get_sub_field('cbss_bucket_image','option');
						if( !empty( $image1 ) ): ?>
						   <img class="dem-img" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" title="<?php echo esc_attr($image1['alt']); ?>" />
						<?php endif; ?>
						<?php if (get_sub_field('cbss_bucket_title','option')): ?><h3><?php echo get_sub_field('cbss_bucket_title','option'); ?></h3><?php endif ?>
					</a>
				<?php endif ?>							
			</div>
	      	<?php endwhile; ?>
		<?php endif ?>
	    </div>
	</div>
</section>