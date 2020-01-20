<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package theme_textdomain
* :: @version 0.0.1
*-------------------------------------------------------------------------------------------------
 */
?>
            <!-- FOOTER SECTION BEGINS -->
            <footer class="azad-footer">
                <div class="">
                    <img src="<?php echo get_theme_mod('footer_logo_image'); ?>" />
                </div>
                <nav>
                    <?php
                        if(function_exists('wp_nav_menu')){
                            $defaults = array(
                                'theme_location'  => 'footer_menu_three',
                                'menu'            => '',
                                'container'       => 'div',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
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
                        }
                    ?>
                </nav>
                <div class="azad-copyright">
                    <p><?php echo get_theme_mod('copyright_text'); ?> <?php echo date("Y"); ?><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></p>
                </div>
            </footer><!-- ends footer -->
        </div><!-- ends big wrapper -->
        <!-- TO MAKE THE PLUGINS DO WORK -->
        <?php wp_footer(); ?>
    </body>
</html>