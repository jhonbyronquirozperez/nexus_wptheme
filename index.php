<?php
/**
 * Nexus AI Agency
 * index.php — fallback requerido por WordPress
 * El tema usa plantillas específicas (page-templates/) para cada página.
 */

// Si alguien llega aquí directamente, redirigir al inicio
if ( ! defined( 'ABSPATH' ) ) {
    wp_redirect( home_url() );
    exit;
}

get_header();
?>

<main class="site-main container">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No content found.', 'nexus-ai' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>