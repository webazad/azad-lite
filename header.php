<?php 
/**
*--------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*--------------------------------------
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

    <head>
        
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( "charset" ); ?>" />
        <!-- device code -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!-- to make the header scripts works -->
        <?php wp_head(); ?>
		
    </head>

    <body <?php body_class(); ?>>
    
        <?php        
            // Check whether the preloader is activated in the customizer.
            $enable_preloader = get_theme_mod( 'preloader_settings', false );
            // Check whether the header search is activated in the customizer.
            $enable_header_search = get_theme_mod( 'header_search_icon', true );									
            
            if ( $enable_preloader ) : ?>
            <!-- PRELOADER BEGINS -->
            <div class="preloader">
                <div class="inner">
                    <figure class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo-header.png" alt="Image"></figure>
                    <span class="percentage"></span>
                </div>
            </div>
            <div class="transition-overlay"></div><!-- ends preloader -->
        <?php endif; ?>

        <!-- BIG WRAPPER BEGINS -->
        <main class="big-wrapper">
            <!-- HEADER SECTION BEGINS -->
            <header class="azad-header">
                <?php //get_template_part('template-parts/header-top.php'); ?>
                <?php azad_header_top(); ?>
                <div class="azad-container">
                    <div class="header-container">
                        <div class="logo-wrapper">

                            <div class="logo">
                                <hgroup><?php azad_site_logo(); ?></hgroup>
                            </div>
                            <!-- <div id="hamburger-menu" class="burger-button"><span></span></div> -->

                            <!-- RESPONSIVE TOGGLE BUTTON BEGINS -->
                            <button class="toggle nav-toggle responsive-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
								<div id="hamburger-menu" class="burger-button">
									<span></span>
                                </div>
                                <!-- <span class="toggle-inner">
                                    <?php azad_the_svg( 'ellipsis' ); ?>
                                    <span class="toggle-text"><?php _e( 'Menu', 'azad-guineapig' ); ?></span>
                                </span> -->
                            </button><!-- ends responsive toggle button -->

                        </div>
                        <div class="azad-nav">
                            <nav class="desktop-menus">
                                <!-- SECOND WAY TO SHOW NAVIGATION -->
                                <?php 
                                    if ( function_exists( 'wp_nav_menu' ) ) {
                                        $defaults = array(
                                            'theme_location'  => 'desktop_horizontal',
                                            'menu'            => '',
                                            'container'       => 'div',
                                            'container_class' => '',
                                            'container_id'    => '',
                                            'menu_class'      => 'nav navbar-nav',
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            'fallback_cb'     => 'wp_page_menu',
                                            'before'          => '',
                                            'after'           => '',
                                            'link_before'     => '',
                                            'link_after'      => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'           => 0,
                                            'walker'          => ''
                                        );
                                        wp_nav_menu( $defaults );
                                    } elseif ( has_nav_menu( 'sidebar_widget_one' ) ) {
                                        echo "Pleas set the menu first";
                                    }
                                ?>
                            </nav>
                            <?php if( $enable_header_search ) : ?>
                                <div class="azad-search-button">
                                    <div class="header-toggles hide-no-js">
                                        <div class="toggle-wrapper search-toggle-wrapper">
                                            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                                <span class="toggle-inner">
                                                <?php azad_the_svg( 'search' ); ?>
                                                    <!--span class="toggle-text">Search</span-->
                                                </span>
                                            </button><!-- .search-toggle -->
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>                        
                    </div>                    
                </div>
                <nav class="mobile-menus">
                    <!-- SECOND WAY TO SHOW NAVIGATION -->
                    <?php 
                        if ( function_exists( 'wp_nav_menu' ) ) {
                            $defaults = array(
                                'theme_location'  => 'header_menu_one',
                                'menu'            => '',
                                'container'       => 'div',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'nav navbar-nav',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => ''
                            );
                            wp_nav_menu( $defaults );
                        } elseif ( has_nav_menu( 'sidebar_widget_one' ) ) {
                            echo "Pleas set the menu first";
                        }
                    ?>
                </nav>
				<?php
					// Output the search modal (if it is activated in the customizer).
					if ( true === $enable_header_search ) {
						get_template_part( 'template-parts/modal-search' );
					}
				?>
            </header><!-- ends header section -->
            <?php
                // Output the menu modal.
                //get_template_part( 'template-parts/modal-menu' );