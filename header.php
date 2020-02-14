<?php 
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <!-- device code -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<?php wp_head(); ?>
    </head>
    <?php
    	if(is_front_page()):
            $custom_classes = array('yes_class_1','yes_class_2');
        else:
            $custom_classes = array('no_class_1','no_class_2');
        endif;
    ?>
    <body <?php body_class($custom_classes); ?>>
        <!-- PRELOADER BEGINS -->
        <div class="preloader">
            <div class="inner">
                <figure class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo-header.png" alt="Image"></figure>
                <span class="percentage"></span>
            </div>
        </div>
        <div class="transition-overlay"></div><!-- ends preloader -->
        <!-- BIG WRAPPER BEGINS -->
        <div class="big-wrapper">
            <!-- HEADER SECTION BEGINS -->
            <header class="azad-header">
                <?php //get_template_part('template-parts/header-top.php'); ?>
                <?php azad_header_top(); ?>
                <div class="azad-container">
                    <div class="header-container">
                        <div class="logo">
                            <h1>
                                <?php
                                    if(has_custom_logo()){
                                        the_custom_logo();                             
                                    }else{
                                        bloginfo('name');
                                    }
                                ?>
                            </h1>
                            <div id="hamburger-menu" class="burger-button"><span></span></div>
                        </div>
                        <div class="azad-nav">
                            <nav class="desktop-menus">
                                <!-- SECOND WAY TO SHOW NAVIGATION -->
                                <?php 
                                    if(function_exists('wp_nav_menu')){
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
                                        wp_nav_menu($defaults);
                                    }elseif(has_nav_menu('sidebar_widget_one')){
                                        echo "Pleas set the menu first";
                                    }
                                ?>
                            </nav>
                            <?php
								// Check whether the header search is activated in the customizer.
								$enable_header_search = get_theme_mod( 'enable_header_search', true );								
								if($enable_header_search) : ?>
                                <!-- asdf -->
                                <div class="azad-search-button">
                                    <div class="header-toggles hide-no-js">
                                        <div class="toggle-wrapper search-toggle-wrapper">
                                            <button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                                                <span class="toggle-inner">
                                                    <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23"><path d="M38.710696,48.0601792 L43,52.3494831 L41.3494831,54 L37.0601792,49.710696 C35.2632422,51.1481185 32.9839107,52.0076499 30.5038249,52.0076499 C24.7027226,52.0076499 20,47.3049272 20,41.5038249 C20,35.7027226 24.7027226,31 30.5038249,31 C36.3049272,31 41.0076499,35.7027226 41.0076499,41.5038249 C41.0076499,43.9839107 40.1481185,46.2632422 38.710696,48.0601792 Z M36.3875844,47.1716785 C37.8030221,45.7026647 38.6734666,43.7048964 38.6734666,41.5038249 C38.6734666,36.9918565 35.0157934,33.3341833 30.5038249,33.3341833 C25.9918565,33.3341833 22.3341833,36.9918565 22.3341833,41.5038249 C22.3341833,46.0157934 25.9918565,49.6734666 30.5038249,49.6734666 C32.7048964,49.6734666 34.7026647,48.8030221 36.1716785,47.3875844 C36.2023931,47.347638 36.2360451,47.3092237 36.2726343,47.2726343 C36.3092237,47.2360451 36.347638,47.2023931 36.3875844,47.1716785 Z" transform="translate(-20 -31)"></path></svg>
                                                    <!--span class="toggle-text">Search</span-->
                                                </span>
                                            </button><!-- .search-toggle -->
                                        </div>
                                    </div>
                                </div><!-- asdf -->
                            <?php endif; ?>
                        </div>                        
                    </div>                    
                </div>
                <nav class="mobile-menus">
                    <!-- SECOND WAY TO SHOW NAVIGATION -->
                    <?php 
                        if(function_exists('wp_nav_menu')){
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
                            wp_nav_menu($defaults);
                        }elseif(has_nav_menu('sidebar_widget_one')){
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