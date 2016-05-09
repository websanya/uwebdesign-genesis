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

//* Connect Ya Share.
add_action( 'genesis_entry_content', 'uwd_entry_ya_share' );
function uwd_entry_ya_share() {
	?>
	<div id="share-<?php echo get_the_ID(); ?>"></div>
	<?php
	//* Cache featured image src.
	$entry_image_id  = get_post_thumbnail_id();
	$entry_image_src = wp_get_attachment_image_src( $entry_image_id, 'uwd-custom-medium' )[0];
	?>
	<script>
		var share = Ya.share2( '#share-<?php echo get_the_ID(); ?>', {
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
