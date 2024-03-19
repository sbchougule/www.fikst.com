<?php
/*
	Template Name: Front Page
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="site-content" id="page-wrapper">

	<main class="site-main" id="main">

		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'empty' ); ?>


				<?php endwhile; // end of the loop. ?>

			</div><!-- .row -->

		</div><!-- #content -->

		<!-- Do the Flexible Content check -->
		<?php get_template_part('parts/shared/flexible-content'); ?>


	</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>