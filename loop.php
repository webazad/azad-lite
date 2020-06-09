<div class="azad-post">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="azad-content">
				<div class="azad-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="azad-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="entry-meta">
					<?php azad_posted_on(); ?>
				</div><!-- .entry-meta -->
				<div class="azad-content">
					<?php the_content(); ?>                                
				</div>
				<div class="entry-utility">
					<?php azad_posted_in(); ?>
				</div><!-- .entry-utility -->
			</article>                        
		<?php endwhile; ?>
	<?php endif; ?>
</div>