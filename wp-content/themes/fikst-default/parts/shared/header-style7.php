<header class="site-header header7">
	<div class="top-line">
		<div class="container">
			<div class="row">
				<div class="header-topline-menu col-lg-6 navbar-expand-lg navbar-dark d-none d-lg-block">
					<?php wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => '',
							'menu'			  => 'Top Nav Menu',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'top-line-menu',
							'depth'           => 0,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<div class="col-lg-6 col-12 text-right">
					<?php
			        $tel_number = get_field('global_phone_number','option');
			        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			        <?php if ($tel_number): ?>
			              <span class="sh-ph"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><span class="material-icons">call</span> <span><?php echo $tel_number;?></span></a></span>
			        <?php endif ?>

			        <?php
			        $email_address = get_field('global_email', 'option');
			        if ($email_address): ?>
			            <span class="sh-email"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us"><span class="material-icons">mail_outline</span> <span><?php echo $email_address; ?></span></a></span>
			        <?php endif ?>

			        <span class="sh-search"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search" title="Search"><span class="material-icons">search</span></a></span>

					<?php $rfq_link = get_field('request_quote_link', 'option');
						if( $rfq_link ): 
					    $rfq_link_url = $rfq_link['url'];
					    $rfq_link_title = $rfq_link['title'];
					    $rfq_link_target = $rfq_link['target'] ? $rfq_link['target'] : '_self';
					    ?>
						<a class="btn btn-primary d-md-none" href="<?php echo esc_url( $rfq_link_url ); ?>" target="<?php echo esc_attr( $rfq_link_target ); ?>">RFQ</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<div class="header-inner sh-sticky-wrap">
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
							<span class="material-icons">highlight_off</span>
						</button>
					</div>
					<?php if ( has_nav_menu( 'left_primary' ) || has_nav_menu( 'right_primary' ) ) : ?>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'left_primary',
								'container_class' => 'main-menu left-main-menu',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 0,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
						<?php if( !empty($logo) ): ?>
		                    <a href="<?php bloginfo('url'); ?>" class="site-logo middle-site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>"></a>
		                <?php else: 
		                	the_custom_logo();
		                 endif; ?>

						<?php wp_nav_menu(
							array(
								'theme_location'  => 'right_primary',
								'container_class' => 'main-menu right-main-menu',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 0,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					<?php endif; ?>
				</div>
				<div class="utility-nav navbar-right">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="material-icons">menu</span>
					</button>

					<!-- <?php
			        $tel_number = get_field('global_phone_number','option');
			        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			        <?php if ($tel_number): ?>
			              <span class="sh-ph d-md-none m-0"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><span class="material-icons">call</span> <span><?php echo $tel_number;?></span></a></span>
			        <?php endif ?>

			        <?php
			        $email_address = get_field('global_email', 'option');
			        if ($email_address): ?>
			            <span class="sh-email d-md-none m-0"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us"><span class="material-icons">mail_outline</span> <span><?php echo $email_address; ?></span></a></span>
			        <?php endif ?>

					<span class="sh-search d-md-none m-0"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search"><span class="material-icons">search</span></a></span> -->

					<?php 
					$rfq_link = get_field('request_quote_link', 'option');
					if( $rfq_link ): ?>
					    <a class="btn btn-on-color d-none d-xl-inline-block m-0" href="<?php echo esc_url( $rfq_link_url ); ?>" target="<?php echo esc_attr( $rfq_link_target ); ?>"><?php echo esc_html( $rfq_link_title ); ?></a>
						<a class="btn btn-on-color d-none d-md-inline-block d-xl-none" href="<?php echo esc_url( $rfq_link_url ); ?>" target="<?php echo esc_attr( $rfq_link_target ); ?>">RFQ</a>
					<?php endif; ?>
				</div>

			</div>
		</nav>
	</div>
</header>