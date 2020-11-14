/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

    $(document).ready(function(){

        
        
        //Update the site description in real time...
        wp.customize( 'blogdescription', function( value ) {
            value.bind( function( newval ) {
                $( '.site-description' ).html( newval );
            } );
        } );
    
        //Update site title color in real time...
        wp.customize( 'footer_bg_image', function( value ) {
            value.bind( function( newval ) {
                $('.azad-footer').css('background-image', newval );
            } );
        } );
        
        //Update site title color in real time...
        wp.customize( 'footer_text_color', function( value ) {
            value.bind( function( newval ) {
                $('.azad-footer').css('color', newval );
            } );
        } );

        //Update site title color in real time...
        wp.customize( 'footer_bg_color', function( value ) {
            value.bind( function( newval ) {
                $('.azad-footer').css('background-color', newval );
            } );
        } );

        //Update the site description in real time...
        wp.customize( 'copyright_text', function( value ) {
            value.bind( function( newval ) {
                $( '.copyright-container p span' ).html( newval );
            } );
        } );

        // Update the site title in real time...
        wp.customize( 'copyright_text_color', function( value ) {
            value.bind( function( newval ) {
                $( '.azad-copyright' ).css( 'color', newval );
            } );
        } );

        // Update the site title in real time...
        wp.customize( 'copyright_bg_color', function( value ) {
            value.bind( function( newval ) {
                $( '.azad-copyright' ).css( 'background-color', newval );
            } );
        } );

    });
     
} )( jQuery );