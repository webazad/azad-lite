<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
* :: TO REGISTER WIDGETS IN SIDEBARS OR IN FOOTER OR ANYWHERE IN THE PAGE 
*-----------------------------------------------------------------------------
*/
namespace Inc\Admin;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Azad_Customizer' ) ):
    class Azad_Customizer{
        private static $_instance;
        public function __construct() {
			add_action( 'customize_register', array( $this, 'register_customize_azad' ) );
            //https://wordpress.stackexchange.com/questions/340639/fatal-error-class-wp-customize-image-control-not-found
        }
        public function register_customize_azad( $wp_customize ) {
            $this->azad_add_panels( $wp_customize );        
            $this->azad_add_sections( $wp_customize );        
            $this->azad_add_settings( $wp_customize );        
            $this->azad_add_controls( $wp_customize );         
        }
        public function azad_add_panels( $wp_customize ) {
            $wp_customize->add_panel('footer_panel',array(
                'title'             => __('Footer Panel','azad'),
                'description'       => 'Footer',
                'priority'          => 10,
                'capability'        => 'edit_theme_options'
            ));
        }
        public function azad_add_sections( $wp_customize ) {
            $wp_customize->add_section( 'footer_logo', array(
                'title'    => __( 'Footer logo', 'twentytwelve-child' ),
                'priority' => 101,
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
			$wp_customize->add_section( 'footer_text', array(
                'title'             => __( 'Footer Text', 'twentytwelve-child' ),
                'priority'          => 101,
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
        }
        public function azad_add_settings( $wp_customize ) {
            $wp_customize->add_setting( 'footer_logo_image', array(
                'default'           => true,
            ) );
			$wp_customize->add_setting( 'copyright_text', array(
                'default'           => 'Write copyright text here...',
                'transport'         => 'refresh',
            ) );
        }
        public function azad_add_controls( $wp_customize ) {
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'auto_add_featured_image', array(
                'label'             => 'Upload Your Logo',
                'description'       => 'Write something here...',        
                'section'           => 'footer_logo',
                'settings'          => 'footer_logo_image',    
            ) ) );
			$wp_customize->add_control( 'copyright_text',  array(
                'label'             => 'Write copyright text here...',
                'description'       => 'Write something here...',        
                'section'           => 'footer_text',
                'type'              => 'text',    
            ) );
        }
        public static function register() {
            //echo 'Register';   
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

if(! function_exists('load_azad_customizer')){
    function load_azad_customizer(){
        return Azad_Customizer::get_instance();
    }
}
//$GLOBALS['widgets'] = load_azad_customizer();