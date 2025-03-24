<?php get_header(); ?>

<main class="single-post-page">
    <section class="hero">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <div class="post-meta">
                Posté le <?php the_date(); ?> par <?php the_author(); ?>
            </div>
        </div>
    </section>

    <section class="single-post-content">
        <div class="container">
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                </div>
            <?php endif; ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <div class="post-navigation">
                <div class="nav-previous"><?php previous_post_link('%link', '← Article précédent'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Article suivant →'); ?></div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>