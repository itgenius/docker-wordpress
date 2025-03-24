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

//Pour tester une API externe 👍
function tester_http_wordpress() {
    $url = 'https://jsonplaceholder.typicode.com/posts/1'; // URL d'une API externe factice
    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return 'Erreur : ' . $response->get_error_message();
    }

    $body = wp_remote_retrieve_body($response);
    return json_decode($body, true);
}

// Tester dans le tableau de bord WordPress
add_action('admin_notices', function() {
    echo '<pre>';
    print_r(tester_http_wordpress());
    echo '</pre>';
});

//Récupérer les données de l'API externe

function obtenir_articles_api() {
    $url = 'https://jsonplaceholder.typicode.com/posts';

    // Effectuer la requête GET
    $response = wp_remote_get($url);

    // Vérifier s'il y a une erreur
    if (is_wp_error($response)) {
        return 'Erreur API : ' . $response->get_error_message();
    }

    // Récupérer le contenu JSON et le convertir en tableau PHP
    $body = wp_remote_retrieve_body($response);
    $articles = json_decode($body, true);

    // Vérifier si des articles ont été récupérés
    if (empty($articles)) {
        return 'Aucun article trouvé.';
    }

    // Afficher la liste des articles
    $output = '<ul>';
    foreach ($articles as $article) {
        $title = esc_html($article['title']);
        $output .= "<li>$title</li>";
    }
    $output .= '</ul>';

    return $output;
}

// Ajouter un shortcode pour afficher les articles n'importe où sur WordPress
add_shortcode('api_articles', 'obtenir_articles_api');

//Ajouter des données dans une API externe 
function envoyer_article_api() {
    $url = 'https://jsonplaceholder.typicode.com/posts';

    $data = array(
        'title' => 'Article ajouté depuis WordPress',
        'body' => 'Ceci est un test d\'envoi de données via l\'API.',
        'userId' => 1
    );

    // Effectuer la requête POST
    $response = wp_remote_post($url, array(
        'body'    => json_encode($data),
        'headers' => array(
            'Content-Type' => 'application/json'
        )
    ));

    // Vérifier s'il y a une erreur
    if (is_wp_error($response)) {
        return 'Erreur API : ' . $response->get_error_message();
    }

    // Récupérer la réponse
    $body = wp_remote_retrieve_body($response);
    $result = json_decode($body, true);

    return '<pre>' . print_r($result, true) . '</pre>';
}

// Ajouter un shortcode pour tester l'envoi de données
add_shortcode('envoyer_article', 'envoyer_article_api');


function mon_theme_scripts() {
    wp_enqueue_style('mon-theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'mon_theme_scripts');
?>
