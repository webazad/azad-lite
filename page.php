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
			<div class="azad-article">

				<?php 
					if ( have_posts() ) : 
						get_template_part( 'template-parts/loop', 'page' );					
					else:
						get_template_part( 'template-parts/loop', 'none' );
					endif;
				?>
				
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section><!-- ends page loop section -->

<?php get_footer();