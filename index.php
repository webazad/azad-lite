<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
 */
get_header(); ?>

<!-- SPECIAL SECTION BEGINS -->
<section class="azad-blog">	
	<div class="azad-container">
		<div class="blog-container">
			<?php 
				get_template_part( 'loop', 'index' ); 
				get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends special section -->
<?php get_footer();