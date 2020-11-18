<?php
namespace Azad_Lite;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Enqueue' ) ) :

    class Enqueue {
        private static $_instance;

        public function __construct() {
            add_action( 'wp_enqueue_scripts', array( $this, 'azad_enqueue_scripts' ) );
            add_action( 'customize_preview_init', array( $this, 'azad_customize_preview' ) );
        }

        public function azad_customize_preview() {

            wp_register_script(
                'customize_preview',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/customize_preview.min.js',
                array( 'jquery', 'customize-preview' ),
                wp_get_theme('azad-lite')->get( 'Version' ),
                true
            );
            wp_enqueue_script( 'customize_preview' );

        }

        public function azad_enqueue_scripts() {

            wp_register_style(
                'main',
                trailingslashit( get_template_directory_uri() ) . 'assets/css/main-style.min.css',
                array(),
                wp_get_theme( 'azad-lite')->get( 'Version' ),
                'all'
            );
            wp_enqueue_style('main');
            
            wp_register_script(
                'toggles',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/toggles.min.js',
                array( 'jquery' ),
                wp_get_theme( 'azad-lite' )->get( 'Version' ),
                true
            );
            // wp_enqueue_script( 'toggles' );

            wp_register_script(
                'activation',
                trailingslashit( get_template_directory_uri() ) . 'assets/js/activation.min.js',
                array('jquery'),
                wp_get_theme( 'azad-lite' )->get( 'Version' ),
                true
            );
            wp_enqueue_script( 'activation' );

        }
        
        public static function get_instance() {
            if ( is_null( self::$_instance ) && ! isset( self::$_instance ) && ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();            
            }
            return self::$_instance;
        }

        public function __destruct() {}
        
     }

endif;

if ( ! function_exists( 'load_azad_enqueue' ) ) {
    function load_azad_enqueue() {
        return Enqueue::get_instance();
    }
}
//$GLOBALS['azad_users'] = load_azad_enqueue();