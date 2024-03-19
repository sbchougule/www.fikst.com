<!--Site Footer Start-->
<footer class="site-footer footer-style3" role="contentinfo">
    <div class="container">
        <div class="row sf-top-wrap">
            <div class="col-12">
                <ul class="sf-contact-info">
                    <?php if(get_field('global_address','option')):?>
                        <li class="sf-address"><?php echo get_field('global_address','option');?></li>
                    <?php endif;?>

                    <?php $string = get_field('global_phone_number','option');$string = preg_replace("/[^0-9]/", '', $string);?>
                    <?php if ($string): ?>
                        <li class="sf-ph"><a href="tel:<?php echo $string;?>" aria-label="<?php echo get_field('global_phone_number','option');?>"><?php echo get_field('global_phone_number','option');?></a></li>
                    <?php endif ?>                 

                    <?php if (get_field('global_fax','option')): ?>
                        <li class="sf-fax"><?php echo get_field('global_fax','option');?></li>
                    <?php endif;?>

                    <?php if(get_field('global_email','option')):?>
                        <li><a href="mailto:<?php echo get_field('global_email','option');?>" class="sf-mail" aria-label="<?php echo get_field('global_email','option');?>"><?php echo get_field('global_email','option');?></a></li>
                    <?php endif;?>
                </ul>

                <?php wp_nav_menu(array(
                    'menu'            => 'Footer Left Menu',
                    'container'       => 'ul',
                    'menu_class' => 'sf-links',
                )); ?>

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
        </div>

        <p class="copyright">&copy; <?php echo date("Y"); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>, All Rights Reserved&nbsp;|&nbsp;Site created by <a href="https://business.thomasnet.com/marketing-services" target="_blank" rel="noreferrer noopener">Thomas Marketing Services</a></p>
    </div>
</footer>
<!--Site Footer End-->