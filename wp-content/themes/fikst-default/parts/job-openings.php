<section class="job-openings">
	<div class="container <?php echo !empty(get_field('container_padding')) ? get_field('container_padding') : 'py-5' ?>">
		<?php if(get_field('jo_heading')):?>
		<h2 class="jo-heading"><?php echo get_field('jo_heading');?></h2>
		<?php endif;?>

		<div class="click-expand-module">
			<div id="accordion" >
			<?php if( have_rows('jo_buckets') ):  while ( have_rows('jo_buckets') ) : the_row(); ?>
				<div class="card">
			    <h3 class="mb-0" id="heading<?php echo get_row_index(); ?>">
			        <button class="btn-link card-header <?php if(get_row_index()!=1): ?>collapsed<?php endif; ?>" data-toggle="collapse" data-target="#collapse<?php echo get_row_index(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_row_index(); ?>">
			        	<?php echo get_sub_field('jo_title'); ?>

			        	<?php if(get_row_index()!=1): ?>
			        		<!-- <i class="fa fa-plus" aria-hidden="true"></i> -->
			        		<span class="material-icons">add</span>
			        	<?php else: ?>
			        		<!-- <i class="fa fa-minus" aria-hidden="true"></i> -->
			        		<span class="material-icons">remove</span>
			        	<?php endif; ?>
			        </button>
			    </h3>

			    <div id="collapse<?php echo get_row_index(); ?>" class="collapse <?php if(get_row_index() == 1) :?>show<?php endif; ?>" aria-labelledby="heading<?php echo get_row_index(); ?>" data-parent="#accordion">
			      	<div class="card-body">
			       		<?php echo get_sub_field('jo_content'); ?>
			      	</div>
			    </div>
			</div>

		    <?php endwhile; ?><?php endif; ?> 
			</div>
		</div>

	    <div class="jo-bottom-module">
		    <?php if(get_field('jo_apply')):?>
		    	<?php if(get_field('jo_form')):?>
				<div class="jo-form"><?php echo get_field('jo_form');?></div>
				<?php endif;?>
		    <?php endif;?>	

		    <div class="jo-extra-data">
		    	<?php if(get_field('jo_ex_heading')):?>
				<h2 class="jo-title"><?php echo get_field('jo_ex_heading');?></h2>
				<?php endif;?>
				<?php if(get_field('jo_ex_content')):?>
				<div class="jo-cont"><?php echo get_field('jo_ex_content');?></div>
				<?php endif;?>
				<?php $img = get_field('jo_ex_image'); if($img):?>
				<a href="<?php echo $img['url'];?>"  title="<?php echo $img['alt'];?>" class="lightbox"><img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"></a>
				<?php endif;?>
		    </div>
	    </div>


	</div>
</section>