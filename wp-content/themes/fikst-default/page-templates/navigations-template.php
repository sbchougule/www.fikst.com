<?php
/**
 * Template Name: Navigations Page
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

						<h3 class="mb-3">Nav-1</h3>
						<?php get_template_part( 'parts/shared/header-style1' ); ?>

						<h3 class="mb-3">Nav-2</h3>
						<?php get_template_part( 'parts/shared/header-style2' ); ?>

						<h3 class="mb-3">Nav-3</h3>
						<?php get_template_part( 'parts/shared/header-style3' ); ?>

						<h3 class="mb-3">Nav-4</h3>
						<?php get_template_part( 'parts/shared/header-style4' ); ?>	

						<h3 class="mb-3">Nav-5</h3>
						<?php get_template_part( 'parts/shared/header-style5' ); ?>	

						<h3 class="mb-3">Nav-6</h3>
						<?php get_template_part( 'parts/shared/header-style6' ); ?>

						<h3 class="mb-3">Nav-7</h3>
						<?php get_template_part( 'parts/shared/header-style7' ); ?>	
						


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
