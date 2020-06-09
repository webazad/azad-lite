<?php
function azad_header_top() {
    do_action( 'azad_header_top' );
}
function azad_footer_top() {
    do_action( 'azad_header_top' );
}
function azad_header_top_callback() {
    //require_once AZAD_LITE_DIR . '/template-parts/header-top.php';
}
add_action( 'azad_header_top', 'azad_header_top_callback' );
function azad_footer_top_callback() {
    //require_once AZAD_LITE_DIR . '/template-parts/header-top.php';
}
add_action( 'azad_footer_top', 'azad_header_top_callback' );