<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
 */
?>
            <!-- FOOTER SECTION BEGINS -->
            <footer class="azad-footer">
                <div class="footer-top">
					<div class="azad-container">
						<div class="footer-container">
							<div class="footer-widget-1">
								<img src="<?php echo get_theme_mod('footer_logo_image'); ?>" />
							</div>
							<nav class="footer-widget-2">
								<h3>Important Links</h3>
								<?php
									if(function_exists('wp_nav_menu')){
										$defaults = array(
											'theme_location'  => 'footer_menu_one',
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
							<div class="footer-widget-3">
								<!--  FIRST WAY SHOW DYNAMIC SIDEBAR -->
								<?php if ( !dynamic_sidebar( 'footer_widget_three' ) ) : ?>
									<aside id="search" class="widget">
											<?php get_search_form(); ?>
									</aside>
									<aside id="archives" class="widgets">
										<h3 class="widget-title">Archives</h3>
										<ul>
											<?php wp_get_archives('type=monthly&limit=12'); ?>
										</ul>
									</aside>    
								<?php endif; // end sidebar widget area ?>
							</div>
						</div>
					</div>
				</div>                
                <div class="azad-copyright" style="background:<?php echo get_theme_mod('copyright_bg','#39e1f5'); ?>;color:<?php echo get_theme_mod('copyright_color','#ffffff'); ?>;">
					<div class="azad-container">
						<div class="copyright-container">
							<p><?php echo get_theme_mod('copyright_text','Copyright'); ?> <?php echo date("Y"); ?><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></p>
						</div>
					</div>
                </div>
            </footer><!-- ends footer -->
        </div><!-- ends big wrapper -->
		<!-- CLICK AUDIO -->
        <audio id="hamburger-hover" src="<?php echo get_template_directory_uri(); ?>/assets/audio/link.mp3" preload="auto"></audio>
        <!-- TO MAKE THE PLUGINS DO WORK -->
        <?php wp_footer(); ?>
    </body>
</html>