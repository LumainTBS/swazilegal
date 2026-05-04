<?php
/**
 * SwaziLegal functions and definitions
 */

if ( ! function_exists( 'swazilegal_setup' ) ) :
    function swazilegal_setup() {
        // Add support for core features
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        
        // Add support for Elementor full-width pages
        add_theme_support( 'elementor-full-width' );
        
        // Register Navigation Menus
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'swazilegal' ),
            'footer'  => __( 'Footer Menu', 'swazilegal' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'swazilegal_setup' );

/**
 * Enqueue scripts and styles.
 */
function swazilegal_scripts() {
    // Fonts and Icons
    wp_enqueue_style( 'swazilegal-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );
    
    // Main Stylesheet
    wp_enqueue_style( 'swazilegal-style-base', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
    wp_enqueue_style( 'swazilegal-main-style', get_stylesheet_uri(), array('swazilegal-style-base'), '1.0.0' );

    // Scripts
    wp_enqueue_script( 'swazilegal-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'swazilegal-scroll-js', get_template_directory_uri() . '/js/scroll-animations.js', array(), '1.0.0', true );

    // Localize data path for JS
    wp_localize_script( 'swazilegal-main-js', 'wpData', array(
        'templateUrl' => get_template_directory_uri(),
        'jsonPath'    => get_template_directory_uri() . '/data/content.json'
    ) );
}
add_action( 'wp_enqueue_scripts', 'swazilegal_scripts' );

/**
 * Filter to allow JSON fetch in JS even without a server (optional but good for local dev)
 */
add_filter( 'upload_mimes', 'swazilegal_mime_types' );
function swazilegal_mime_types( $mimes ) {
    $mimes['json'] = 'application/json';
    return $mimes;
}
