<?php if(get_field('afbm_show')):?>
<section class="aum-four-bucket-module">
	<div class="container ">
			<div class="row">
				<?php $images = get_field('aum_f_img_gallery');
							if( $images ): ?>
								<?php foreach( $images as $image ): ?>
				<div class="col-12 col-sm-6 col-md-3">
						<a href="<?php echo $image['url']; ?>" class="lightbox"> <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>"> </a>
				</div>
				<?php endforeach; ?>
							<?php endif; ?>	
			</div>
	</div>
</section><?php endif;?>