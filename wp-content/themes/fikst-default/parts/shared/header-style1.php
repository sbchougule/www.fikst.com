<header class="site-header header0">
	<div class="header-inner sh-sticky-wrap">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<?php if ( 'container' == $container ) : ?>
					<div class="container">
				<?php endif; ?>

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

						<!-- The WordPress Menu goes here -->
						<a href="javascript:void(0)" class="site-nav-container-screen" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Overlay"><span>Overlay</span></a>
						<div class="site-nav-container" id="navbarNavDropdown" class="collapse navbar-collapse">
							<div class="snc-header">
								<div class="header-topline-menu header-topline-mob-menu">
									<?php wp_nav_menu(
										array(
											'menu'			  => 'Top Nav Menu',
											'menu_class'      => 'navbar-nav m-auto',
											'fallback_cb'     => '',
											'menu_id'         => 'top-line-menu',
											'depth'           => 3,
											'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
										)
									); ?>
								</div>

								<button class="navbar-toggler navbar-close-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Close', 'understrap' ); ?>">
									<span class="material-icons">close</span>
								</button>
							</div>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<?php wp_nav_menu(
									array(
										'theme_location'  => 'primary',
										'container_class' => 'mobile-nav main-menu',
										'menu_class'      => 'navbar-nav ml-auto',
										'fallback_cb'     => '',
										'menu_id'         => 'main-menu',
										'depth'           => 0,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
									)
								); ?>
							<?php endif; ?>
							<span class="sh-search d-none d-lg-inline-block"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search"><span class="material-icons">search</span></a></span>
						</div>

						<div class="utility-nav navbar-right d-lg-none">
							<button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<span class="material-icons">menu</span>
							</button>
	
							<span class="sh-search d-lg-none"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search"><span class="material-icons">search</span></a></span>

							<?php 
							$link = get_field('request_quote_link', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="button btn btn-primary d-none d-xl-inline-block m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							    <a class="button btn btn-on-color d-xl-none px-4 m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">RFQ</a>
							<?php endif; ?>
						</div>

					<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
					<?php endif; ?>
			</div>
		</nav>
	</div>
</header>