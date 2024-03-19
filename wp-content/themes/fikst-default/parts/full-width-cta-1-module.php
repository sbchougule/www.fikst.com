<?php if (get_field('fwc_show','option')): ?>
<section class="fullwidth-cta1 <?php if (get_field('cvp2_para_img','option')): ?> fixed-bg<?php endif ?>" id="fullwidth-cta1<?php echo $i ?>" <?php if (get_field('fwc_bg','option')): ?>style="background-image: url(<?php echo get_field('fwc_bg','option'); ?>);"<?php endif ?>>
			 <div class="container">
			 	<?php if (get_field('fwc_heading','option')): ?>
		    		<h2 class="fwc-heading"><?php echo get_field('fwc_heading','option'); ?></h2>
		    	<?php endif ?>

		    	<?php if (get_field('fwc_description','option')): ?>
		    		<div class="fwc-description"><?php echo get_field('fwc_description','option'); ?></div>
		    	<?php endif ?>

		    	<?php 
				$link = get_field('fwc_cta1','option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="button btn  btn-primary btn-lg fwc-cta1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>

				<?php 
				$link = get_field('fwc_cta2','option');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a class="button btn btn-outline-light btn-lg fwc-cta2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			 </div>
		</section>
		<?php endif;?>