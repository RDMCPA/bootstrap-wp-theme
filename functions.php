<?php
// Check for Composer support.
if( WP_COMPOSER != true )	{

	if( file_exists('vendor/autoload.php') ) {
		require_once 'vendor/autoload.php';
	} else {
		echo "Cannot Find Classes, please run composer.";
		exit;
	}
}

// Instantiate Theme Class
$theme = new WordPress\Theme('bootstrap');

// Theme Setup
$setup = array(
	'theme_support' => array(
		'post-thumbnails' => "",
		'automatic-feed-links' => "",
		'custom-background' => "",
		'post-formats' => array( 'aside', 'image', 'video', 'quote', 'link' )
	),
	'nav_menus' => array(
		array( 'primary'	=>	__('Primary Menu', 'tacklebox') ),
		array( 'topbar'		=>	__('Top Bar', 'tacklebox') )
	)
);
$theme->themeSetup($setup);

// Scripts and Styles
$scripts = array(
		array(
		    'name' => 'bootstrap-core', //Required
		    'type' => 'style', // Required
		    'location' => get_template_directory_uri() . '/assets/styles/css/bootstrap.css', // Required
		    'method' => 'enqueue',
		    'version' => '3.1.0'
		),
    array(
        'name' => 'default-style', //Required
        'type' => 'style', // Required
        'location' => get_template_directory_uri() . '/assets/styles/css/main.css', // Required
        'method' => 'enqueue',
        'version' => '3.1.0'
    ),
    array(
        'name' => 'bootstrap-core', //Required
        'type' => 'script', // Required
        'location' => get_template_directory_uri() . '/assets/scripts/vendor/bootstrap.js', // Required
        'dependencies' => array('jquery')
    ),
    array(
        'name' => 'default-script', //Required
        'type' => 'script', // Required
        'location' => get_template_directory_uri() . '/assets/scripts/main.js', // Required
        'dependencies' => array('jquery-form', 'thickbox')
    ),
    array(
    	'name' => 'font-awesome',
    	'type' => 'style',
    	'location' => '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'
    )
);

// Only use these scripts if we using front-end;
if( ! is_admin() ){
	$theme->loadScripts($scripts);
}

// Widgets
$widgets = array(
	array(
		'name' => __( 'Sidebar', 'tacklebox' ),
		'id' => 'sidebar-1',
		'before_title' => '<h2 class="widget-title">',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	),
	array(
		'name' => __( 'Footer One', 'tacklebox' ),
		'id' => 'footer-1',
		'before_title' => '<h2 class="widget-title">',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	),
	array(
		'name' => __( 'Footer Two', 'tacklebox' ),
		'id' => 'footer-2',
		'before_title' => '<h2 class="widget-title">',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	),
	array(
		'name' => __( 'Footer Three', 'tacklebox' ),
		'id' => 'footer-3',
		'before_title' => '<h2 class="widget-title">',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>'
	)
);
$theme->addWidgets($widgets);

// Custom Header
//require_once( get_template_directory() . '/lib/custom-header.php' );
// Template Tags
require_once( get_template_directory() . '/lib/template-tags.php' );