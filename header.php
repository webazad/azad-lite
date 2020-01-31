<?php 
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
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
            </header><!-- ends header section -->