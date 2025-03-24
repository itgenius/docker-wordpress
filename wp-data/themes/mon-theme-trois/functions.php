<?php
function mon_theme_setup() {
    register_nav_menus(array(
        'main-menu' => __('Menu Principal', 'mon-theme'),
    ));
    
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-template');//Ajout de la prise en charge des images mises en avant
    add_theme_support('page-attributes');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('automatic-feed-links');
    add_image_size('blog-thumbnail', 400, 200, true);


}

add_action('after_setup_theme', 'mon_theme_setup');
function set_custom_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_home()) {
        $query->set('posts_per_page', 3);
    }
}
add_action('pre_get_posts', 'set_custom_posts_per_page');

function custom_blog_query($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_page('blog')) {
        $query->set('post_type', 'post');
        $query->set('posts_per_page', 3);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }
}
add_action('pre_get_posts', 'custom_blog_query');




function mon_theme_scripts() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'mon_theme_scripts');
?>
