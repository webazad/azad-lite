<?php
/**
*-------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------
 */
 
get_header(); ?>

<!-- PAGE LOOP SECTION BEGINS -->
<section class="azad-section azad-page">	
	<div class="azad-container">
		<div class="loop-container">
			<?php 
				get_template_part( 'template-parts/loop', 'page' );
				//get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends paeg loop section -->
<?php get_footer();