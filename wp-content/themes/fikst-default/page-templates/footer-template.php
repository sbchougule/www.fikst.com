<?php
/**
 * Template Name: Footers Page
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

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<h3 class="mb-3">Footer-1</h3>
						<?php get_template_part( 'parts/shared/footer-style1' ); ?>

						<h3 class="mb-3">Footer-2</h3>
						<?php get_template_part( 'parts/shared/footer-style2' ); ?>

						<h3 class="mb-3">Footer-3</h3>
						<?php get_template_part( 'parts/shared/footer-style3' ); ?>

						<h3 class="mb-3">Footer-4</h3>
						<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

						<div class="wrapper" id="wrapper-footer">

							<div class="<?php echo esc_attr( $container ); ?>">

								<div class="row">

									<div class="col-md-12">

										<footer class="site-footer-bottom" id="colophon">

											<div class="site-info">

												<?php //understrap_site_info(); ?>

												<div class="copyright"><?php echo date("Y"); ?> &copy; All Rights Reserved by <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></div>

												<?php
												if ( is_active_sidebar( 'footer-bottom-widget-area-right' ) ) : ?>
												    <div class="footer-bottom-right widget-area">
												    	<?php dynamic_sidebar( 'footer-bottom-widget-area-right' ); ?>
												    </div>
												<?php endif; ?>
											</div><!-- .site-info -->

										</footer><!-- #colophon -->

									</div><!--col end -->

								</div><!-- row end -->

							</div><!-- container end -->

						</div><!-- wrapper end -->
						


						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
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
