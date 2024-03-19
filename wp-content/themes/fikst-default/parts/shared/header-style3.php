<header class="site-header header2 sh-sticky-wrap" role="banner">
	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

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

				<div class="utility-nav navbar-right">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="material-icons">menu</span>
					</button>

					<?php
			          $tel_number = get_field('global_phone_number','option');
			          $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			          <?php if ($tel_number): ?>
			              <span class="sh-ph"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><span class="material-icons">call</span> <span><?php echo $tel_number;?></span></a></span>
			          <?php endif ?>

			          <?php
			          $email_address = get_field('global_email', 'option');
			          if ($email_address): ?>
			            <span class="sh-email"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us"><span class="material-icons">mail_outline</span> <span>Email</span></a></span>
			          <?php endif ?>

				       	<span class="sh-search"><a href="#search" class="search-form-tigger" aria-label="Search" data-toggle="search-form"><span class="material-icons">search</span></a></span>
				        
			          <?php 
						$link = get_field('request_quote_link', 'option');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a class="button btn btn-secondary d-none d-md-inline-block m-0 ml-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						    <a class="button btn btn-secondary d-md-none px-4 m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">RFQ</a>
						<?php endif; ?>
				</div>

				<!-- The WordPress Menu goes here -->
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<a href="javascript:void(0)" class="site-nav-container-screen" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Overlay"><span>Overlay</span></a>
					<div class="site-nav-container" id="navbarNavDropdown" class="collapse navbar-collapse">
						<div class="snc-header">
							<button class="navbar-toggler navbar-close-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Close', 'understrap' ); ?>">
								<span class="material-icons">highlight_off</span>
							</button>
						</div>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'main-menu',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 0,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div>
				<?php endif; ?>
				<?php //wp_nav_menu(
					// array(
					// 	'theme_location'  => 'primary',
					// 	'container_class' => 'collapse navbar-collapse',
					// 	'container_id'    => 'navbarNavDropdown',
					// 	'menu_class'      => 'navbar-nav ml-auto main-menu',
					// 	'fallback_cb'     => '',
					// 	'menu_id'         => 'main-menu',
					// 	'depth'           => 2,
					// 	'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					// )
				//); ?>

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
</header>