<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-------------------------------------------------------------------------------------------------
 */
 
get_header();
get_template_part('slug','name'); ?>

<!-- SPECIAL SECTION BEGINS -->
<section class="azad-blog">	
	<div class="azad-container">
		<div class="blog-container">
			<?php get_template_part('loop','single'); ?>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section><!-- ends special section -->
<?php get_footer(); ?>

