<?php
function mon_theme_setup() {
    register_nav_menus(array(
        'main-menu' => __('Menu Principal', 'mon-theme'),
    ));
}

add_action('after_setup_theme', 'mon_theme_setup');

?>
