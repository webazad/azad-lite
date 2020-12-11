<?php
/**
*----------------------------
* :: @package azad-lite
* :: @version 1.0.0
*----------------------------
 */
?>
            <!-- FOOTER SECTION BEGINS -->
            <footer class="azad-footer" style="background-image:url(<?php echo get_theme_mod( 'footer_bg_image', '#ffffff' ); ?>);background-color:<?php echo get_theme_mod( 'footer_bg_color', 'transparent' ); ?>;color:<?php echo get_theme_mod( 'footer_text_color', '#ffffff'); ?>;">
                <div class="footer-top">
					<div class="azad-container">
							<div class="footer-top-container">
								<div class="azad-footer-widget">
									<!--  THE WAY TO SHOW DYNAMIC WIDGET -->
									<?php if ( ! dynamic_sidebar( 'footer_widget_one' ) ) : ?>
										<p>Please select a widget to display data.</p>    
									<?php endif; ?>
								</div>
								<div class="azad-footer-widget">
									<!--  THE WAY TO SHOW DYNAMIC WIDGET -->
									<?php if ( ! dynamic_sidebar( 'footer_widget_two' ) ) : ?>
										<p>Please select a widget to display data.</p>    
									<?php endif; ?>
								</div>
								<div class="azad-footer-widget">
									<!--  THE WAY TO SHOW DYNAMIC WIDGET -->
									<?php if ( ! dynamic_sidebar( 'footer_widget_three' ) ) : ?>
										<p>Please select a widget to display data.</p>    
									<?php endif; ?>
								</div>
								<div class="azad-footer-widget">
								<!--  THE WAY TO SHOW DYNAMIC WIDGET -->
								<?php if ( ! dynamic_sidebar( 'footer_widget_four' ) ) : ?>
									<p>Please select a widget to display data.</p>    
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>                
                <div class="azad-copyright" style="background-color:<?php echo get_theme_mod( 'copyright_bg_color', '#000000' ); ?>;color:<?php echo get_theme_mod( 'copyright_text_color', '#ffffff' ); ?>;">
					<div class="azad-container">
						<div class="copyright-container">
							<p><?php echo date( "Y" ); ?> <span><?php echo get_theme_mod( 'copyright_text', 'Write copyright text here...' ); ?></span> <a href="<?php echo home_url(); ?>"> <?php bloginfo( 'name' ); ?></a></p>
						</div>
					</div>
                </div>
            </footer><!-- ends footer -->
        </main><!-- ends big wrapper -->
		
		<!-- CLICK AUDIO -->
        <audio id="hamburger-hover" src="<?php echo get_template_directory_uri(); ?>/assets/audio/link.mp3" preload="auto"></audio>

        <!-- TO MAKE THE PLUGINS DO WORK -->
        <?php wp_footer(); ?>

    </body>
</html>