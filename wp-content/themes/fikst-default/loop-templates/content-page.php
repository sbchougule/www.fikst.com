<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if (get_field('pi_page_intro_type') == 'inlinetitle'): ?>
		<header class="entry-header">
			<?php if (get_field('pi_heading')): ?>
				<h1 class="entry-title"><?php echo get_field('pi_heading'); ?></h1>
			<?php else: ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php endif ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
