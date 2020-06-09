<?php
namespace Azad_Lite;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Enqueue' ) ) :

    class Enqueue{
        private static $_instance;

        public function __construct() {
            add_action( 'wp_enqueue_scripts', array( $this, 'azad_enqueue_scripts' ) );
        }

        public function azad_enqueue_scripts() {

            wp_register_style( 'main', trailingslashit( get_template_directory_uri() ) . 'assets/css/main-style.css', array(), wp_get_theme( 'azad-lite')->get( 'Version' ), 'all' );
            wp_enqueue_style('main');

            wp_register_script( 'menu', trailingslashit( get_template_directory_uri() ) . 'assets/js/toggle-menu.js', array( 'jquery'), wp_get_theme('azad-lite')->get( 'Version' ), true );
            wp_enqueue_script( 'menu' );

            wp_register_script( 'preloader', trailingslashit( get_template_directory_uri() ) . 'assets/js/preloader.js', array('jquery'), wp_get_theme( 'azad-lite' )->get( 'Version' ), true );
            wp_enqueue_script( 'preloader' );

            wp_register_script( 'index', trailingslashit( get_template_directory_uri() ) . 'assets/js/index.js', array( 'jquery' ), wp_get_theme( 'azad-lite' )->get( 'Version' ), true );
            wp_enqueue_script( 'index' );
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