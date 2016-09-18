<?php

//* We need this file to use 'is_plugin_active' function.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//* Enqueue our custom-made scripts.
add_action( 'wp_enqueue_scripts', function() {
	//* Custom 'comment-reply.js' to focus textarea, not the toolbar.
	wp_dequeue_script( 'comment-reply' );
	wp_enqueue_script( 'uwd-comment-reply', get_stylesheet_directory_uri() . '/js/min/uwd-comment-reply-min.js', false, false, true );
	//* Custom 'uwd-quicktags.js' (if plugin active) to add quicktags to old forms.
	if ( is_plugin_active( 'basic-comment-quicktags/quicktags.php' ) ) {
		wp_dequeue_script( 'basic-comment-quicktags' );
		wp_enqueue_script( 'basic-comment-quicktags', get_stylesheet_directory_uri() . '/js/min/uwd-quicktags-min.js', array(
			'quicktags',
			'jquery',
		), false, true );
		//* Custom 'uwd-wp-ajaxify-comments.js' (if plugin active) to add quicktags to new forms.
		if ( is_plugin_active( 'wp-ajaxify-comments/wp-ajaxify-comments.php' ) ) {
			wp_dequeue_script( 'wpAjaxifyComments' );
			if ( wpac_get_option( 'debug' ) || wpac_get_option( 'useUncompressedScripts' ) ) {
				wp_enqueue_script( 'uwd-wp-ajaxify-comments', get_stylesheet_directory_uri() . '/js/uwd-wp-ajaxify-comments.js', array(
					'jquery',
					'jQueryBlockUi',
					'jsuri',
					'jQueryIdleTimer',
					'waypoints',
				), false, true );
			} else {
				wp_enqueue_script( 'uwd-wp-ajaxify-comments', get_stylesheet_directory_uri() . '/js/min/uwd-wp-ajaxify-comments-min.js', array( 'jquery' ), false, true );
			}
		}
	}
} );