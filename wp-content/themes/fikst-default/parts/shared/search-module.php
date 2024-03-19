<!--Site Search -->
<div class="search-module">
	<div class="container py-3">        
	    <?php //get_search_form(); ?>
	    <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
			<div class="input-group">
				<input class="field form-control search" id="s" name="s" type="text"
					placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>" title="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" tabindex="-1" aria-label="Search">
				<span class="input-group-append">
					<button type="submit" class="submit btn-primary search-btn" tabindex="-1" aria-label="Search Submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</span>

				<a href="javacsript:void(0)" class="input-group-append search-close" tabindex="-1" aria-label="Close Search"><i class="fa fa-window-close" aria-hidden="true"></i></a>
			</div>
		</form>
	</div>
</div>