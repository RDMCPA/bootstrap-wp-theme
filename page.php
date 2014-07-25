<?php get_header(); ?>

<?php if(have_posts() ) : ?>

	<?php bt_child_page_menu();?>


	<?php if( has_children( post_parent_id() ) == false) : ?>
		
		<div class="col-sm-6 col-sm-offset-2">
	
	<?php else : ?>

  <div class="col-sm-6">

  <?php endif; ?>

  <?php while( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', 'page' ); ?>

  <?php endwhile; ?>

  </div>

<?php else : ?>

  <?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

<?php get_footer(); ?>