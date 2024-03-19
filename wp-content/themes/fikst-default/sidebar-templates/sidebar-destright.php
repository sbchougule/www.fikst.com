<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'destination-page-right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="destination-page-right-sidebar" role="complementary">
<?php else : ?>
	<div class="col-md-4 widget-area" id="destination-page-right-sidebar" role="complementary">
<?php endif; ?>
<?php dynamic_sidebar( 'destination-page-right-sidebar' ); ?>

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
