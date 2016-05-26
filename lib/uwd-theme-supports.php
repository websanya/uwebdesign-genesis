<?php
/**
 * All theme supports functions for the websites.
 */

//* Add HTML5 markup structure.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

//* Remove Accessibility support.
add_theme_support( 'genesis-accessibility', array() );

//* Add post format for 'links'.
add_theme_support( 'post-formats', array( 'link' ) );

//* Title tag markup, according to WordPress 4.1.
add_theme_support( 'title-tag' );

//* Add Menus w/ Genesis-specific supports.
add_theme_support( 'genesis-menus', array(
	'primary' => 'Основное навигационное меню',
) );

//* Remove Genesis Layout Settings.
remove_theme_support( 'genesis-inpost-layouts' );
remove_theme_support( 'genesis-archive-layouts' );

//* Register image sizes.
add_image_size( 'uwd-custom-medium', 300, 182, true );