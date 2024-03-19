<!--Site Footer Start-->
<footer class="site-footer footer-style1" role="contentinfo">
    <div class="container">
        
        <?php $logo = get_field('global_company_logo','option');?>
        <div class="sf-middle-logo-nav">
            <?php if( !empty($logo) ): ?>
                <div class="order-2"><a href="<?php bloginfo('url'); ?>" class="sf-logo">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
                </a></div>
            <?php endif;?>
            <?php wp_nav_menu(array(
                'menu'            => 'Footer Left Menu',
                'container'       => 'ul',
                'menu_class' => 'sf-links',
            )); ?>
            <?php wp_nav_menu(array(
                'menu'            => 'Footer Right Menu',
                'container'       => 'ul',
                'menu_class' => 'sf-links order-3',
            )); ?>
        </div>

        <ul class="sf-contact-info">
            <?php if(get_field('global_company_name','option')):?>
                <li class="sf-company"><?php echo get_field('global_company_name','option');?></li>
            <?php endif;?>
            <?php if(get_field('global_address','option')):?>
                <li class="sf-address"><?php echo get_field('global_address','option');?></li>
            <?php endif;?>
            <?php $string = get_field('global_phone_number','option');$string = preg_replace("/[^0-9]/", '', $string);
            $sstring = get_field('global_sales','option');$sstring = preg_replace("/[^0-9]/", '', $sstring); ?>
            <?php if ($string): ?>
                <li class="sf-ph">Sales: <a href="tel:<?php echo $string;?>" aria-label="Phone Number"><?php echo get_field('global_phone_number','option');?></a> <?php if ($sstring): ?> | <a href="tel:<?php echo $sstring;?>" aria-label="Phone Number"><?php echo get_field('global_sales','option');?></a><?php endif ?></li>
            <?php endif ?>  
            <?php if(get_field('global_email','option')):?>
            <li>Email: <a href="mailto:<?php echo get_field('global_email','option');?>" class="sf-mail" aria-label="Email Us"><?php echo get_field('global_email','option');?></a></li>
            <?php endif;?>
        </ul>

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
                        <a class="<?php echo $socialclass; ?>" href="<?php echo esc_url(get_sub_field('sp_social_link')); ?>" target="_blank" rel="noreferrer noopener" title="<?php echo get_sub_field('sp_social_profile'); ?>" aria-label="<?php echo get_sub_field('sp_social_profile'); ?>">
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

    <div class="footer-bootom sf-small">
        <div class="container">
            <p class="copyright">&copy; <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>, All Rights Reserved&nbsp; | &nbsp;Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>
        </div>
    </div>
</footer>
<!--Site Footer End-->