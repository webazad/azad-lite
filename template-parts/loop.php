<?php while ( have_posts() ) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'azad-article' ); ?>>
		<div class="post-thumb">
            <figure>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
            </figure>
        </div>        
		<div class="post-body">
			<header class="article-header">
				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="sticky-post"><?php _e( 'Featured', 'azad-gutenberg' ); ?></span>
				<?php endif; ?>
				<?php //the_title( sprintf( '<h2 class="azad-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header>
			<div class="article-content">
				<div class="entry-meta">
					<?php azad_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
					if ( ! get_the_content() ) {
						echo '<p>May be content field is empty.</p>'; edit_post_link( 'Edit this post...', '<p>', '</p>' );
					} else {
						the_content(
							sprintf( __( 'Continue reading<span class="screen-reader-text">"%s"</span>', 'azad-gutenberg' ),
								get_the_title()
							)
						);
					}
				?>
			</div>
			<footer class="article-footer">
				<?php 
					// azad_gutenberg_meta();
					edit_post_link(
						sprintf( __( 'Edit<span class="screen-reader-text">%s</span>', 'azad-futenberg' ), get_the_title() ),
						'<span class="edit-link">',
						'</span>'
					); 
				?>
				<div class="entry-utility">
					<?php azad_posted_in(); ?>
				</div><!-- .entry-utility -->
			</footer>
		</div>
    </article>

<?php endwhile;