<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php if( get_field('ga_on_off','options') == true ): ?>
		<?php if( get_field('ga_gtm_code','options')): ?>
			<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','<?php echo get_field('ga_gtm_code','options'); ?>');</script>
			<!-- End Google Tag Manager -->
		<?php endif; ?>
	<?php endif; ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

	<?php if(get_field('before_the_head')):?>
    	<?php echo get_field('before_the_head'); ?>
    <?php elseif(get_field('before_the_head','options')):?>
    	<?php echo get_field('before_the_head','options'); ?>
    <?php endif;?>
</head>

<body <?php body_class(); ?>>
	<?php if( get_field('ga_on_off','options') == true ): ?>
		<?php if( get_field('ga_gtm_code','options')): ?>
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_field('ga_gtm_code','options'); ?>"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
		<?php endif; ?>
	<?php endif; ?>
	<?php if(get_field('after_the_body')):?>
    	<?php echo get_field('after_the_body'); ?>
    <?php elseif(get_field('after_the_body','options')):?>
    	<?php echo get_field('after_the_body','options'); ?>
    <?php endif;?>

<?php do_action( 'wp_body_open' ); ?>
<?php get_template_part( 'parts/shared/search-module' ); ?>
<div class="site" id="page">
	<!-- <a href="javascript:void(0)" id="skipToContent" class="btn btn-secondary">Skip To Content</a> -->
	<!-- Header Style Variable -->
	<?php $global_header_styles = get_field('global_header_styles', 'option');
	?>
	<?php if ($global_header_styles == "header_style1"): ?>
		<?php get_template_part( 'parts/shared/header-style1' ); ?>

	<?php elseif ($global_header_styles == "header_style2") : ?>
		<?php get_template_part( 'parts/shared/header-style2' ); ?>

	<?php elseif ($global_header_styles == "header_style3") : ?>
		<?php get_template_part( 'parts/shared/header-style3' ); ?>

	<?php elseif ($global_header_styles == "header_style4") : ?>
		<?php get_template_part( 'parts/shared/header-style4' ); ?>	

	<?php elseif ($global_header_styles == "header_style5") : ?>
		<?php get_template_part( 'parts/shared/header-style5' ); ?>	

	<?php elseif ($global_header_styles == "header_style6") : ?>
		<?php get_template_part( 'parts/shared/header-style6' ); ?>	

	<?php elseif ($global_header_styles == "header_style7") : ?>
		<?php get_template_part( 'parts/shared/header-style7' ); ?>	
	<?php endif ?>

	<?php if ( is_front_page() ) : ?>
      <!--Site intro container start-->
        <?php get_template_part( 'parts/site-intro' ); ?>   
      <!--Site intro container end-->
    <?php else : ?>
      <!--page intro start-->    
        <?php get_template_part( 'parts/page-intro' ); ?>    
      <!--page intro end-->
    <?php endif; ?>
