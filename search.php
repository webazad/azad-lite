<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
 */
get_header(); ?>
<!-- SPECIAL SECTION BEGINS -->
<section class="azad-search">
    <div class="azad-container">
        <?php 
            get_template_part('loop','search'); 
            get_sidebar();
        ?>
    </div>
</section><!-- ends special section -->
<?php get_footer(); ?>

