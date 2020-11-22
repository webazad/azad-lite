<?php
/**
*--------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*--------------------------------------------------
 */
get_header(); ?>

<!-- PAGE LOOP SECTION BEGINS -->
<section class="azad-section azad-search">	
	<div class="azad-container">
		<div class="loop-container">
			<div class="azad-article">
					<?php 
						if ( have_posts() ) : 
							get_template_part( 'template-parts/loop', 'search' );					
						else:
							get_template_part( 'template-parts/loop', 'none' );
						endif;
					?>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section><!-- ends paeg loop section -->

<?php get_footer();