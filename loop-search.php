<div class="azad-post">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="azad-content">
				<div class="azad-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="azad-thumb">
					<?php the_content(); ?>                                
				</div>
				<div class="azad-thumb">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
			</article>                        
		<?php endwhile; ?>
	<?php endif; ?>
</div>