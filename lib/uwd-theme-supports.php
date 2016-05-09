<?php
/**
 * All theme supports functions for the websites.
 */

//* Add HTML5 markup structure.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//* Remove Accessibility support.
add_theme_support( 'genesis-accessibility', array() );

//* Maybe try post-formats.
add_theme_support( 'post-formats', array( 'link' ) );

//* Title tag markup, according to WordPress 4.1.
add_theme_support( 'title-tag' );

//* Add Menus w/ Genesis-specific supports.
add_theme_support( 'genesis-menus', array(
	'primary' => 'Основное навигационное меню',
) );

//* Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

//* Remove Genesis Layout Settings.
remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );

//* Register image sizes.
add_image_size( 'uwd-banner-header', 770, 140, true );
add_image_size( 'uwd-banner-sidebar', 770, 770, true );
add_image_size( 'uwd-custom-medium', 300, 169, true );

//* Add meta support for videos.
add_post_type_support( 'video', 'genesis-entry-meta-after-content' );