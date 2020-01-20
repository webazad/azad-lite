<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/
namespace Inc;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Init' ) ):
    final class Init{
        public $theme_name;
        public function __construct() {}
        public static function get_services() {
            return [
                Azad_Supports::class,
                Enqueue::class,
                Admin\Widgets::class,
                Admin\Azad_Customizer::class,
                Admin\Azad_Users::class,
                //Admin\Custom_Posts::class
            ];   
        }
        public static function register_services() {
            foreach(self::get_services() as $class){
                $service = self::instantiate($class);
                if(method_exists($service,'register')){
                    $service->register();
                }
            }
        }
        private static function instantiate($class) {
            $service = new $class();
            return $service;
        }
        public function __destruct() {}
    }
    
endif;