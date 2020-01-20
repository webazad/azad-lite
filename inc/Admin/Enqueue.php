<?php
namespace Inc\Admin;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Enqueue' ) ):
    class Enqueue{
        private static $_instance;
        public function __construct() {
            echo 'Construct';
        }
        public static function register() {
            echo 'Register';   
        }
        
        public static function get_instance(){
            if(is_null(self::$_instance) && ! isset(self::$_instance) && ! (self::$_instance instanceof self)){
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
        public function __destruct() {}
     }
endif;

if(! function_exists('load_azad_users')){
    function load_azad_users(){
        return Azad_Users::get_instance();
    }
}
//$GLOBALS['azad_users'] = load_azad_users();