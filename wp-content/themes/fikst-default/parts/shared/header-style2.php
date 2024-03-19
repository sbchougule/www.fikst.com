<header class="site-header header1 sh-sticky-wrap" role="banner">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container">
				<!-- Your site title as branding in the menu -->
				<?php $logo = get_field('global_company_logo','option'); ?>
				<?php if ( !$logo && ! has_custom_logo() ) { ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>

				<?php } else {
					if( !empty($logo) ): ?>
	                    <a href="<?php bloginfo('url'); ?>" class="site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>"></a>
	                <?php else: 
	                	the_custom_logo();
	                 endif;
				} ?><!-- end custom logo -->

		       	<div class="navbar-form navbar-right utility-nav">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="material-icons">menu</span>
					</button>
		            <a href="#search" class="search-form-tigger ml-3" aria-label="Search" data-toggle="search-form"><span class="material-icons">search</span></a>
		        </div>

				<!-- The WordPress Menu goes here -->
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto main-menu',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 0,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				<?php endif; ?>
			</div><!-- .container -->
		</nav><!-- .site-navigation -->
	</div><!-- #wrapper-navbar end -->
</header>