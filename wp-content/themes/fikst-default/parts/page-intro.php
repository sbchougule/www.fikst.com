<?php if ( !is_front_page() && is_home() ):
	$id = intval(get_option( 'page_for_posts' ));
else: 
	$id = get_the_ID();
endif; ?>

<?php 
$single_banner = 0;
if (get_field('pi_page_intro_type', get_option( 'page_for_posts' )) == 'intro_banner'):
	$single_banner = 1;
endif ?>

<?php if ( get_field('pi_page_intro_type', $id) == 'intro_banner' || $single_banner == 1): ?>
	<div class="page-intro"
	<?php if (get_field('pi_bg', $id)) {
		echo 'style="background-image:url('.get_field('pi_bg', $id).')"';
	} 
	elseif (get_field('inner_page_banner','option')) {
		echo 'style="background-image:url('.get_field('inner_page_banner','option').')"';
	}?>
	<?php /*elseif (get_field('global_company_logo','option')):?>
		style="background-image:url(<?php echo get_field('global_company_logo','option'); ?>)"
	<?php endif*/ ?>


	<?php /*if (get_field('pi_bg', $id)): ?>
		style="background-image:url(<?php echo get_field('pi_bg', $id); ?>)"
	<?php elseif (get_field('global_company_logo','option')):?>
		style="background-image:url(<?php echo get_field('global_company_logo','option'); ?>)"
	<?php endif*/ ?>
			>
		<div class="container">
			<div class="pi-wrap">
				
				<?php if(is_home()):?>
			 		<div class="pi-heading"><?php echo get_field('pi_heading', $id);?></div>

			 	<?php elseif(is_404()):?>
					<div class="pi-heading">Error 404</div>
				 	
				<?php elseif(is_author()):?>
					<div class="pi-heading"><?php echo get_the_author() ; ?></div>

				<?php elseif(is_search()):?>
					<div class="pi-heading">Search Results</div>

				<?php elseif(is_category()): ?>
					<div class="pi-heading">Culture</div>

				<?php elseif(is_archive('post')): ?>
					<div class="pi-heading"><?php echo get_the_archive_title(); ?></div>

				<?php elseif(get_field('pi_heading')):?>
					<div class="pi-heading"><?php echo get_field('pi_heading', $id);?></div>

				<?php elseif(is_front_page()):?>
					<div class="pi-heading">Culture</div>

				<?php elseif(is_single()):?>
					<div class="pi-heading">Culture</div>

				<?php else: ?>
				 	<div class="pi-heading"><?php the_title(); ?></div>
				
				<?php endif;?>

				<?php if(get_field('pi_desc')): ?>
				<p class="pi_desc"><?php echo get_field('pi_desc'); ?></p>
				<?php endif;?>
			</div>

		</div>
	</div>

	<?php
	//if ( function_exists('yoast_breadcrumb') ) {
	//  yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumb-menu"><div class="container">','</div></div>' );
	//}
	?>
	<?php if(is_single()): ?>
	<div class="container pt-6">
		<?php if (get_field('global_blog_page_content', 'option')): ?>
			<div class="blog-page-content"><?php echo get_field('global_blog_page_content', 'option'); ?></div>
		<?php endif ?>
	</div>
	<?php endif;?>

	<?php if(is_search()): ?>
	<div class="pt-6">
		<div class="container">
				<h1 class="pi-heading">Search Results for: <?php echo get_search_query(); ?></h1>
		</div>
	</div>
	<?php endif;?>

	<?php if(is_404()): ?>
	<div class="pt-6">
		<div class="container">
			<h1 class="pi-heading">Page not found</h1>
		</div>
	</div>
	<?php endif;?>
<?php endif ?>