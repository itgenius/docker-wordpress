<?php get_header(); ?>

<main>
    

    <?php if (is_front_page()) : ?>
        <h1>Bienvenue dans mon thème personnalisé Docker!</h1>
    <?php else : ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>