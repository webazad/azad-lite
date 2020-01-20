<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-----------------------------------------------------------------------------
*/
namespace Inc;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Azad_Supports' ) ):
    class Azad_Supports{
        public static $_instance = null;
        public function __construct() {
            add_action('after_setup_theme',array($this,'azad_supports'));
        }
        public function azad_supports(){
            //  1.. TO SHOW TITLE TAG
            if(function_exists('add_theme_support')){
                add_theme_support('title-tag');
            }
            // 2.. TO ADD CUSTOM HEADER
            if(function_exists('add_theme_support')){
                $defaults = array(
                    'height'      => 100,
                    'width'       => 400,
                    'flex-height' => true,
                    'flex-width'  => true,
                    'header-text' => array( 'site-title', 'site-description' )
                );
                add_theme_support('custom-logo', $defaults);
            }
            // 3.. TO SUPPORT FEATURED IMAGES
            if(function_exists('add_theme_support')){
                add_theme_support( 'post-thumbnails', array( 'post', 'page', 'sliders', 'portfolio', 'promotion' ) );
            }
            // 3.. TO SUPPORT CUSTOM COLOR
            if(function_exists('add_theme_support')){
                add_theme_support( 'editor-color-palette', 
                    array( 
                        array('name' => 'White','slug' => 'white','color' => '#ffffff'),
                        array('name' => 'Black','slug' => 'black','color' => '#000000'),
                        array('name' => 'Blue','slug' => 'blue','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff'),
                        array('name' => 'Yellow','slug' => 'yellow','color' => '#05b4ff')
                    )
                );
            }
            // 3.. TO SUPPORT CUSTOM FONT SOZES
            if(function_exists('add_theme_support')){
                // add_theme_support( 'editor-font-sizes', 
                //     array( 
                //         array('name' => 'Normal','slug' => 'normal','size' => 56),
                //         array('name' => 'Normal','slug' => 'normal','size' => 56),
                //         array('name' => 'Normal','slug' => 'normal','size' => 56),
                //         array('name' => 'Normal','slug' => 'normal','size' => 56),
                //         array('name' => 'Normal','slug' => 'normal','size' => 56)
                //     )
                // );
            } 
            // 4.. MULTIPLE MENU REGISTER SYSTEM
            if(function_exists('register_nav_menus')){
                register_nav_menus(array(
                    'header_menu_one'   => __('Header Menu One', 'azad-lite'),
                    'sidebar_menu_one' => __('Sidebar Menu One', 'azad-lite'),
                    'footer_menu_one'  => __('Footer Menu One', 'azad-lite'),
                    'footer_menu_two'  => __('Footer Menu Two', 'azad-lite'),
                    'footer_menu_three'=> __('Footer Menu Three', 'azad-lite'),
                    'footer_menu_four' => __('Footer Menu Four', 'azad-lite')
                ));
            } 
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

if(! function_exists('load_azad_supports')){
    function load_azad_supports(){
        return Azad_Supports::get_instance();
    }
}
//$GLOBALS['supports'] = load_azad_supports();