<?php if(get_field('aci_show')):?>
<section class="additional-con-info">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6"><?php if(get_field('aci_heading')):?>
				<h2 class="aci-heading"><?php echo get_field('aci_heading');?></h2><?php endif;?><?php if(get_field('aci_desc')):?>
				<div class="aci-text"><?php echo get_field('aci_desc');?></div><?php endif;?>
			</div>
			<div class="col-12 col-md-6">
				<?php if(get_field('aci_map')):?>
				<div class="gmap">
					<?php echo get_field('aci_map');?>
				</div><?php endif;?>
			</div>
		</div>
	</div>
</section><?php endif;?>