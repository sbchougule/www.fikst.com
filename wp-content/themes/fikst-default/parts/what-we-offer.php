<?php if(get_field('wwo_show')):?>
<section class="what-we-offer">
	<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		<?php if(get_field('wwo_heading')):?>
		<h2 class="wwo-heading"><?php echo get_field('wwo_heading');?></h2>
		<?php endif;?>
		<?php if(get_field('wwo_description')):?>
		<div class="wwo-text"><?php echo get_field('wwo_description');?></div><?php endif;?>
		<div class="wwo-buckets">
			<div class="row">
				<?php if( have_rows('wwo_buckets') ): while ( have_rows('wwo_buckets') ) : the_row(); ?>
				<div class="col-12 col-md-4">
					<div <?php if( get_sub_field('wwo_bg')): ?>style="background-color: <?php echo get_sub_field('wwo_bg');?>" <?php endif; ?>>
					<?php if(get_sub_field('wwo_title')):?>
					<h3 class="wwo-title"><?php echo get_sub_field('wwo_title');?></h3><?php endif;?>
					<?php if(get_sub_field('wwo_content')):?>
					<div class="wwo-cont"><?php echo get_sub_field('wwo_content');?></div><?php endif;?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section><?php endif;?>