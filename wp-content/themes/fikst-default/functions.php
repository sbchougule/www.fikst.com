<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
    '/theme-settings.php',                  // Initialize theme default settings.
    '/setup.php',                           // Theme setup and custom theme supports.
    '/widgets.php',                         // Register widget area.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/template-tags.php',                   // Custom template tags for this theme.
    '/pagination.php',                      // Custom pagination for this theme.
    '/hooks.php',                           // Custom hooks.
    '/extras.php',                          // Custom functions that act independently of the theme templates.
    '/customizer.php',                      // Customizer additions.
    '/custom-comments.php',                 // Custom Comments file.
    '/jetpack.php',                         // Load Jetpack compatibility file.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
    '/woocommerce.php',                     // Load WooCommerce functions.
    '/editor.php',                          // Load Editor functions.
    '/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
    $filepath = locate_template( 'inc' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}


add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function understrap_remove_scripts() {
    wp_dequeue_script( 'understrap-scripts' );
    wp_dequeue_style( 'understrap-styles' );
    
    remove_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );
    remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'material-icons', '//fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp&display=swap' );
	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/production.min.js', array(), $the_theme->get( 'Version' ), true );

    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
    add_image_size( 'block-thumb', 286, 286, true ); // (cropped)
    add_image_size( 'post-thumb', 328, 164, true ); // (cropped)
    add_image_size( 'product_thumb', 400, 250, true ); //(cropped)
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Footer Widgets
function tse_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer Bottom Right Widget Area',
        'id'            => 'footer-bottom-widget-area-right',
        'before_widget' => '<div class="footer-bottom-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'tse_widgets_init' );

// Footer Widgets
function tse_widgets_init1() {

    register_sidebar( array(
        'name'          => 'Destination Page Right Sidebar',
        'id'            => 'destination-page-right-sidebar',
        'before_widget' => '<div class="destination-page-right-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'tse_widgets_init1' );


// Social Widget
function tse_news_register_widget() {
    register_widget( 'tse_social_widget' );
}
add_action( 'widgets_init', 'tse_news_register_widget' );


class tse_social_widget extends WP_Widget {

    function __construct() {

        parent::__construct(

            'tse_social_widget',

            __('Social Icons', ' tse_widget_domain'),

            array( 'description' => __( 'Display Social Icons', 'tse_widget_domain' ), )

        );

    }

    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = $instance['number'];

        echo $args['before_widget'];

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $widget_id = 'widget_' . $args['widget_id'];

        //if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        ?>

        <div class="sf-social-icons">
            <?php
            if( have_rows('social_profiles', $widget_id) ): ?>
                <?php
                while ( have_rows('social_profiles', $widget_id) ) : the_row(); ?>
                    <?php
                    $sf_social_icon = get_sub_field('sp_social_icon');
                    $socialclass = str_replace(' ', '-', get_sub_field('sp_social_profile')); // Replaces all spaces with hyphens.
                    $socialclass = preg_replace('/[^A-Za-z0-9\-]/', '', $socialclass); // Removes special chars.
                    $socialclass = strtolower($socialclass); // Convert to lowercase
                    if (get_sub_field('sp_social_link')) :
                    ?>
                        <a class="<?php echo $socialclass; ?>" href="<?php echo esc_url(get_sub_field('sp_social_link')); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php echo get_field('sp_social_profile'); ?>">
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

        <?php
        echo $args['after_widget'];

    }

    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) )

        $title = $instance[ 'title' ];

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

    <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;

    }

}

//Advanced Custom Fields Options    
if( function_exists('acf_add_options_page') ) {
acf_add_options_page();
}

// Tse Excerpt More
function tse_excerpt_more($more) {
    $more = '...';
    return $more;
}
add_filter('excerpt_more', 'tse_excerpt_more');

// Exclude certain pages from WordPress search results
function tse_search_filter( $query ) {
if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 9,1774,2388,1031 ) );
}
}
add_action( 'pre_get_posts', 'tse_search_filter' );



// Disable WordPress Administration Email verification Screen 
add_filter( 'admin_email_check_interval', '__return_false' );


// Category Image
function category_add_form_fields_callback() {
    $image_id = null;
    ?>

    <div id="category_custom_image"></div>
    <input 
          type="hidden" 
          id="category_custom_image_url"     
          name="category_custom_image_url">
    <div style="margin-bottom: 20px;">
        <span>Category Image </span>
        <a href="#" 
            class="button custom-button-upload" 
            id="custom-button-upload">Upload image</a>
        <a href="#" 
            class="button custom-button-remove" 
            id="custom-button-remove" 
            style="display: none">Remove image</a>
    </div>

<?php 

}

add_action( 'category_add_form_fields', 'category_add_form_fields_callback' );

add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts_callback' );
function admin_enqueue_scripts_callback() {

// WordPress media uploader scripts
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
// our uploader.js 
    wp_enqueue_script('uploaderjs', get_stylesheet_directory_uri() . '/js/uploader.js', array(), "1.0", true);
}

add_action( 'create_term', 'custom_create_term_callback' );

function custom_create_term_callback($term_id) {
    // add term meta data
    add_term_meta( 
        $term_id, 
        'term_image',   
        esc_url($_REQUEST['category_custom_image_url'])
    );

}

function category_edit_form_fields_callback($ttObj, $taxonomy) {

    $term_id = $ttObj->term_id;
    $image = '';
    $image = get_term_meta( $term_id, 'term_image', true );

    ?>
    <tr class="form-field term-image-wrap">
      <th scope="row"><label for="image">Image</label></th>
    <td>
        <?php if ( $image ): ?>
        <span id="category_custom_image">
           <img src="<?php echo $image; ?>" style="width: 100%"/>
        </span>
        <input 
           type="hidden" 
           id="category_custom_image_url" 
           name="category_custom_image_url">
                
        <span>
           <a href="#" 
             class="button custom-button-upload" 
             id="custom-button-upload" 
             style="display: none">Upload image</a>
           <a href="#" class="button custom-button-remove">Remove image</a>                    
        </span>
        <?php else: ?>
        <span id="category_custom_image"></span>
        <input 
            type="hidden" 
            id="category_custom_image_url" 
            name="category_custom_image_url">
        <span>
           <a href="#" 
              class="button custom-button-upload" 
              id="custom-button-upload">Upload image</a>
           <a href="#" 
              class="button custom-button-remove" 
              style="display: none">Remove image</a>
        </span>
        <?php endif; ?>
        </td>
    </tr>
        
    <?php
}
add_action ( 'category_edit_form_fields', 'category_edit_form_fields_callback', 10, 2 );

function edit_term_callback($term_id) {
    $image = '';
    $image = get_term_meta( $term_id, 'term_image' );

    if ( $image )
    update_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );

    else
    add_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );

}

add_action( 'edit_term', 'edit_term_callback' );

add_filter( 'woocommerce_product_tabs', '__return_empty_array', 98 );

add_filter( 'relevanssi_index_custom_fields', 'rlv_remove_unwanted' );
function rlv_remove_unwanted( $fields ) {
    $unwanted_fields[] = 'flexible_content';
    return array_diff( $fields, $unwanted_fields );

}
add_filter( 'acf/the_field/escape_html_optin', '__return_true' );


