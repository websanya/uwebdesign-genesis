<?php
/**
 * Customize default loop to include another post types.
 */

//* Use 'pre_get_posts' action for that stuff.
add_action( 'pre_get_posts', 'alter_query' );
function alter_query( $query ) {
	if ( $query->is_main_query() ) {
		if ( is_admin() ) {
			return;
		}
		if ( is_singular() ) {
			return;
		}
		if ( is_post_type_archive() ) {
			return;
		}
		$query->set( 'post_type', array( 'post', 'weeklies', 'videos', 'books' ) );
	} else {
		return;
	}
}