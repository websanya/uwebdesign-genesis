<?php
/**
 * All script magic for the website.
 */

//* Add uWebDesign scripts.
add_action( 'wp_enqueue_scripts', 'uwd_scripts' );
function uwd_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '', true );
	wp_enqueue_script( 'uwd-color-thief', get_stylesheet_directory_uri() . '/js/min/uwebdesign.min.js', array( 'jquery' ), '', true );
	if ( is_single() ) {

		//* Cache featured image src.
		$entry_image_id  = get_post_thumbnail_id();
		$entry_image_src = wp_get_attachment_image_src( $entry_image_id, 'uwd-custom-medium' )[0];

		$output
			= "var share = Ya.share2( 'share-" . get_the_ID() . "', {
				//* Get all the content related to post.
				content: {
					url: '" . get_the_permalink() . "',
					title: '" . get_the_title() . "',
					description: '" . get_the_excerpt() . "',
					image: '$entry_image_src'
				},
				theme: {
					services: 'vkontakte,twitter,facebook,gplus',
					counter: true
				}
			} );";

		wp_enqueue_script( 'uwd-ya-share', 'https://yastatic.net/share2/share.js', array(), '', true );
		wp_add_inline_script( 'uwd-ya-share', $output );
	}
}

//* Include 'dashicons' for not logged in users, other will have it from the admin.
//add_action( 'wp_enqueue_scripts', 'uwd_dashicons' );
function uwd_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_enqueue_style( 'dashicons' );
	}
}

/**
 * Remove WP version param from any enqueued scripts & styles.
 */
function ws_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'ws_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'ws_remove_wp_ver_css_js', 9999 );