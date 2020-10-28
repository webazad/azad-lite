<?php
/**
*-----------------------------------------------------------
* :: @package azad-news
* :: @version 1.0.0
* :: The template for displaying custom login page
* :: Template Name: Contact
*-----------------------------------------------------------
*/
get_header(); ?>

    <!-- CONTACT MAIN PAGE SECTION BEGINS -->
    <section class="azad-section azad-contact header-fixed">
        <div class="azad-container">
		
            <?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'azad-article' ) ?>>
                    <header class="azad-article-header">
                        <h2><?php the_title(); ?></h2>
						<?php //do_action( 'azad_posted_on' ); ?>
                    </header>
                    <div class="azad-article-content">
                        <?php
							if ( ! get_the_content() ) {
								echo '<p>May be content field is empty.</p>'; edit_post_link( 'Edit this post...', '<p>', '</p>' );
							} else {
								the_content();
							}
						?>
                    </div>
					<footer class="azad-article-footer">
                        <?php //do_action( 'azad_posted_in' ); ?>
						<?php //edit_post_link( 'Edit this post...', '<p>', '</p>' ); ?>
                    </footer>
                </article>
            <?php endwhile; else: ?>
                <p>No content found for now. You can try <a href="<?php site_url(); ?>"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif; ?>			
			
        </div>
    </section><!-- ends contact main page section -->

<?php get_footer(); ?>