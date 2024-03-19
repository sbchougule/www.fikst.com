<header class="site-header header5">
	<div class="top-line">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-sm-12 col-12">
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
				
				<div class="col-lg-9 text-right d-none d-lg-flex justify-content-end align-items-center">
			        <?php
			        $email_address = get_field('global_email', 'option');
			        if ($email_address): ?>
			            <span class="sh-email"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span><?php echo $email_address; ?></span></a></span>
			        <?php endif ?>

					<?php
			        $tel_number = get_field('global_phone_number','option');
			        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			        <?php if ($tel_number): ?>
			              <span class="sh-ph"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><i class="fa fa-phone" aria-hidden="true"></i> <span><?php echo $tel_number;?></span></a></span>
			        <?php endif ?>

			        <?php 
					$link = get_field('request_quote_link', 'option');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <a class="button btn btn-primary d-none d-lg-inline-block m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	
	<div class="header-inner sh-sticky-wrap">

		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">

				<!-- Your site title as branding in the menu -->
				<?php $logo = get_field('global_company_logo','option'); 
				?>
				<?php if ( ! has_custom_logo() && empty($logo)) { ?>

					<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

					<?php endif; ?>


				<?php } else { ?>
					<div class="sh-logo-wrap">
					<?php
	                if( !empty($logo) ): ?>
	                    <a href="<?php bloginfo('url'); ?>" class="site-logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>"></a>
	                <?php else: 
	                	the_custom_logo();
	                 endif;?>
	                </div>
				<?php } ?><!-- end custom logo -->


				<div class="utility-nav navbar-right d-lg-none">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>
					<?php
			        $tel_number = get_field('global_phone_number','option');
			        $unformatted_tel_number = preg_replace("/[^0-9]/", '', $tel_number);?>
			        <?php if ($tel_number): ?>
			              <span class="sh-ph m-0"><a class="cms_phone" href="tel:<?php echo $unformatted_tel_number;?>" aria-label="Phone Number" title="<?php echo $unformatted_tel_number;?>"><i class="fa fa-phone" aria-hidden="true"></i> <span><?php echo $tel_number;?></span></a></span>
			        <?php endif ?>

			        <?php
			        $email_address = get_field('global_email', 'option');
			        if ($email_address): ?>
			            <span class="sh-email m-0"><a class="cms_email" href="mailto:<?php echo strtolower($email_address); ?>" title="Email Us" aria-label="Email Us"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span><?php echo $email_address; ?></span></a></span>
			        <?php endif ?>

					<span class="sh-search mx-0"><a href="#search" class="search-form-tigger"  data-toggle="search-form"><i class="fa fa-search" aria-hidden="true" aria-label="Search"></i></a></span>
					<?php 
					$link = get_field('request_quote_link', 'option');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <a class="button btn btn-primary d-lg-none px-4 m-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">RFQ</a>
					<?php endif; ?>
				</div>

				<!-- The WordPress Menu goes here -->
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'menu_class'      => 'navbar-nav ml-auto main-menu',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 0,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
					<span class="sh-search d-none d-lg-inline mx-3"><a href="#search" class="search-form-tigger" aria-label="Search"  data-toggle="search-form"><i class="fa fa-search" aria-hidden="true"></i></a></span>
				</div>

			</div>
		</nav>
	</div>
</header>