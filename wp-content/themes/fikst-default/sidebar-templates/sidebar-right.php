<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-auto widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>
<!-- <aside class="widget widget_categories widget_categories-layout-2"><h3 class="widget-title">By Topic</h3>
	<div class="widget_categories-layout-2-list">
			<?php $categories = get_categories();
foreach ($categories as $cat) {
    $category_link = get_category_link($cat->cat_ID); 
    $term_image_url = get_term_meta( $cat->cat_ID, 'term_image', true );
     ?>

    <?php echo '<a href="' . esc_url($category_link) . '" title="' . esc_attr($cat->name) . '"><span>' . esc_html($cat->name) . '</span><img src="'.$term_image_url.'"></a>'; ?>
<?php } ?>
</div>
</aside> -->

<!-- Button Starts -->
<?php if (get_field('sbo_content') || get_field('sbo_button_link')): ?>
<aside class="widget<?php if(get_field('sbo_sticky_button')) : ?> sticky-widgets<?php endif; ?>">
	<?php if (get_field('sbo_content')): ?>
		<div class="sbo_content"><?php echo get_field('sbo_content'); ?></div>
	<?php endif ?>
	<?php $sbo_button_link =  get_field('sbo_button_link');
	if( $sbo_button_link ): 
	$link_url = $sbo_button_link['url'];
	$link_title = $sbo_button_link['title'] ? $sbo_button_link['title'] : 'Subheader';
	$link_target = $sbo_button_link['target'] ? $sbo_button_link['target'] : '_self';
	?>
	<a class="button btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_attr( $link_title ); ?></a>
<?php endif; ?>
</aside>
<!-- Button Ends -->
<?php endif; ?>

</div><!-- #right-sidebar -->
