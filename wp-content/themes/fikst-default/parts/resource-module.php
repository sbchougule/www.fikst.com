<?php if (get_field('drm_show')): ?>
<section class="dest-resource-module" <?php if (get_field('drm_bg_color')): ?>style="background-color:<?php echo get_field('drm_bg_color'); ?>"<?php endif ?> >
	<div class="container py-5">
		<div class="row align-items-md-center ">
			<div class="col-md-8 col-12 ">
				<div> 
				<?php if (get_field('drm_heading')): ?>
					<h2 class="drm-title"><?php echo get_field('drm_heading'); ?></h2>
				<?php endif ?>

				<?php echo get_field('drm_desc'); ?>

				<?php 
				$link = get_field('drm_link');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?> 
				<div class="drm-cta-wrap  pb-4">
					<a class="btn btn-primary drm-btn"  target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo $drm_link['url']; ?>"><?php echo esc_html( $link_title ); ?></a>
				</div>
				<?php endif; ?>
				</div>
			</div>
			<div class="col-md-4 col-12 text-center">
				<?php $img = get_field('drm_img'); if($img):?>
				<a href="<?php echo $img['url'];?>"  title="<?php echo $img['alt'];?>" class="lightbox"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"></a><?php endif;?>
			</div>
		</div>
	</div>
</section><?php endif;?>