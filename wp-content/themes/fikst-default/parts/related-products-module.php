<section class="related-products-module">
	<div class="container">
		<?php if (get_field('rpm_heading','option')): ?>
			<h2 class="rpm-heading"><?php echo get_field('rpm_heading','option'); ?></h2>
		<?php endif ?>
		<div class="rpm-items-wrap">
			<?php if( have_rows('rpm_item','option') ): while ( have_rows('rpm_item','option') ) : the_row(); ?>
			<div class="rpm-item">
				<figure class="rpmi-img">
					<?php if(get_sub_field('rpmi_img','option')) : ?>	
		<?php $rpmi_img = get_sub_field('rpmi_img','option'); ?>
		<img src="<?php echo $rpmi_img['url']; ?>" alt="<?php echo $rpmi_img['title']; ?>" title="<?php echo $rpmi_img['title']; ?>">
	<?php endif; ?>
				</figure>
				<?php if (get_sub_field('rpmi_name','option')): ?>
				<h3 class="rpmi-title"><?php echo get_sub_field('rpmi_name','option'); ?></h3><?php endif ?>
				<?php if (get_sub_field('rpmi_description','option')): ?>
				<div class="rpmi-desc"><?php echo get_sub_field('rpmi_description','option'); ?></div><?php endif ?>
				<?php $rpmi_cta = get_sub_field('rpmi_cta','option');		
if( $rpmi_cta ):		
$link_url = $rpmi_cta['url'];		
$link_title = $rpmi_cta['title'];		
$link_target = $rpmi_cta['target'] ? $rpmi_cta['target'] : '_self';		
?>
				<a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>
				<?php endif; ?>
			</div>
		<?php endwhile; endif; ?>
		</div>
	</div>
</section>