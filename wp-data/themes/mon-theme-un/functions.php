<?php
function mon_theme_setup() {
    register_nav_menus(array(
        'main-menu' => __('Menu Principal', 'mon-theme'),
    ));
    
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mon_theme_setup');

function mon_theme_scripts() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'mon_theme_scripts');
?>