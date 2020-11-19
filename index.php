<?php
/**
*---------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*---------------------------------------
*/
get_header(); ?>

<!-- SPECIAL SECTION BEGINS -->
<section class="azad-section">	
	<div class="azad-container">
		<div class="azad-section-inner-container">
			<?php 
				get_template_part( 'loop', 'index' ); 
				get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends special section -->

<?php get_footer();