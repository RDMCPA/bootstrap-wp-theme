<?php 

/**
 * The sidebar containing the main widget areas.
 *
 * @package  bootstrap-theme
 */

?>

<div id="secondary" class="col-lg-3 col-md-3 col-sm-3 col-sm-offset-1 widget-area" role="complementary">
	
	<?php do_action('before_sidebar'); ?>

	<?php if( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>

	<?php endif; ?>

</div>