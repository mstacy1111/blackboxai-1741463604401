<?php
if (!defined('ABSPATH')) exit;

// Include customizer settings
require get_template_directory() . '/inc/customizer.php';

function makers_momentum_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'makers-momentum'),
        'footer' => __('Footer Menu', 'makers-momentum')
    ));
}
add_action('after_setup_theme', 'makers_momentum_setup');

function makers_momentum_enqueue_scripts() {
    // Enqueue Tailwind CSS from CDN
    wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), null);
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), null);
    
    // Enqueue theme's main stylesheet
    wp_enqueue_style('makers-momentum-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom JavaScript
    wp_enqueue_script('makers-momentum-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'makers_momentum_enqueue_scripts');

// Register widget areas
function makers_momentum_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'makers-momentum'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer.', 'makers-momentum'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="text-lg font-semibold mb-4">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'makers-momentum'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer.', 'makers-momentum'),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="text-lg font-semibold mb-4">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'makers_momentum_widgets_init');

// Custom post type for Services
function makers_momentum_register_post_types() {
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Services', 'makers-momentum'),
            'singular_name' => __('Service', 'makers-momentum')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-cart'
    ));
}
add_action('init', 'makers_momentum_register_post_types');
