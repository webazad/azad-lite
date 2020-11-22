<?php
/**
*---------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*---------------------------------------
*/
get_header(); ?>

<!-- MAIN SECTION BEGINS -->
<section class="azad-section">	
	<div class="azad-container">
		<div class="azad-section-inner-container">
			<div class="azad-post">

				<?php 
					if ( have_posts() ) : 
						get_template_part( 'template-parts/loop', get_post_format() );					
					else:
						get_template_part( 'template-parts/loop', 'none' );
					endif;
				?>

			</div>

			<?php get_sidebar(); ?>
			
		</div>
	</div>
</section><!-- ends main section -->

<?php get_footer();

