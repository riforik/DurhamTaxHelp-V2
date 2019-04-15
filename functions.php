<?php
/**
 * durhamtaxhelp_v2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package durhamtaxhelp_v2
 */

 /**
  * Theme Setup
  */
	require get_template_directory() . '/inc/setup.php';


/**
 * Enqueue scripts and styles.
 */
function durhamtaxhelp_v2_scripts() {
	wp_enqueue_style( 'durhamtaxhelp_v2-style', get_stylesheet_uri() );
	// Add CSS components
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/vendor/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/assets/css/vendor/slick-theme.css', array(), '1.8.1' );
	wp_enqueue_style( 'leaflet-css', get_template_directory_uri() . '/assets/css/vendor/leaflet.css', array(), '1.4.0' );
	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/vendor/foundation.css', array(), '6.5.1' );
	// wp_enqueue_style( 'reset-css', get_template_directory_uri() . '/assets/css/reset.css', array(), null );
	wp_enqueue_style( 'app-css', get_template_directory_uri() . '/assets/css/app.css', array(), null );
	wp_enqueue_style( 'queries-css', get_template_directory_uri() . '/assets/css/queries.css', array(), null );


	wp_enqueue_script( 'durhamtaxhelp_v2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'durhamtaxhelp_v2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	// Add JS components
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/vendor/slick.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_script( 'leaflet-js', get_template_directory_uri() . '/assets/js/vendor/leaflet.js', array( 'jquery' ), '1.4.0', true );
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/vendor/foundation.js', array( 'jquery' ), '6.5.1', true );
	wp_enqueue_script( 'what-input-js', get_template_directory_uri() . '/assets/js/vendor/what-input.js', array( 'jquery' ), '5.1.2', true );
	wp_enqueue_script( 'tweenmax-js', get_template_directory_uri() . '/assets/js/TweenMax.min.js', array( 'jquery' ), '1.20.4', true );
	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// /**
//  * Implement the Custom Header feature.
//  */
add_action( 'wp_enqueue_scripts', 'durhamtaxhelp_v2_scripts' );
function _register_menu() {
    register_nav_menu( 'primary', __( 'Primary Menu','textdomain' ) );
}

//Add Menu to theme setup hook
add_action( 'after_setup_theme', '_theme_setup' );

function _theme_setup()
{
    add_action( 'init', '_register_menu' );

    //Theme Support
    add_theme_support( 'menus' );
}
// require get_template_directory() . '/inc/custom-header.php';
class F6_DRILL_MENU_WALKER extends Walker_Nav_Menu {
	/*
	 * Add vertical menu class
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

function f6_drill_menu_fallback( $args ) {
	/*
	 * Instantiate new Page Walker class instead of applying a filter to the
	 * "wp_page_menu" function in the event there are multiple active menus in theme.
	 */

	$walker_page = new Walker_Page();
	$fallback    = $walker_page->walk( get_pages(), 0 );
	$fallback    = str_replace( "children", "children vertical menu", $fallback );
	echo '<ul class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown" style="width: 100%;">' . $fallback . '</ul>';
}
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Registering custom postypes
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
