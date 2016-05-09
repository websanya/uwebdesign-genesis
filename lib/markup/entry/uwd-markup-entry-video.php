<?php

//* Markup for Video post type's video.
add_action( 'genesis_entry_header', 'uwd_entry_video_type_video', 16 );
function uwd_entry_video_type_video() {
	if ( get_post_type() != 'video' || ! is_single() ) {
		return;
	}
	$video_url = get_field( 'video_url' );
	$step1     = explode( 'v=', $video_url );
	$step2     = explode( '&', $step1[1] );
	$video_id  = $step2[0];
	?>
	<div class="entry-video">
		<iframe width="100%" height="390" src="http://www.youtube.com/embed/<?php echo $video_id; ?>"
		        frameborder="0"></iframe>
	</div>
	<?php
}

//* Add icon markup for Video post type.
add_action( 'genesis_entry_content', 'uwd_entry_video_type_icon' );
function uwd_entry_video_type_icon() {
	if ( get_post_type() != 'video' ) {
		return;
	}
	?>
	<div class="entry-content-icon">
		<span class="dashicons dashicons-video-alt"></span>
	</div>
	<?php
}

//* Customize entry-meta for video post type (actually for all of them).
add_filter( 'genesis_post_meta', 'uwd_entry_video_type_taxonomy' );
function uwd_entry_video_type_taxonomy() {
	return '[post_categories] [post_tags] [post_terms]';
}

//* Customize 'post_terms' shortcode default args.
add_filter( 'genesis_post_terms_shortcode_defaults', 'uwd_entry_test' );
function uwd_entry_test() {
	$args = array(
		'after'    => '',
		'before'   => 'Тип видео: ',
		'sep'      => ', ',
		'taxonomy' => 'video-type',
	);

	return $args;
}