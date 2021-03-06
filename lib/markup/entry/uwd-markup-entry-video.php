<?php

//* Markup for Video post type's video.
add_action( 'genesis_entry_header', 'uwd_entry_video_type_video', 16 );
function uwd_entry_video_type_video() {
	if ( get_post_type() != 'videos' || ! is_single() ) {
		return;
	}
	$video_url = get_field( 'video_url' );
	$step1     = explode( 'v=', $video_url );
	$step2     = explode( '&', $step1[1] );
	$video_id  = $step2[0];
	?>
	<div class="entry-video">
		<iframe width="100%" height="390" src="https://www.youtube.com/embed/<?php echo $video_id; ?>"
		        frameborder="0" allowfullscreen></iframe>
	</div>
	<?php
}

//* Add meta support for videos.
add_post_type_support( 'videos', 'genesis-entry-meta-after-content' );