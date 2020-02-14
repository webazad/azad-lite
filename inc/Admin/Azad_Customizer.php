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
        }
        public function register_customize_azad( $wp_customize ) {
            $this->azad_add_panels( $wp_customize );        
            $this->azad_add_sections( $wp_customize );        
            $this->azad_add_settings( $wp_customize );        
            $this->azad_add_controls( $wp_customize );         
        }
        public function azad_add_panels( $wp_customize ) {
            $wp_customize->add_panel('global_panel',array(
                'title'             => __('Global Settings','azad-lite'),
                'description'       => 'Globals',
                'priority'          => 1,
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize->add_panel('footer_panel',array(
                'title'             => __('Footer Panel','azad-lite'),
                'description'       => 'Footer',
                'priority'          => 125,
                'capability'        => 'edit_theme_options'
            ));
        }
        public function azad_add_sections( $wp_customize ) {
            $wp_customize->add_section( 'global_section', array(
                'title'             => __( 'Base Colors', 'azad-lite' ),
                'priority'          => 10,
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            $wp_customize->add_section( 'footer_logo', array(
                'title'    => __( 'Footer logo', 'azad-lite' ),
                'priority' => 101,
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
			$wp_customize->add_section( 'footer_text', array(
                'title'             => __( 'Footer Text', 'azad-lite' ),
                'priority'          => 101,
                'description'       => 'All about footer...', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
        }
        public function azad_add_settings( $wp_customize ) {
            // BASE COLORS
            $wp_customize->add_setting( 'global_settings', array(
                'default'           => true,
            ) );
			$wp_customize->add_setting( 'enable_header_search', array(
                'default'           => true,
            ) );
            $wp_customize->add_setting( 'footer_logo_image', array(
                'default'           => true,
            ) );
			$wp_customize->add_setting( 'copyright_text', array(
                'default'           => 'Write copyright text here...',
                'transport'         => 'refresh',
            ) );
            $wp_customize->add_setting( 'copyright_bg', array(
                'default'           => 'Copyright background is here',
                'transport'         => 'refresh',
            ) );
            $wp_customize->add_setting( 'copyright_color', array(
                'default'           => 'Copyright color is here',
                'transport'         => 'refresh',
            ) );
        }
        public function azad_add_controls( $wp_customize ) {
            // BASE COLORS
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'bg_body', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'bg', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'bg_hover', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'text', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'text_hover', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'black', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'white', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'transparent', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
			$wp_customize->add_control( 'enable_header_search',array(
					'type'     => 'checkbox',
					'section'  => 'global_section',
					'priority' => 10,
					'label'    => __( 'Show search in header', 'twentytwenty' ),
				) );
            // FOOTER LOGO
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'auto_add_featured_image', array(
                'label'             => 'Upload Your Logo',
                'description'       => 'Write something here...',        
                'section'           => 'footer_logo',
                'settings'          => 'footer_logo_image',    
            ) ) );
			$wp_customize->add_control( 'copyright_text',  array(
                'label'             => 'Write copyright text here...',
                'description'       => 'Write copyright text...',        
                'section'           => 'footer_text',
                'type'              => 'text',    
            ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'copyright_bg', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'footer_text',
                'settings'          => 'copyright_bg',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'copyright_color', array(
                'label'             => 'Select text color for footer',
                'description'       => 'Select color...',        
                'section'           => 'footer_text',
                'settings'          => 'copyright_color',    
            ) ) );
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