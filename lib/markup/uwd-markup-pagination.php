<?php

//* Customize default Genesis pagination.
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_endwhile', 'uwd_posts_nav' );
function uwd_posts_nav() {

	if ( 'numeric' === genesis_get_option( 'posts_nav' ) ) {
		uwd_numeric_posts_nav();
	} else {
		genesis_prev_next_posts_nav();
	}

}

//* Custom function to add some classes for mobile-only stuff & removed unnecessarily links.
function uwd_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	//* Stop execution if there's only 1 page
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	//* Add current page to the array
	if ( $paged >= 1 )
		$links[] = $paged;

	//* Add the pages around the current page to the array
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 1;
	}

	genesis_markup( array(
		'html5'   => '<div %s>',
		'xhtml'   => '<div class="navigation">',
		'context' => 'archive-pagination',
	) );

	$before_number = genesis_a11y( 'screen-reader-text' ) ? '<span class="screen-reader-text">' . __( 'Page ', 'genesis' ) .  '</span>' : '';

	echo '<ul>';

	//* Previous Post Link
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-previous">%s</li>' . "\n", get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '&#x000AB; ' . __( 'Previous Page', 'genesis' ) ) ) );

	//* Link to first page, plus ellipses if necessary
	if ( ! in_array( 1, $links ) ) {

		$class = 1 == $paged ? ' class="active"' : ' class="pagination-mobile"';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), $before_number . '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li class="pagination-omission">&#x02026;</li>' . "\n";
		}

	}

	//* Link to current page, plus 1 page in either direction if necessary
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"  aria-label="' . __( 'Current page', 'genesis' ) . '"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $before_number . $link );
	}

	//* Link to last page, plus ellipses if necessary
	if ( ! in_array( $max, $links ) ) {

		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="pagination-omission">&#x02026;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : ' class="pagination-mobile"';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $before_number . $max );

	}

	//* Next Post Link
	if ( get_next_posts_link() )
		printf( '<li class="pagination-next">%s</li>' . "\n", get_next_posts_link( apply_filters( 'genesis_next_link_text', __( 'Next Page', 'genesis' ) . ' &#x000BB;' ) ) );

	echo '</ul></div>' . "\n";

}