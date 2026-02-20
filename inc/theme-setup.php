<?php
// inc/theme-setup.php

if ( ! defined( 'ABSPATH' ) ) exit;

function nexus_theme_setup() {

    // WordPress maneja el <title> automáticamente
    add_theme_support( 'title-tag' );

    // Imágenes destacadas (thumbnails) en posts y páginas
    add_theme_support( 'post-thumbnails' );

    // Tamaños de imagen personalizados para el portfolio
    add_image_size( 'nexus-project-card',   800,  600,  true ); // crop exacto
    add_image_size( 'nexus-project-hero',   1920, 1080, true );
    add_image_size( 'nexus-project-thumb',  400,  300,  true );

    // HTML5 semántico
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // Soporte para el editor de bloques (Gutenberg)
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    // Tu paleta de colores en el editor
    add_theme_support( 'editor-color-palette', [
        [
            'name'  => __( 'AI Purple',    'nexus-ai' ),
            'slug'  => 'ai-purple',
            'color' => '#7C3AED',
        ],
        [
            'name'  => __( 'Neon Cyan',    'nexus-ai' ),
            'slug'  => 'neon-cyan',
            'color' => '#06B6D4',
        ],
        [
            'name'  => __( 'Dark Base',    'nexus-ai' ),
            'slug'  => 'dark-base',
            'color' => '#0A0A0F',
        ],
        [
            'name'  => __( 'Light Gray',   'nexus-ai' ),
            'slug'  => 'light-gray',
            'color' => '#F1F5F9',
        ],
        [
            'name'  => __( 'White',        'nexus-ai' ),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ],
    ]);

    // Tipografías en el editor
    add_theme_support( 'editor-font-sizes', [
        [ 'name' => __( 'Small',    'nexus-ai' ), 'slug' => 'small',    'size' => 14 ],
        [ 'name' => __( 'Normal',   'nexus-ai' ), 'slug' => 'normal',   'size' => 16 ],
        [ 'name' => __( 'Large',    'nexus-ai' ), 'slug' => 'large',    'size' => 24 ],
        [ 'name' => __( 'Huge',     'nexus-ai' ), 'slug' => 'huge',     'size' => 48 ],
    ]);

    // Menus de navegación
    register_nav_menus([
        'primary' => __( 'Primary Navigation',  'nexus-ai' ),
        'footer'  => __( 'Footer Navigation',   'nexus-ai' ),
        'social'  => __( 'Social Media Links',  'nexus-ai' ),
    ]);

    // Traducciones
    load_theme_textdomain( 'nexus-ai', NEXUS_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'nexus_theme_setup' );


// ─── Registrar áreas de widgets ───────────────────────────────────────────────
function nexus_register_sidebars() {
    register_sidebar([
        'id'            => 'footer-col-1',
        'name'          => __( 'Footer Column 1', 'nexus-ai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action( 'widgets_init', 'nexus_register_sidebars' );