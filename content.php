<article <?php post_class(); ?>>

	<h1 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

	<div class="post-content">
		<?php the_content(); ?>
	</div>
	
</article>