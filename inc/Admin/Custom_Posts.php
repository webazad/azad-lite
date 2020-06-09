<?php
namespace Inc\Admin;

// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Custom_Posts' ) ):
    class Custom_Posts {
        private static $_instance;
        public function __construct() {
            add_action( 'init', array( $this, 'azad_custom_posts' ) );
            add_action( 'after_switch_theme', array( $this, 'azad_rewrite_flush' ) );
        }
        public function azad_rewrite_flush() {
            //$$this->azad_custom_posts();
            flush_rewrite_rules();
        }
        public function custom_posts() {
            $c_posts = array( 'book', 'student', 'Driver' );
            return $c_posts;
        }
        public function azad_custom_posts() {
            $c_posts = $this->custom_posts();
            foreach ( $c_posts as $c_post ) {
                $singular_lc = apply_filters( 'azad_custom_post', $c_post );
                $singular_uc = ucwords( $singular_lc );
                $plural_lc = $singular_lc . 's';
                $plural_uc = ucwords( $plural_lc );
                $azad = 'azad';
                $labels = array(
                    'name'               => _x( $plural_uc, 'post type general name', $azad ),
                    'singular_name'      => _x( $singular_uc, 'post type singular name', $azad ),
                    'menu_name'          => _x( $plural_uc, 'admin menu', $azad ),
                    'name_admin_bar'     => _x( $singular_uc, 'add new on admin bar', $azad ),
                    'add_new'            => _x( 'Add New', $singular_lc, $azad ),
                    'add_new_item'       => __( 'Add New ' . $singular_uc, $azad ),
                    'new_item'           => __( 'New ' . $singular_uc, $azad ),
                    'edit_item'          => __( 'Edit ' . $singular_uc, $azad ),
                    'view_item'          => __( 'View ' . $singular_uc, $azad ),
                    'all_items'          => __( 'All ' . $plural_uc, $azad ),
                    'search_items'       => __( 'Search ' . $plural_uc, $azad ),
                    'parent_item_colon'  => __( 'Parent ' . $plural_uc . ':', $azad ),
                    'not_found'          => __( 'No ' . $plural_lc . ' found.', $azad ),
                    'not_found_in_trash' => __( 'No ' . $plural_lc . ' found in Trash.', $azad )
                );
                $args = array(
                    'labels'             => $labels,
                    'description'        => __( 'Description.', $azad ),
                    'public'             => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'rewrite'            => array( 'slug' => $singular_lc ),
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'hierarchical'       => false,
                    'menu_position'      => null,
					'show_in_rest' => true,
                    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
                );
                register_post_type( $singular_lc, $args );
            }
            
        }
        public static function register() {
            // echo 'Azad asdf';   
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

if ( ! function_exists( 'load_azad_custom_posts' ) ) {
    function load_azad_custom_posts() {
        return Custom_Posts::get_instance();
    }
}
//$GLOBALS['custom_post'] = load_azad_custom_posts();