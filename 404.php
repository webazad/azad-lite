<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage azad-x
 * @version 1.0.0
 */
// EXIT IF ACCESSED DIRECTLY
defined( 'ABSPATH' ) || exit;
get_header(); ?>

<!-- 404 SECTION BEGINS -->
<section class="azad-section azad-404">
    <div class="azad-container">
        <div class="error-container">
            <div class="error-title"><span class="header-font" style="font-size: 6em; font-weight: bold; opacity: .3">404</span></div>
            <div class="error-content">
                <header>
                    <h1 class="title-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'azad-x' ); ?></h1>
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'azad-x' ); ?></p>
                </header>
                <footer error-footer>
                    <?php get_search_form(); ?>
                    <?php //get_sidebar(); ?>
                </footer>
            </div>
        </div>        
    </div>    
</section><!-- ends 404 section -->

<?php get_footer();