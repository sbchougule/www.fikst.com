<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<!-- <input class="submit btn-primary" id="searchsubmit" name="submit" type="submit"
			value="<?php esc_attr_e( 'Search', 'understrap' ); ?>"> -->
			<button type="submit" class="submit btn-primary search-btn tse-remove-border" aria-label="Search Submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</span>
	</div>
</form>
