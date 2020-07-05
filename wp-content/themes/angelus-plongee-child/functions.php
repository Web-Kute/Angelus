<?php
function load_new_jquery() {
    // Load jQuery
    wp_deregister_script( 'jquery' ); // On annule l'inscription du jQuery de WP
    wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1', true );
}
add_action( 'wp_enqueue_scripts', 'load_new_jquery', 100 );

function angelus_register_assets() {
    // Load Bootstrap CSS
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'custom-bootstrap', get_template_directory_uri() . '/bootstrap/dist/css/custom.css' );
    $dependencies = array('bootstrap');
    $parenthandle = 'parent-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.min.css', $dependencies, $theme->parent()->get('Version') ); //Parent Theme style.css
    wp_enqueue_style( 'angelus-plongee-style', get_stylesheet_directory_uri() . '/style.min.css', array($parenthandle), $theme->get('Version') ); //Child Theme style.css

    // Load Custom JS
    wp_enqueue_script( 'angelus_plongee', get_stylesheet_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), '1.0', true );
    // Load Ajax
    // Envoyer une variable de PHP à JS proprement
    // wp_localize_script( 'angelus_plongee', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    wp_localize_script( 'angelus_plongee', 'frontend_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce('ajax-nonce') //protection Number use once
        )
    );
    // Load Slick Carousel JS
    wp_enqueue_script( 'slick-scripts', get_stylesheet_directory_uri() . '/slick/slick.min.js', array( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'angelus_register_assets', 10 );

// Ajax Modal Hook
add_action( 'wp_ajax_load_page_modal', 'angelus_load_page_modal' );
add_action( 'wp_ajax_nopriv_load_page_modal', 'angelus_load_page_modal' );

function angelus_load_page_modal() {
    $post_id = $_POST['post_slug'];
    // Get ID of Posts from slug
    $idm = url_to_postid( site_url($post_id) );
// $post_slug = $_REQUEST['post_slug'];
    global $post;
    $post = get_post($idm);
    setup_postdata($post);
    echo '<h1 class="modal_title">';
        the_title();
    echo '</h1>';
    the_content();
    wp_die();
}
// Bootstrap
function angelus_bootstrap_load() {

    // Load Bootstrap JS
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/dist/js/bootstrap.min.js', $dependencies, '3.3.6', true );
    // Hook bootstrap
    // add_theme_support( 'title-tag' );
}
add_action( 'wp_enqueue_scripts', 'angelus_bootstrap_load');

// Load Animated and Slick CSS
function angelus_animated_enqueue() {
    // Load Slick Carousel CSS
    wp_enqueue_style('style_slick', get_stylesheet_directory_uri() . '/slick/slick.min.css');
    wp_enqueue_style('style_slick_default', get_stylesheet_directory_uri() . '/slick/slick-theme.min.css');
    // Load Animated CSS
    wp_enqueue_style('style_animated', get_stylesheet_directory_uri() . '/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'angelus_animated_enqueue', 20 );

// Load Menus
function register_my_menus() {
    register_nav_menus(array('main-menu' => esc_html__( 'Main Menu', 'underscore' ), 'left-menu' => esc_html__( 'Left Menu', 'underscore' ), 'right-menu' => esc_html__( 'Right Menu', 'underscore' ), 'spots-menu' => esc_html__( 'Spots Menu', 'underscore' )));
}
add_action( 'init', 'register_my_menus' );

// Allow to Load SVG in WP Library
function add_file_types_to_uploads($file_types) {
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
// Disable SideBar on some Articles
function crunchify_code_disable_widgets( $sidebars_widgets ) {
        if (is_single(array(53,41,39,43,47,49,51))) // replace this with post/page ID
                $sidebars_widgets = array( false );
                return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'crunchify_code_disable_widgets' );
// Remove unused files from <head>
remove_action('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wp_resource_hints', 2 );
add_filter( 'emoji_svg_url', '__return_false' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3 );

// Defer Parsing of JavaScript for faster loading
function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, 'min.js' ) ) return $url;
    if ( strpos( $url, 'jquery.min.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );
function shapeSpace_disable_scripts_styles() {
// disable stylesheet
    wp_dequeue_style('jquery-ui-css');
    wp_dequeue_style('jquery-ui-timepicker-addon-css');
    wp_dequeue_style('unslider');
    wp_dequeue_style('unslider-dots');
    wp_dequeue_style('wordpress-file-upload-adminbar-style');
    wp_dequeue_style('dashicons');
    // wp_dequeue_style('admin-bar');
    wp_dequeue_style('frm_fonts');
    wp_dequeue_style('monsterinsights-vue-frontend-style');
// disable scripts
    wp_dequeue_script('wp-tripadvisor-review-slider_unslider-min');
    // wp_dequeue_script('wp-tripadvisor-review-slider_plublic');
    wp_dequeue_script('monsterinsights-frontend-script');
    wp_dequeue_script('jquery-ui-slider');
    wp_dequeue_script('jquery-ui-timepicker-addon-js');
    wp_dequeue_script('jquery-ui-timepicker-addon-min-js');
    wp_dequeue_script('jquery-ui-core-min-js');
    wp_dequeue_script('jquery-ui-datepicker-min-js');
}
add_action('wp_enqueue_scripts', 'shapeSpace_disable_scripts_styles', 100);
