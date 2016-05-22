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
			'size'   => 'medium_large',
			'attr'   => genesis_parse_attr( 'entry-image', array() ),
		) );

		if ( ! empty( $img ) ) {
			printf( '<a href="%s" aria-hidden="true"><img class="post-image entry-image" src="%s" alt="' . get_the_title() .'"></a>', get_permalink(), $img );
		} else {
			printf( '<a href="%s" aria-hidden="true"><img width="622" height="415" class="post-image entry-image" src="%s" alt="placeholder image"></a>', get_permalink(), get_stylesheet_directory_uri() . '/img/placeholder.jpg' );
		}
	}
}

//* Customize entry-meta to include post_terms shortcode.
add_filter( 'genesis_post_meta', 'uwd_entry_video_type_taxonomy' );
function uwd_entry_video_type_taxonomy() {
	return '[post_categories] [post_terms] [post_tags]';
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

require_once( 'entry/uwd-markup-entry-post.php' );
require_once( 'entry/uwd-markup-entry-post-link.php' );
require_once( 'entry/uwd-markup-entry-video.php' );
require_once( 'entry/uwd-markup-entry-weekly.php' );

//* Connect Ya Share.
add_action( 'genesis_entry_content', 'uwd_entry_ya_share', 20 );
function uwd_entry_ya_share() {
	?>
	<div id="share-<?php echo get_the_ID(); ?>"></div>
	<?php
	//* Cache featured image src.
	$entry_image_id  = get_post_thumbnail_id();
	$entry_image_src = wp_get_attachment_image_src( $entry_image_id, 'uwd-custom-medium' )[0];
	?>
	<script>
		var share = Ya.share2( 'share-<?php echo get_the_ID(); ?>', {
			//* Get all the content related to post.
			content: {
				url: '<?php the_permalink(); ?>',
				title: '<?php the_title(); ?>',
				description: '<?php echo get_the_excerpt(); ?>',
				image: '<?php echo $entry_image_src; ?>'
			},
			theme: {
				services: 'vkontakte,twitter,facebook,gplus',
				counter: true
			}
		} );
	</script>
	<?php
}
