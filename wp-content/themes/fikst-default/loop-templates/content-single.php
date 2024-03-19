<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <!-- <p class="post-categories"><?php the_category(', '); ?></p> -->
		<!-- <h2 class="page-title entry-title single-title" itemprop="headline"><?php //the_title(); ?></h2>-->
    	<!-- <p class="single-post-date-wrap">On <time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><?php echo get_the_date('m/d/Y'); ?></time> | By <?php the_author(); ?></p> -->

	</header><!-- .entry-header -->
    <div class="post-image">
	<?php //echo get_the_post_thumbnail( $post->ID, 'large' );
	$featured_img_url = get_the_post_thumbnail_url($post->ID);
	if( $featured_img_url ):
		$featured_title = ucwords(get_the_title());
		echo '<a href="'.$featured_img_url.'" class="lightbox"><img src="'.$featured_img_url.'"  alt="'.$featured_title.'" title="'.$featured_title.'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"></a>';?>
	<?php endif; ?>
     </div>
	<div class="entry-content">

		<?php the_content(); ?>
		<?php get_template_part('parts/shared/flexible-content'); ?>
		<div class="post-tag-list">
			<!-- <span>TAGS:</span> -->
        <!-- <?php
    $tags = get_tags();
    if ( $tags ) :
        foreach ( $tags as $tag ) : ?>
            <a class="post-tag-link" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a><?php endforeach; ?>
    <?php endif; ?> -->
     </div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
