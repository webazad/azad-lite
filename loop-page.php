<div class="the_article">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<article class="">
				<div class="azad-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="azad-thumb">
					<?php the_content(); ?>                                
				</div>
				<div class="azad-thumb">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</div>
			</article>                        
		<?php endwhile; endif; ?>
</div>
