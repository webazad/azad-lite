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
					printf( __( 'Category Archives: %s', 'azad-x' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?>
			</h1>
			<?php
			
				$category_description = category_description();
				if ( ! empty( $category_description ) ) {
					echo '<div class="archive-meta">' . $category_description . '</div>';
				}				
				get_template_part('loop','category'); 
				get_sidebar();
				
			?>
		</div>
	</div>
</section><!-- ends special section -->
<?php get_footer(); ?>

