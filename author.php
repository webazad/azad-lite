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
			<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'azad-x' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			<?php
				if ( get_the_author_meta( 'description' ) ) :
			?>
				<div id="entry-author-info">
					<div id="author-avatar">
						<?php
							echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) );
						?>
					</div><!-- #author-avatar -->
					<div id="author-description">
							<h2><?php printf( __( 'About %s', 'azad-x' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
					</div><!-- #author-description	-->
				</div><!-- #entry-author-info -->
			<?php endif; ?>
			<?php
				rewind_posts();		
				get_template_part( 'loop', 'author' ); 
				get_sidebar();
			?>
		</div>
	</div>
</section><!-- ends special section -->

<?php get_footer();