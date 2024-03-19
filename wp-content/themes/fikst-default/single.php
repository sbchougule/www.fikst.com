<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main single-post-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>
                  
					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) :
					//	comments_template();
					//endif;
					?>
                   

			<!-- <div class="author-info-wrap">
				<h3 class="aiw-title">Discussion</h3>
				<div class="aiw-content">
				<div class="row">
					<div class="col-12 col-md-3">
						<div class="author-avatar">
			           <?php echo get_avatar( get_the_author_meta('user_email'), '160', '' ); ?>
			       		</div>
					</div>
					<div class="col-12 col-md-9">
			           <div class="author-info">
			              <div class="author-info-top">
			              	<h4 class="author-name"><?php the_author_link(); ?></h4>
			              	<span class="author-posted-date"><time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><?php echo get_the_date('m/d/Y'); ?></time></span>
			              </div>
			              <div class="author-info-description">
			                <?php the_author_meta('description'); ?>
			              </div>
			           </div>
					</div>
				</div>
			</div> -->

<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->
<?php //get_template_part('parts/full-width-cta-1-module'); ?>
</div><!-- #single-wrapper -->

<?php get_footer(); ?>
