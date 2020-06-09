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
			<h1 class="page-title">
				<?php
					printf( __( 'Tag Archives: %s', 'azad-x' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?>
			</h1>
			<?php 
				get_template_part( 'loop', 'tag' ); 
				get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends special section -->
<?php get_footer();