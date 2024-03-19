<?php if (get_field('fwc_show')): ?>
<section class="fullwidth-cta2" <?php if (get_field('fwc_bg')): ?>style="background-image: url(<?php echo get_field('fwc_bg'); ?>);"<?php endif ?>>
			 <div class="container">
			 	<div class="fwc2-wrap">
			 		<?php if (get_field('fwc_heading')): ?>
			    		<h2 class="fwc2-heading"><?php echo get_field('fwc_heading'); ?></h2>
			    	<?php endif ?>
			    	<?php 
					$link = get_field('fwc_cta1');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <span><a class="btn-alt-on-color fwc-cta1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span>
					<?php endif; ?>
			 	</div>
			 </div>
		</section>
		<?php endif;?>