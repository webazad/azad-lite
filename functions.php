<?php
/**
*-----------------------------------------------------------
* :: @package azad-x
* :: @version 1.0.0
*-----------------------------------------------------------
*/

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

$theme_name = wp_get_theme()->get( 'Name' );
$theme_version = wp_get_theme()->get( 'Version' );

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
if ( class_exists( 'Inc\\Init' ) ) :    
    Inc\Init::register_services();
endif;

