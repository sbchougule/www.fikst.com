<?php
/**
 * Template Name: Pillar Page Template
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


<div class="wrapper pillar-page-template" id="full-width-page-wrapper">

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


						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

	<!-- Do the Flexible Content check -->
	<?php get_template_part('parts/shared/flexible-content'); ?>
	
</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
