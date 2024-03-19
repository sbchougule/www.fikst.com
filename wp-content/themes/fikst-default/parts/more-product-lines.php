<section class="more-product-lines">
	<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		<?php if (get_field('mpl_heading')): ?>
			<h2 class="cbssm-title"><?php echo get_field('mpl_heading'); ?></h2>
		<?php endif ?>

	    <div class="mpl-slider">
		<?php if (have_rows('mpl_buckets')): ?>
			<?php while (have_rows('mpl_buckets')): the_row(); ?>
	      	<div class="mpl-div">
		      	<?php 
				$link = get_sub_field('mpl_link');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'] ? $link['title'] : 'Subheader';
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">	<?php 
						$image1 = get_sub_field('mpl_image');
						if( !empty( $image1 ) ): ?>
						   <img class="mpl-img" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" title="<?php echo esc_attr($image1['alt']); ?>" />
						<?php endif; ?>
						<?php if (get_sub_field('mpl_title')): ?><h3><?php echo get_sub_field('mpl_title'); ?></h3><?php endif ?>
					</a>
				<?php endif ?>							
			</div>
	      	<?php endwhile; ?>
		<?php endif ?>
	    </div>
	</div>
</section>