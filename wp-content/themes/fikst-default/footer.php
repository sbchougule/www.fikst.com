<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$footer_style = get_field('global_foote_style', 'option');
?>
<?php if ($footer_style == 'footer_1'): ?>
	<?php get_template_part( 'parts/shared/footer-style1' ); ?>
<?php elseif ($footer_style == 'footer_2'): ?>
	<?php get_template_part( 'parts/shared/footer-style2' ); ?>
<?php elseif ($footer_style == 'footer_3'): ?>
	<?php get_template_part( 'parts/shared/footer-style3' ); ?>
<?php else: ?>

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
<?php endif ?>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<p id="back-top">
    <a href="#top"><span>Back to Top</span></a>
</p>
<?php if(get_field('before_the_body')):?>
	<?php echo get_field('before_the_body'); ?>
<?php elseif(get_field('before_the_body','options')):?>
	<?php echo get_field('before_the_body','options'); ?>
<?php endif;?>

</body>

</html>

