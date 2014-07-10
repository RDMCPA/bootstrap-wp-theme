<?php get_header(); ?>

<?php if(have_posts() ) : ?>

  <div class="col-sm-8">

  <?php while( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

  <?php endwhile; ?>

  </div>

<?php else : ?>

  <?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>