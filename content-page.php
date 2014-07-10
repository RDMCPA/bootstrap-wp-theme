<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package  bootstrap-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<header class="entry-header">
		<h1 class="entry-title"><?php echo get_the_title(); ?></h1>
	</header><!-- /.entry-header -->

	<div class="entry-content">
		<hr />
		<?php the_content(); ?>
	</div><!-- /.entry-content -->

</article><!-- /#post-## -->