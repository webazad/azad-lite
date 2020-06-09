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
defined( 'ABSPATH' ) || exit;

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
            // GLOBAL PANEL
            $wp_customize->add_panel( 'global_panel', array(
                'title'             => __( 'Global Settings', 'azad-lite' ),
                'description'       => 'Globals',
                'priority'          => 21,
                'capability'        => 'edit_theme_options'
            ) );
            // HEADER PANEL
            $wp_customize->add_panel( 'header_panel', array(
                'title'             => __( 'Header Panel', 'azad-lite' ),
                'description'       => 'Header ...',
                'priority'          => 100,
                'capability'        => 'edit_theme_options'
            ) );
            // FOOTER PANEL
            $wp_customize->add_panel( 'footer_panel', array(
                'title'             => __( 'Footer Panel', 'azad-lite' ),
                'description'       => 'Footer',
                'priority'          => 125,
                'capability'        => 'edit_theme_options'
            ) );
        }
        public function azad_add_sections( $wp_customize ) {
            // PRELOADER SECTION
            $wp_customize->add_section( 'preloader_section', array(
                'title'             => __( 'Activate Preloader', 'azad-x' ),
                'description'       => 'Preloader loads before sites load entirely. Sometimes you can show varius preloader to your traffics.', 
                'priority'          => 5,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // SEARCH ICON SECTION
            $wp_customize->add_section( 'search_section', array(
                'title'             => __( 'Enable search icon', 'azad-x' ),
                'description'       => 'Enable search ion ...', 
                'priority'          => 5,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // BASECOLOR SECTION
            $wp_customize->add_section( 'global_section', array(
                'title'             => __( 'Base Colors', 'azad-lite' ),
                'description'       => 'Write something here...', 
                'priority'          => 16,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // HEADER LOGO SECTION
            $wp_customize->add_section( 'header_logo', array(
                'title'             => __( 'Header logo', 'azad-lite' ),
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'header_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // FOOTER LOGO SECTION
            $wp_customize->add_section( 'footer_logo', array(
                'title'             => __( 'Footer logo', 'azad-lite' ),
                'description'       => 'Write something here...', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // FOOTER TEXT SECTION
			$wp_customize->add_section( 'footer_text', array(
                'title'             => __( 'Footer Text', 'azad-lite' ),
                'description'       => 'All about footer...', 
                'priority'          => 12,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
        }
        public function azad_add_settings( $wp_customize ) {
            // PRELOADER SETTING
            $wp_customize->add_setting( 'preloader_settings', array(
                'default'           => true,
                'transport'         => 'refresh',
            ) );
            // BASE COLORS SETTING
            $wp_customize->add_setting( 'global_settings', array(
                'default'           => true,
            ) );
            // SEARCH SETTING
			$wp_customize->add_setting( 'header_search_icon', array(
                'default'           => true,
            ) );
            // PRELOADER SETTING
            $wp_customize->add_setting( 'header_logo_image', array(
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
            // GLOBAL CONTROLS        
            $wp_customize->add_control( new \WP_Customize_Control( $wp_customize, 'enable_preloader', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'preloader_section',
                'settings'          => 'preloader_settings', 
                'type'              => 'checkbox', 
            ) ) );
            // ENABLE HEADER SEARCH ICON
            $wp_customize->add_control( new \WP_Customize_Control( $wp_customize, 'enable_header_search', array(
                'label'             => 'Enable header search icon',
                'description'       => 'Enable it ...',        
                'section'           => 'search_section',
                'settings'          => 'header_search_icon', 
                'type'              => 'checkbox', 
            ) ) );
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
			// HEADER CONTROL
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'header_featured_image', array(
                'label'             => 'Upload Your Logo',
                'description'       => 'Write something here...',        
                'section'           => 'header_logo',
                'settings'          => 'header_logo_image',    
            ) ) );
            // FOOTER CONTROLS
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
        public static function get_instance() {
            if ( is_null( self::$_instance ) && ! isset( self::$_instance ) && ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();            
            }
            return self::$_instance;
        }
        public function __destruct() {}
    }

endif;

if ( ! function_exists( 'load_azad_customizer' ) ) {
    function load_azad_customizer() {
        return Azad_Customizer::get_instance();
    }
}
//$GLOBALS['widgets'] = load_azad_customizer();