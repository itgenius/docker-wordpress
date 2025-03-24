<?php get_header(); ?>

<main>
    <article>
        <h1><?php the_title(); ?></h1>
        <div class="meta">
            Posté le <?php the_date(); ?> par <?php the_author(); ?>
        </div>
        <?php the_content(); ?>
    </article>
</main>

<?php get_footer(); ?>