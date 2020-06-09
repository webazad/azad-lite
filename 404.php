<?php
/**
*----------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*----------------------------------------------
 */
get_header(); ?>

<!-- SPECIAL SECTION BEGINS -->
<section class="azad-404">
    <p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
    <?php get_search_form(); ?>
    <?php get_sidebar(); ?>
</section><!-- ends special section -->
<?php get_footer(); ?>

