<?php
/**
*----------------------------
* :: @package azad-lite
* :: @version 1.0.0
*----------------------------
*/

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

define( 'AZAD_LITE_NAME', wp_get_theme()->get( 'Name' ) );
define( 'AZAD_LITE_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'AZAD_LITE_TEXTDOMAIN', wp_get_theme()->get( 'TextDomain' ) );
define( 'AZAD_LITE_DIR', trailingslashit( get_template_directory() ) );
define( 'AZAD_LITE_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( class_exists( 'Azad_Lite\\Init' ) ) :    
    Azad_Lite\Init::register_services();
endif;

require_once AZAD_LITE_DIR . '/inc/azad-hooks.php';