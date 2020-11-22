<?php
/**
*-----------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-----------------------------------
 */
get_header(); ?>

<!-- SPECIAL SECTION BEGINS -->
<section class="azad-blog">	
	<div class="azad-container">
		<div class="blog-container">
			<?php
				if ( have_posts() ) {
					the_post();
				}
			?>
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'azad-x' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'azad-x' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'azad-x' ) ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'azad-x' ), get_the_date( _x( 'Y', 'yearly archives date format', 'azad-x' ) ) ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'azad-x' ); ?>
				<?php endif; ?>
			</h1>
			<?php
				rewind_posts();		
				get_template_part( 'loop', 'archive' ); 
				get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends special section -->
<?php get_footer();