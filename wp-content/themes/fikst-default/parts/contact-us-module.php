<section class="contact-us-module">
	
	<div class="container">
		<div class="row"><?php if(get_field('cum_form')):?>
		<div class="col-12 col-md-6"><?php echo get_field('cum_form');?></div><?php endif?>
		<div class="col-12 col-md-6">
			<?php if(get_field('cum_heading')):?><h2><?php echo get_field('cum_heading');?></h2><?php endif?><?php if(get_field('cum_desc')):?>
			<div class="cum-desc"><?php echo get_field('cum_desc');?></div><?php endif?>
		</div>
		</div>
	</div>

	<div class="container">
		 			<div class="row m-0 text-center">
		 				<?php if(have_rows('cpm_items')): while(have_rows('cpm_items')): the_row();?>
		 				<div class="col-12 col-md-3 ">
		 					<div class="cpm-item  p-2">
			 					<?php $logo = get_sub_field('cpm_logo'); if($logo):?>
			 					<img src="<?php echo $logo['url'];?>" title="<?php echo $logo['alt'];?>" alt="<?php echo $logo['alt'];?>"><?php endif;?>
			 					<?php if(get_sub_field('cpm_title')):?>
			 					<div class="cpm-title"><strong><?php echo get_sub_field('cpm_title');?></strong></div><?php endif;?>
			 					<?php if(get_sub_field('cpm_content')):?>
			 					<div class="cpm-cont"><?php echo get_sub_field('cpm_content');?></div>
			 					<?php endif;?>
		 					</div>
		 				</div>
		 			<?php endwhile;endif;?>
		 			</div>
		 		</div>
		 		<?php if(get_field('cpm_map')):?>
		 		<div class="container">
		 			<div class="gmap">
		 				<?php echo get_field('cpm_map');?>
		 			</div>
		 		</div><?php endif; if(have_rows('cum_items')):?>

		 		<div class="container">
		<div class="row justify-content-center m-auto text-center">
			<?php  while(have_rows('cum_items')): the_row();?>
		<div class="col-12 col-md-6 p-3">
			<div class="col-md-10 row justify-content-center align-items-center m-auto">
				<div class="col-4 m-auto col-md-4"><?php $logo = get_sub_field('cum_logo'); ?><img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>" title="<?php echo $logo['alt'];?>"></div>
				<div class="col-12 col-md-8"><?php if(get_sub_field('cum_add')):?><strong><?php echo get_sub_field('cum_add');?></strong><?php endif;?></div>
			</div>
		</div>
		<?php endwhile;?>
		
		</div>
	</div><?php endif;?>
</section>