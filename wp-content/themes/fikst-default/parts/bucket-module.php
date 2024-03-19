		<?php if (get_field('bm_show')): ?>
		<section class="bucket-module" >
			<div class="container pt-3 pb-5">
				<div class="bm-wrap">
					<div class="bm-title-wrap">
						<?php if (get_field('bm_heading')): ?>
			    		<h2 class="bm-heading"><?php echo get_field('bm_heading'); ?></h2>
			    	<?php endif ?>
						<?php if (get_field('bm_text')): ?>
			    		<p class="bm-text"><?php echo get_field('bm_text'); ?></p>
			    	<?php endif ?>
		    	</div>
		    </div><?php if (get_field('bm_style') == 'style-1'):?>
				<div class="row pt-3">
				<?php if (have_rows('bm_items')): while ( have_rows('bm_items') ) : the_row(); ?>
					
					<div class="col-sm-6 col-md-4">
						<div class="bm-items">
						<?php if(get_sub_field('bmi_image')) : ?><?php $bmi_image = get_sub_field('bmi_image'); ?>	
						<div class="bmi-image">
							<img src="<?php echo $bmi_image['url']; ?>" alt="<?php echo get_sub_field('bmi_heading'); ?>" title="<?php echo get_sub_field('bmi_heading'); ?>">
						</div>
						<?php endif ?>

						<div class="bm-content-wrap">							
							<?php if (get_sub_field('bmi_heading')): ?>
					    		<h3 class="bmi-heading"><?php echo get_sub_field('bmi_heading'); ?>
					    		</h3>
					    	<?php endif ?>
							<?php if (get_sub_field('bmi_text')): ?>
					    		<p class="bmi-text"><?php echo get_sub_field('bmi_text'); ?></p>
					    	<?php endif ?>

					    	<?php 
							$link3 = get_sub_field('bmi_link');
							if( $link3 ): 
						    $link_url = $link3['url'];
						    $link_title = $link3['title'] ? $link3['title'] : 'MORE INFORMATION';
						    $link_target = $link3['target'] ? $link3['target'] : '_self';
						    ?>
						    <div class="bm-cta-wrap">
		              		<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary bmi-btn"><?php echo esc_html( $link_title ); ?></a>
		              		</div>
			              	<?php endif ?>
					    	
						</div>
						</div>
					</div>
				<?php endwhile; endif ?>
				</div>
				<?php endif;?>
				<?php if (get_field('bm_style') == 'style-2'):?>
		
				<div class="pt-3">
				<?php if (have_rows('bm_items')): while ( have_rows('bm_items') ) : the_row(); ?>
					
					<div class="bm-items">
						<div class=" row">
						<?php if(get_sub_field('bmi_image')) : ?><?php $bmi_image = get_sub_field('bmi_image'); ?>
						<div class="bmi-image col-md-6 col-lg-4 col-12">
							<img src="<?php echo $bmi_image['url']; ?>" alt="<?php echo get_sub_field('bmi_heading'); ?>" title="<?php echo get_sub_field('bmi_heading'); ?>">
						</div>
						<?php endif ?>

						<div class="bm-content-wrap col-md-6 col-lg-8 col-12">							
							<?php if (get_sub_field('bmi_heading')): ?>
					    		<h3 class="bmi-heading"><?php echo get_sub_field('bmi_heading'); ?>
					    		</h3>
					    	<?php endif ?>
							<?php if (get_sub_field('bmi_text')): ?>
					    		<p class="bmi-text"><?php echo get_sub_field('bmi_text'); ?></p>
					    	<?php endif ?>

					    	<?php 
							$link3 = get_sub_field('bmi_link');
							if( $link3 ): 
						    $link_url = $link3['url'];
						    $link_title = $link3['title'] ? $link3['title'] : 'MORE INFORMATION';
						    $link_target = $link3['target'] ? $link3['target'] : '_self';
						    ?>
						    <div class="bm-cta-wrap">
		              		<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary bmi-btn"><?php echo esc_html( $link_title ); ?></a>
		              		</div>
			              	<?php endif ?>
					    	
						</div>
						</div>
					</div>
				<?php endwhile; endif ?>
				</div>
			
		<?php endif;?>
			</div>
		</section>

		
		<?php endif;?>