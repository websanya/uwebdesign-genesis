<?php

//* Start the engine.
require_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'uWebDesign Theme' );
define( 'CHILD_THEME_URL', 'https://uwebdesign.ru/' );
define( 'CHILD_THEME_VERSION', '1.1.2' );

//* Helper functions.
require_once( 'lib/_helpers.php' );

//* Lots of theme supports stuff.
require_once( 'lib/uwd-theme-supports.php' );

//* Admin customizations.
require_once( 'lib/uwd-admin.php' );

//* All the scripts come here.
require_once( 'lib/uwd-scripts.php' );

//* Main loop customizations.
require_once( 'lib/uwd-loop.php' );

//* All markup customizations for the website.
require_once( 'lib/markup/uwd-markup-site-header.php' );
require_once( 'lib/markup/uwd-markup-entry.php' );
require_once( 'lib/markup/uwd-markup-search.php' );
require_once( 'lib/markup/uwd-markup-sidebar.php' );
require_once( 'lib/markup/uwd-markup-pagination.php' );
require_once( 'lib/markup/uwd-markup-footer-widgets.php' );
require_once( 'lib/markup/uwd-markup-footer.php' );
require_once( 'lib/markup/uwd-markup-embed.php' );

//* Translation markup stuff.
require_once( 'lib/uwd-translate.php' );

//* Lots of comments related stuff.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_script( 'comment-reply' );
	wp_enqueue_script( 'uwd-comment-reply', get_stylesheet_directory_uri() . '/js/uwd-comment-reply.js', false, false, true );
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
			wp_enqueue_script( 'uwd-wp-ajaxify-comments', get_stylesheet_directory_uri() . '/js/uwd-wp-ajaxify-comments.js', array( 'jquery' ), false, true );
		}
	}
	if ( is_plugin_active( 'basic-comment-quicktags/quicktags.php' ) ) {
		wp_dequeue_script( 'basic-comment-quicktags' );
		wp_enqueue_script( 'basic-comment-quicktags', get_stylesheet_directory_uri() . '/js/uwd-quicktags.js', array( 'quicktags', 'jquery' ), false, true );
	}
} );