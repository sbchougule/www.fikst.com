<section class="our-leadership">
	<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		<?php if (get_field('olt_heading')): ?>
			<h2 class="olm-heading"><?php echo get_field('olt_heading'); ?></h2>
		<?php endif ?>

		<?php if (get_field('olt_description')): ?>
			<div class="olm-desc"><?php echo get_field('olt_description'); ?></div>
		<?php endif ?>

	    <div class="row olm-buckets">
		<?php if (have_rows('olt_buckets')): ?>
			<?php while (have_rows('olt_buckets')): the_row(); ?>
	      	<div class="col-md-6 col-lg-3 olm-item">
	      		<?php if(get_sub_field('olt_image')) : ?>
				<?php $product_picture = get_sub_field('olt_image'); ?>
				   <img src="<?php echo $product_picture['url']; ?>" alt="<?php echo $product_picture['title']; ?>" title="<?php echo $product_picture['title']; ?>">
				<?php endif; ?>
				<?php if (get_sub_field('olt_name')): ?>
					<h3 class="olm-name"><?php echo get_sub_field('olt_name'); ?></h3>
				<?php endif ?>

				<?php if (get_sub_field('olt_content')): ?>
					<p class="olm-cont"><?php echo get_sub_field('olt_content'); ?></p>
				<?php endif ?>

				<?php 
				$link = get_sub_field('olt_link');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="button btn  btn-primary btn-lg cwc-cta1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
							
			</div>
	      	<?php endwhile; ?>
		<?php endif ?>
	    </div>
	</div>
</section>