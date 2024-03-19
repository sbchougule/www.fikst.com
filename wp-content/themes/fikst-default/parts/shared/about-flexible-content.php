
<?php if( have_rows('about_flexible_content') ): $i = 0; echo '<section class="additional-content">';
    while ( have_rows('about_flexible_content') ) : the_row(); $i++; ?>

    

	 <?php if( get_row_layout() == 'content_module' ): ?>
	<section class="content-module ">
	<?php while(have_rows('cm_items')): the_row();?>
	<div class="cm-wrap ">
		<div class="container <?php echo !empty(get_sub_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?> clearfix">
			<?php if(get_sub_field('cm_heading')):?>
			<h2><?php echo get_sub_field('cm_heading');?></h2>
			<?php endif;?>
			<?php $img = get_sub_field('cm_img'); if($img):?>
			<div class="cm-img">
			<a href="<?php echo $img['url'];?>" class="lightbox"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"></a>
			</div>
			<?php endif;?>
			<?php if(get_sub_field('cm_desc')):?>
			<div><?php echo get_sub_field('cm_desc');?></div>
			<?php endif;?>
		</div>
	</div>
	<?php endwhile;?>
	</section>	

	<?php elseif( get_row_layout() == 'three_bucket_module' ): ?>
	<section class="aum-three-bucket-module">
		<div class="container">
				<div class="row">
					<?php $images = get_sub_field('img_gallery');
					if( $images ): ?>
					<?php foreach( $images as $image ): ?>
					<div class="col-12 col-sm-6 col-md-4">
						<a href="<?php echo $image['url']; ?>" class="lightbox"> <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"> </a>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>	
				</div>
		</div>
	</section>

	<?php elseif( get_row_layout() == 'four_bucket_module' ): ?>
	<section class="aum-four-bucket-module">
		<div class="container ">
			<div class="row">
				<?php $images = get_sub_field('aum_f_img_gallery');
				if( $images ): ?>
				<?php foreach( $images as $image ): ?>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?php echo $image['url']; ?>" class="lightbox"> <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"> </a>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>	
			</div>
		</div>
	</section>

	<?php elseif( get_row_layout() == 'additional_fact_module' ): ?>
 	<section class="additional-fact-module" <?php if (get_sub_field('drm_bg_color')): ?>style="background-color:<?php echo get_sub_field('drm_bg_color'); ?>"<?php endif ?>>
 		<div class="container <?php echo !empty(get_field('container_padding')) ? get_sub_field('container_padding') : 'py-5' ?>">
 			<div class="row justify-content-center align-items-center">
 				<div class="col-12 col-md-6 text-center">
 					<?php $img = get_sub_field('afm_img'); if($img):?><a href="<?php echo $img['url'];?>" class="lightbox"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"></a><?php endif;?>
 				</div>
 				<div class="col-12 col-md-6">
 					<div class="afm-content">
 						<?php if(get_sub_field('afm_heading')):?>
 						<h2 class="afm-heading"><?php echo get_sub_field('afm_heading');?></h2>
 						<?php endif;?>
 						<?php if(get_sub_field('afm_desc')):?>
 						<p class="afm-desc"><?php echo get_sub_field('afm_desc');?></p>
 						<?php endif;?>
 						<?php 
						$link = get_sub_field('afm_cta');
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
 	</section>

 	<?php elseif( get_row_layout() == 'full_width_cta_module' ): ?>
	<section class="fullwidth-cta2" <?php if (get_sub_field('fwc_bg')): ?>style="background-image: url(<?php echo get_sub_field('fwc_bg'); ?>);"<?php endif ?>>
		 <div class="container">
		 	<div class="fwc2-wrap">
		 		<?php if (get_sub_field('fwc_heading')): ?>
		    		<h2 class="fwc2-heading"><?php echo get_sub_field('fwc_heading'); ?></h2>
		    	<?php endif ?>
		    	<?php 
				$link = get_sub_field('fwc_cta1');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <span><a class="button btn  btn-primary btn-lg fwc-cta1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></span>
				<?php endif; ?>
		 	</div>
		 </div>
	</section>


<?php endif;?>

<?php endwhile; echo '</section>'; ?>
<?php endif; ?>
