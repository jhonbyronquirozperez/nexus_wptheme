<?php
/**
 * Nexus AI Agency - Functions
 *
 * Este archivo actúa como punto de entrada.
 * Toda la lógica vive en archivos separados dentro de /inc/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─── Constantes globales del tema ────────────────────────────────────────────
define( 'NEXUS_VERSION', '1.0.0' );
define( 'NEXUS_DIR',     get_template_directory() );
define( 'NEXUS_URI',     get_template_directory_uri() );
define( 'NEXUS_INC',     NEXUS_DIR . '/inc/' );

// ─── Cargar módulos ───────────────────────────────────────────────────────────
$nexus_modules = [
    'theme-setup',       // Soporte de características WP
    'enqueue',           // Scripts y estilos
    'custom-post-types', // CPTs y taxonomías
    'customizer',        // Panel de opciones del tema
    'ajax-handlers',     // Endpoints AJAX
    'helpers',           // Funciones de utilidad reutilizables
];

foreach ( $nexus_modules as $module ) {
    $file = NEXUS_INC . $module . '.php';
    if ( file_exists( $file ) ) {
        require_once $file;
    }
}