<?php if (get_field('rfq_lp_show')): ?>
	<section class="rfq-lp-module">
			<div class="container">
				<?php if (get_field('rfq_lp_heading')): ?>
			    		<h2 class="rfq-lp-heading"><?php echo get_field('rfq_lp_heading'); ?></h2>
			    	<?php endif ?>
			    	<?php if (get_field('rfq_lp_desc')): ?>
				<p class="rfq-lp-desc"><?php echo get_field('rfq_lp_desc'); ?></p><?php endif ?>
				<div class="rfq-lp-wrap">
					<?php if(have_rows('rfq_lp_items')): while (have_rows('rfq_lp_items')): the_row(); ?>
					<div class="rfq-lp-item">
						<?php $img = get_sub_field('rfq_lp_img'); if($img):?><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"><?php endif;?>
						<?php if (get_sub_field('rfq_lp_title')): ?><h4><?php echo get_sub_field('rfq_lp_title'); ?></h4><?php endif ?>
					</div><?php endwhile;endif;?>
				</div>
			</div>
		</section>   <?php endif ?>