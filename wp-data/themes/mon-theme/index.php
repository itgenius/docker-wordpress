<?php
get_header();
?>
<main>
    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container'      => false,
            'menu_class'     => 'nav-menu',
        ));
        ?>
    </nav>
    <h1>Bienvenue dans mon thème personnalisé Docker!</h1>
</main>
<?php
get_footer();
?>
