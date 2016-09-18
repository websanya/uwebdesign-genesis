<?php
/**
 * All script magic for the website.
 */

//* Add uWebDesign scripts.
add_action( 'wp_enqueue_scripts', 'uwd_scripts' );
function uwd_scripts() {
	//* Change jQuery.
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), null, false );
	wp_enqueue_script( 'uwd-color-thief', get_stylesheet_directory_uri() . '/js/min/uwebdesign.min.js', array( 'jquery' ), '', true );
	if ( is_single() ) {
		wp_enqueue_script( 'uwd-likely', get_stylesheet_directory_uri() . '/js/likely.js', null, null, false );
	}
}

/**
 * Remove WP version param from any enqueued scripts & styles.
 */
function ws_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

add_filter( 'style_loader_src', 'ws_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'ws_remove_wp_ver_css_js', 9999 );