<?php if (get_field('show_site_intro')): ?>
<div class="site-intro carousel-with-content content-on-carousel" data-ride="carousel">
    <div class="carousel-inner cwc-carousel">
        <div class="carousel-item active"
            <?php if( get_field('cwc_bg') ): ?>style="background-image: url(<?php echo get_field('cwc_bg') ?>);"
            <?php endif; ?>>
            <div class="container">
                <div class="row">
                    <div class="carousel-content col-md-12">
                        <?php if (get_field('cwc_title')): ?>
                        <h1 class="cwc-title"><?php echo get_field('cwc_title'); ?></h1>
                        <?php endif ?>
                        <?php if (get_field('cwc_sub_title')): ?>
                        <div class="cwc-subtitle"><?php echo get_field('cwc_sub_title'); ?></div>
                        <?php endif ?>
                        <?php 
                        $link = get_field('cwc_cta1');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="btn-primary cwc-cta1" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif ?>