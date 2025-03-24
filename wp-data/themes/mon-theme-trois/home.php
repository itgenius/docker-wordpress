<?php get_header(); ?>

<main class="blog-page">
    <h1><?php single_post_title(); ?></h1>

    <div class="services-container">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $blog_query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'paged'          => $paged
        ));

        if ($blog_query->have_posts()) :
            while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <div class="service">
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium', array('class' => 'service-image'));
                    } else { 
                        echo '<img src="' . get_template_directory_uri() . '/assets/default.jpg" alt="Image non disponible" class="service-image">';
                    }
                    ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="contact-link">Lire la suite →</a>
                </div>
            <?php endwhile;

            wp_reset_postdata();
        else : ?>
            <p>Aucun article trouvé</p>
        <?php endif; ?>
    </div>

    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $blog_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_text' => '« Précédent',
            'next_text' => 'Suivant »',
        ));
        ?>
    </div>
</main>

<?php get_footer(); ?>