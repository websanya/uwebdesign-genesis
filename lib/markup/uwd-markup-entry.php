<?php
/**
 * All markup customizations for all the entries.
 */

//* Add entry header wrapper opening.
add_action( 'genesis_entry_header', 'uwd_custom_header_open', 9 );
function uwd_custom_header_open() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'videos' ) && ( ! is_single() || get_post_type() != 'weeklies' ) ) {
		echo '<div class="entry-header-inner">';
	}
}

//* Add entry header wrapper closing.
add_action( 'genesis_entry_header', 'uwd_custom_header_close', 14 );
function uwd_custom_header_close() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'videos' ) && ( ! is_single() || get_post_type() != 'weeklies' ) ) {
		echo '</div>';
	}
}

//* Featured image markup for all the types.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'uwd_archive_do_post_image', 8 );
function uwd_archive_do_post_image() {
	if ( ! is_page() && ( ! is_single() || get_post_type() != 'videos' ) && ( ! is_single() || get_post_type() != 'weeklies' ) ) {
		$img = genesis_get_image( array(
			'format' => 'url',
			'size'   => 'full',
			'attr'   => genesis_parse_attr( 'entry-image', array() ),
		) );

		if ( ! empty( $img ) ) {
			printf( '<a href="%s" aria-hidden="true"><img class="post-image entry-image" src="%s" alt="' . get_the_title() . '"></a>', get_permalink(), $img );
		} else {
			printf( '<a href="%s" aria-hidden="true"><img width="622" height="415" class="post-image entry-image" src="%s" alt="placeholder image"></a>', get_permalink(), get_stylesheet_directory_uri() . '/img/placeholder.jpg' );
		}
	}
}

//* Add Pageviews plugin support.
add_shortcode( 'post_views', 'uwd_post_views_shortcode' );
function uwd_post_views_shortcode( $atts ) {

	global $post;

	//* Do nothing if no tags
	if ( ! current_user_can( 'manage_options' ) ) {
		return false;
	}

	if ( is_callable( array( 'Pageviews', 'get_placeholder' ) ) ) {
		$placeholder = Pageviews::get_placeholder( $post->ID );
		return 'Просмотры: ' . $placeholder;
	} else {
		return false;
	}
}

//* Customize entry-meta to include post_terms shortcode.
add_filter( 'genesis_post_meta', 'uwd_entry_video_type_taxonomy' );
function uwd_entry_video_type_taxonomy() {
	return '[post_categories] [post_terms] [post_tags] [post_views]';
}

//* Customize 'post_terms' shortcode default args.
add_filter( 'genesis_post_terms_shortcode_defaults', 'uwd_entry_test' );
function uwd_entry_test() {
	switch ( get_post_type() ) {
		case 'videos':
			$args = array(
				'after'    => '',
				'before'   => 'Тип видео: ',
				'sep'      => ', ',
				'taxonomy' => 'video_type',
			);
			break;
		case 'books':
			$args = array(
				'after'    => '',
				'before'   => 'Издательство: ',
				'sep'      => ', ',
				'taxonomy' => 'book_publisher',
			);
			break;
		default:
			$args = array(
				'after'    => '',
				'before'   => 'Термсы: ',
				'sep'      => ', ',
				'taxonomy' => '',
			);
			break;
	}

	return $args;
}

//* Connect Ya Share.
add_action( 'genesis_entry_content', 'uwd_entry_share', 20 );
function uwd_entry_share() {

	if ( ! is_single() ) {
		return;
	} else {
		?>
		<div class="likely likely-big">
			<div class="twitter"></div>
			<div class="vkontakte"></div>
			<div class="facebook"></div>
			<div class="gplus"></div>
			<div class="telegram"></div>
		</div>
		<?php
	}

}

//* This function adds nice anchor with id attribute to our h2 tags for reference.
add_action( 'genesis_entry_header', function() {
	add_filter( 'the_content', 'uwd_anchor_content_h2' );
} );
function uwd_anchor_content_h2( $content ) {

	//* Pattern that we want to match.
	$pattern = '/<h2>(.*?)<\/h2>/';

	/**
	 * Now run the pattern and callback function on content
	 * and process it through a function that replaces the title with an id.
	 */
	$content = preg_replace_callback( $pattern, function( $matches ) {

		global $i;
		$title = $matches[1];
		$slug  = 'subtitle';
		$v     = ++ $i;

		return '<a class="entry-subtitle-link" href="' . get_the_permalink() . '#' . $slug . '-' . $v . '">#</a> <h2 class="entry-subtitle" id="' . $slug . '-' . $v . '">' . $title . '</h2>';
	}, $content );

	return $content;
}

//require_once( 'entry/uwd-markup-entry-post.php' );
require_once( 'entry/uwd-markup-entry-post-link.php' );
require_once( 'entry/uwd-markup-entry-video.php' );
require_once( 'entry/uwd-markup-entry-weekly.php' );
require_once( 'entry/uwd-markup-entry-book.php' );