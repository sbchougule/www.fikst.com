<section class="our-leadership">
	<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		<?php if (get_field('os_heading')): ?>
			<h2 class="os-heading"><?php echo get_field('os_heading'); ?></h2>
		<?php endif ?>


	    <div class="row os-buckets">
		<?php if (have_rows('os_buckets')): ?>
			<?php while (have_rows('os_buckets')): the_row(); ?>
	      	<div class="col-md-6 col-lg-3 os-item">

				<?php 
				$link = get_sub_field('os_link');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				    	<?php if(get_sub_field('os_image')) : ?>
						<?php $product_picture = get_sub_field('os_image'); ?>
						   <img src="<?php echo $product_picture['url']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>">
						<?php endif; ?>

						<div class="os-overlay">
							<div class="os-verlay-wrap">
								<?php if (get_sub_field('os_name')): ?>
									<h4 class="os-name"><?php echo get_sub_field('os_name'); ?></h4>
								<?php endif ?>

								<?php if (get_sub_field('os_role')): ?>
									<div class="os-cont"><?php echo get_sub_field('os_role'); ?></div>
								<?php endif ?>
						    	<span><?php echo esc_html( $link_title ); ?></span>
							</div>
						</div>
				    		
				    </a>
				<?php endif; ?>
							
			</div>
	      	<?php endwhile; ?>
		<?php endif ?>
	    </div>
	</div>
</section>