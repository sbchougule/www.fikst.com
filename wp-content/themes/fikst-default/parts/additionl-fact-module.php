		 	<?php if(get_field('afm_show')):?>
		 	<section class="additional-fact-module" <?php if (get_field('drm_bg_color')): ?>style="background-color:<?php echo get_field('drm_bg_color'); ?>"<?php endif ?>>
		 		<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		 			<div class="row justify-content-center align-items-center">
		 				<div class="col-12 col-md-6 text-center">
		 					<?php $img = get_field('afm_img'); if($img):?><a href="<?php echo $img['url'];?>" class="lightbox"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"></a><?php endif;?>
		 				</div>
		 				<div class="col-12 col-md-6">
		 					<div class="afm-content">
		 						<?php if(get_field('afm_heading')):?>
		 						<h2 class="afm-heading"><?php echo get_field('afm_heading');?></h2>
		 						<?php endif;?>
		 						<?php if(get_field('afm_desc')):?>
		 						<p class="afm-desc"><?php echo get_field('afm_desc');?></p>
		 						<?php endif;?>
		 						<?php 
								$link = get_field('afm_cta');
								if( $link ): 
								    $link_url = $link['url'];
								    $link_title = $link['title'];
								    $link_target = $link['target'] ? $link['target'] : '_self';
								    ?>
		 						
		 						<a href="<?php echo $cta['url'];?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary"><?php echo esc_html( $link_title ); ?></a>
		 						<?php endif;?>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</section><?php endif;?>