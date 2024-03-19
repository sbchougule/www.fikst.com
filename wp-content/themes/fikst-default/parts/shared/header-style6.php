<header class="site-header header0 header6">
	<div class="top-line">
		<div class="container">
			<div class="row">

				<div class="col-lg-2 col-sm-6 col-xs-6 col-7">
					<div class="social-icons">
			            <?php
			            if( have_rows('social_profiles', 'option') ): ?>
			                <?php
			                while ( have_rows('social_profiles', 'option') ) : the_row(); ?>
			                    <?php
			                    $sf_social_icon = get_sub_field('sp_social_icon');
			                    $socialclass = str_replace(' ', '-', get_sub_field('sp_social_profile')); // Replaces all spaces with hyphens.
			                    $socialclass = preg_replace('/[^A-Za-z0-9\-]/', '', $socialclass); // Removes special chars.
			                    $socialclass = strtolower($socialclass); // Convert to lowercase
			                    if (get_sub_field('sp_social_link')) :
			                    ?>
			                        <a class="<?php echo $socialclass; ?>" href="<?php echo esc_url(get_sub_field('sp_social_link')); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php echo get_sub_field('sp_social_profile'); ?>">
			                    <?php endif ?>
			                            <?php if ($sf_social_icon): ?>
			                                <?php echo $sf_social_icon; ?>
			                            <?php endif ?>
			                    <?php if (get_sub_field('sp_social_link')) : ?>
			                        </a>
			                    <?php endif ?>
			                <?php
			                endwhile; ?>
			            <?php
			            endif;  ?>
			        </div>
				</div>
				<div class="header-topline-menu col-lg-5 navbar-expand-lg navbar-dark d-none d-lg-block">
					<?php wp_nav_menu(
						array(
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => '',
							'menu'			  => 'Top Nav Menu',
							'menu_class'      => 'navbar-nav m-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'top-line-menu',
							'depth'           => 0,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<div class="col-lg-5 col-sm-6 col-xs-6 col-5 text-right">
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

				</div>
			</div>
		</div>
	</div>
	
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
									<span class="material-icons">highlight_off</span>
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
						</div>

						<div class="utility-nav navbar-right">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<span class="material-icons">menu</span>
							</button>
							<?php
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

							<span class="sh-search mx-md-3"><a href="#search" class="search-form-tigger" data-toggle="search-form" aria-label="Search"><span class="material-icons">search</span></a></span>
							<?php 
							$link = get_field('contact_link', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="btn btn-alt2 d-none d-md-inline-block m-0 sh-contact-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							    <a class="btn btn-primary d-md-none m-0 sh-contact-mob-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">Contact</a>
							<?php endif; ?>
							<?php 
							$rfq_link = get_field('request_quote_link', 'option');
							if( $rfq_link ): 
							    $rfq_link_url = $rfq_link['url'];
							    $rfq_link_title = $rfq_link['title'];
							    $rfq_link_target = $rfq_link['target'] ? $rfq_link['target'] : '_self';
							    ?>
							    <a class="btn btn-primary d-none d-md-inline-block m-0 sh-rfq-cta" href="<?php echo esc_url( $rfq_link_url ); ?>" target="<?php echo esc_attr( $rfq_link_target ); ?>"><?php echo esc_html( $rfq_link_title ); ?></a>
							    <a class="btn btn-secondary d-md-none sh-rfq-mob-cta m-0" href="<?php echo esc_url( $rfq_link_url ); ?>" target="<?php echo esc_attr( $rfq_link_target ); ?>">RFQ</a>
							<?php endif; ?>
						</div>

					<?php if ( 'container' == $container ) : ?>
					</div><!-- .container -->
					<?php endif; ?>
			</div>
		</nav>
	</div>
</header>