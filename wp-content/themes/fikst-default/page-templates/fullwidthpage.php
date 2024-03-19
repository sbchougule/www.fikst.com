<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="full-width-page-wrapper">

	<?php if (get_the_content() || is_page( '9' )): ?>
		<div class="<?php echo esc_attr( $container ); ?>" id="content">

			<div class="row">

				<div class="col-md-12 content-area" id="primary">

					<main class="site-main" id="main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'loop-templates/content', 'page' ); ?>

							<?php if (is_page( '9' )) : ?>
							<!--Sitemap Page-->
							<?php wp_nav_menu(array(
						      'menu'            => 'Sitemap',
						      'container'       => 'ul',
						      'menu_class'      => 'sitemap-menu',
						      )); ?>
						<?php endif; ?>	 

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row end -->

		</div><!-- #content -->
	<?php endif ?>


	<!-- Do the Flexible Content check -->
	<?php get_template_part('parts/shared/flexible-content'); ?>
	
</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
