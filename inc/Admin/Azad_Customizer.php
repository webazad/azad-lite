<?php
/**
*-----------------------------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
* :: TO REGISTER WIDGETS IN SIDEBARS OR IN FOOTER OR ANYWHERE IN THE PAGE 
*-----------------------------------------------------------------------------
*/
namespace Azad_Lite\Admin;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Azad_Customizer' ) ) :

    class Azad_Customizer {

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
            // SEARCH ICON
            $wp_customize->add_section( 'search_section', array(
                'title'             => __( 'Enable search icon', 'azad-x' ),
                'description'       => 'Enable search ion ...', 
                'priority'          => 5,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // SITE COLORS
            $wp_customize->add_section( 'global_section', array(
                'title'             => __( 'Base Colors', 'azad-lite' ),
                'description'       => 'Write something here...', 
                'priority'          => 16,
                'panel'             => 'global_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // DESKTOP HEADER
            $wp_customize->add_section( 'desktop_header', array(
                'title'             => __( 'Desktop Header', 'azad-lite' ),
                'description'       => 'Desktop Header Customization Is Here...', 
                'priority'          => 11,
                'panel'             => 'header_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // RESPONSIVE HEADER
            $wp_customize->add_section( 'responsive_header', array(
                'title'             => __( 'Responsive Header', 'azad-lite' ),
                'description'       => 'Responsive Header Customization Is Here...',
                'priority'          => 11,
                'panel'             => 'header_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // FOOTER SECTION
            $wp_customize->add_section( 'footer_section', array(
                'title'             => __( 'Footer Section', 'azad-lite' ),
                'description'       => 'Entire footer customization is here', 
                'priority'          => 11,
                'panel'             => 'footer_panel',
                'capability'        => 'edit_theme_options'
            ) );
            // COPYRIGHT SECTION
			$wp_customize->add_section( 'copyright_section', array(
                'title'             => __( 'Copyright Section', 'azad-lite' ),
                'description'       => 'All about coppyright section...', 
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
            // DESKTOP HEADER
            $wp_customize->add_setting( 'dh_logo_width', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'dh_logo_height', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'dh_padding_top', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'dh_padding_bottom', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'dh_bg', array(
                'default'           => '#ffffff',
                'transport'         => 'postMessage'
            ) );
            // RESPONSIVE HEADER
            $wp_customize->add_setting( 'rh_logo_width', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'rh_logo_height', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'rh_padding_top', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'rh_padding_bottom', array(
                'default'           => '',
            ) );
            $wp_customize->add_setting( 'rh_bg', array(
                'default'           => '#ffffff',
                'transport'         => 'postMessage'
            ) );
            // FOOTER SETTINGS
            $wp_customize->add_setting( 'footer_bg_image', array(
                'default'           => '',
                'transport'         => 'postMessage',
            ) );
            $wp_customize->add_setting( 'footer_bg_color', array(
                'default'           => 'transparent',
                'transport'         => 'postMessage',
                // 'transport'         => 'refresh',
            ) );
            $wp_customize->add_setting( 'footer_text_color', array(
                'default'           => '#000000',
                'transport'         => 'postMessage',
                // 'transport'         => 'refresh',
            ) );
			$wp_customize->add_setting( 'copyright_text', array(
                'default'           => 'Write copyright text here...',
                'transport'         => 'postMessage',
                // 'transport'         => 'refresh',
            ) );
            $wp_customize->add_setting( 'copyright_bg_color', array(
                'default'           => '#ffffff',
                'transport'         => 'postMessage',
                // 'transport'         => 'refresh',
            ) );
            $wp_customize->add_setting( 'copyright_text_color', array(
                'default'           => '#000000',
                'transport'         => 'postMessage',
                // 'transport'         => 'refresh',
            ) );
        }

        public function azad_add_controls( $wp_customize ) {    
            // ENABLE PRELOADER        
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
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'text', array(
                'label'             => 'Select background color for footer',
                'description'       => 'Select color...',        
                'section'           => 'global_section',
                'settings'          => 'global_settings',    
            ) ) );
            // DESKTOP HEADER
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'dh_logo_width', array(
                'label'             => 'Desktop Header Logo Width',
                'description'       => 'Desktop header logo width...',        
                'section'           => 'desktop_header',
                'settings'          => 'dh_logo_width',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'dh_logo_height', array(
                'label'             => 'Desktop Header Logo Width',
                'description'       => 'Desktop header logo width...',        
                'section'           => 'desktop_header',
                'settings'          => 'dh_logo_height',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'dh_padding_top', array(
                'label'             => 'Desktop Header Logo Width',
                'description'       => 'Desktop header logo width...',        
                'section'           => 'desktop_header',
                'settings'          => 'dh_padding_top',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'dh_padding_bottom', array(
                'label'             => 'Desktop Header Logo Width',
                'description'       => 'Desktop header logo width...',        
                'section'           => 'desktop_header',
                'settings'          => 'dh_padding_bottom',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'dh_bg', array(
                'label'             => 'Desktop Header Background Color',
                'description'       => 'Select desktop header background color...',        
                'section'           => 'desktop_header',
                'settings'          => 'dh_bg',    
            ) ) );
            // RESPONSIVE HEADER
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'rh_logo_width', array(
                'label'             => 'Responsive Header Logo Width',
                'description'       => 'Responsive header logo with here...',        
                'section'           => 'responsive_header',
                'settings'          => 'rh_logo_width',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'rh_logo_height', array(
                'label'             => 'Responsive Header Logo Width',
                'description'       => 'Responsive header logo with here...',        
                'section'           => 'responsive_header',
                'settings'          => 'rh_logo_height',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'rh_padding_top', array(
                'label'             => 'Responsive Header Logo Width',
                'description'       => 'Responsive header logo with here...',        
                'section'           => 'responsive_header',
                'settings'          => 'rh_padding_top',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'rh_padding_bottom', array(
                'label'             => 'Responsive Header Logo Width',
                'description'       => 'Responsive header logo with here...',        
                'section'           => 'responsive_header',
                'settings'          => 'rh_padding_bottom',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'rh_bg', array(
                'label'             => 'Responsive Header Background Color',
                'description'       => 'Select responsive header background color...',        
                'section'           => 'responsive_header',
                'settings'          => 'rh_bg',    
            ) ) );
            // FOOTER CONTROLS
            $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'auto_add_featured_image', array(
                'label'             => 'Upload Footer Background Image',
                'description'       => 'Background image will show in the footer',        
                'section'           => 'footer_section',
                'settings'          => 'footer_bg_image',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
                'label'             => 'Select Footer Background Color',
                'description'       => 'This will show in footer background',        
                'section'           => 'footer_section',
                'settings'          => 'footer_bg_color',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
                'label'             => 'Select Footer Text Color',
                'description'       => 'This will change footer text color',        
                'section'           => 'footer_section',
                'settings'          => 'footer_text_color',    
            ) ) );

            $wp_customize->add_control( 'copyright_text',  array(
                'label'             => 'Write copyright text here...',
                'description'       => 'Write below...',        
                'section'           => 'copyright_section',
                'settings'          => 'copyright_text',
                'type'              => 'text',    
            ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color', array(
                'label'             => 'Select Copyright Background Color',
                'description'       => 'Select color below...',        
                'section'           => 'copyright_section',
                'settings'          => 'copyright_bg_color',    
            ) ) );
            $wp_customize->add_control( new \WP_Customize_Color_Control( $wp_customize, 'copyright_text_color', array(
                'label'             => 'Select Footer Text Color',
                'description'       => 'Select color here...',        
                'section'           => 'copyright_section',
                'settings'          => 'copyright_text_color',    
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