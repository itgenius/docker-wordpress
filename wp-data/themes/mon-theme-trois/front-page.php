<?php get_header(); ?>

<main class="homepage">
    <section class="hero">
        <div class="container">
            <h1>Bienvenue sur notre site</h1>
            <p>Découvrez nos services, nos actualités et bien plus encore. Nous sommes là pour répondre à vos besoins.</p>
            <a href="/contact" class="btn-primary">Nous contacter</a>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2>À propos de nous</h2>
            <p>Nous offrons des solutions innovantes pour vous accompagner dans votre projet. Notre expertise nous permet de vous proposer des services de qualité adaptés à vos besoins.</p>
        </div>
    </section>

    <section class="latest-posts">
        <div class="container">
            <h2>Nos derniers articles</h2>
            <div class="articles-grid">
                <?php
                $recent_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                        <article class="blog-column">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                </div>
                            <?php endif; ?>

                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun article trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php 
get_footer(); ?>