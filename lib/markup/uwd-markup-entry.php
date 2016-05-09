<?php
/**
 * All markup customizations for all the entries.
 */

//* Add entry header wrapper opening.
add_action( 'genesis_entry_header', 'uwd_custom_header_open', 9 );
function uwd_custom_header_open() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'video' ) && ( ! is_single() || get_post_type() != 'weekly' ) ) {
		echo '<div class="entry-header-inner">';
	}
}

//* Add entry header wrapper closing.
add_action( 'genesis_entry_header', 'uwd_custom_header_close', 14 );
function uwd_custom_header_close() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'video' ) && ( ! is_single() || get_post_type() != 'weekly' ) ) {
		echo '</div>';
	}
}

//* Featured image markup for all the types.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'uwd_archive_do_post_image', 8 );
function uwd_archive_do_post_image() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'video' ) && ( ! is_single() || get_post_type() != 'weekly' ) ) {
		$img = genesis_get_image( array(
			'format' => 'html',
			'size'   => 'medium_large',
			'attr'   => genesis_parse_attr( 'entry-image', array() ),
		) );

		if ( ! empty( $img ) ) {
			printf( '<a href="%s" aria-hidden="true">%s</a>', get_permalink(), $img );
		} else {
			printf( '<a href="%s" aria-hidden="true"><img width="622" height="415" class="post-image entry-image" src="%s" alt="placeholder image"></a>', get_permalink(), get_stylesheet_directory_uri() . '/img/placeholder.jpg' );
		}
	}
}

require_once( 'entry/uwd-markup-entry-post.php' );
require_once( 'entry/uwd-markup-entry-post-link.php' );
require_once( 'entry/uwd-markup-entry-video.php' );
require_once( 'entry/uwd-markup-entry-weekly.php' );