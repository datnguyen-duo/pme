<?php
if ( ! function_exists( 'site_setup' ) ):
    function site_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Header' ),
                'menu-4' => esc_html__( 'Header Mobile' ),
                'menu-2' => esc_html__( 'Footer - Primary' ),
                'menu-3' => esc_html__( 'Footer - Secondary' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'site_setup' );

function site_scripts() {
    // Change version to help in cache clearing
    wp_enqueue_style('site-style', get_theme_file_uri('/build/main.css'), '', '1.0.9');
    // Change version to help in cache clearing
    wp_enqueue_script('main-js-file', get_theme_file_uri('/build/main.js'), '', '1.0.9', true);
    wp_localize_script('main-js-file','site_data',array(
        'site_url' => site_url(),
        'theme_url' => get_template_directory_uri(),
    ));
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

require_once('inc/helpers.php');
require_once('inc/acf.php');

/**
 * Add custom parameters
 */
//add_filter('query_vars', 'registering_custom_query_var');
//function registering_custom_query_var($query_vars) {
//    $query_vars[] = 'my-page';
//    return $query_vars;
//}


/**
 * Custom logo for login page
 */
function custom_logo()
{
    echo
        '<style type="text/css">
            h1 a {  
                background-image:url('.get_template_directory_uri().'/src/images/logo.svg)!important;
                height: 120px !important; 
                width: 320px !important;
                background-repeat: no-repeat !important;
                background-position: center !important;
                background-size: 100px !important;
                border: 1px solid #c3c4c7;
                background-color: #fff;
                box-sizing: border-box;
            }       
        </style>';
}
add_action('login_head',  'custom_logo');
/**
 * END
 */

/**
 * Add a post display state for special pages in the page list table.
 *
 * @param array   $post_states An array of post display states.
 * @param WP_Post $post        The current post object.
 */
function theme_add_display_post_states( $post_states, $post ) {
    if ( str_contains(get_page_template_slug(), 'service') ) {
        $post_states['theme_practice_area_page'] = __( 'Service', 'theme' );
    }
    return $post_states;
}
add_filter( 'display_post_states', 'theme_add_display_post_states', 10, 2 );