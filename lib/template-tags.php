<?php

require_once( get_template_directory() . '/vendor/autoload.php' );

function bt_get_menu( $menu = null ){

	switch ($menu) {

		case 'primary':

			$settings = array(
				'menu'				=> $menu,
				'theme_location'	=> $menu,
				'depth'             => 2,
				'container'         => 'div',
				'container_id'		=> 'menu-primary',
				'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse col-xs-12 pull-right',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'Joh\Navigation::fallback',
				'walker'            => new Joh\Navigation()
			);
			break;

		case 'fixed-top':

			$settings = array(
				'theme_location'	=> 'fixed-top',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => '',
				'walker'            => new Joh\Navigation()
			);
			break;

		case 'hometop':

			$settings = array(
				'theme_location'	=> 'hometop',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse pull-right',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => '',
				'walker'            => new Joh\Navigation()
			);
			break;

		case 'homefront':

			$settings = array(
				'theme_location'	=> 'homefront',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => '',
				'menu_class'        => 'menu',
				'fallback_cb'       => '',
				'walker'            => new Joh\Navigation()
			);
			break;

		case 'footer':

			$settings = array(
				'theme_location'	=> 'footer',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'hidden-xs',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => '',
				'walker'            => new Joh\Navigation()
			);
			break;

		default:

			$settings = array(
				'theme_location'	=> 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_id'		=> 'menu-default',
				'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse col-xs-12 pull-right',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'Joh\Navigation::fallback',
				'walker'            => new Joh\Navigation()
			);

		break;
	}

	wp_nav_menu( $settings );
}

if ( ! function_exists( 'bt_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bt_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', '_s' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function bt_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so _s_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so _s_categorized_blog should return false
		return false;
	}
}