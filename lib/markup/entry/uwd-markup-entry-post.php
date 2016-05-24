<?php

//* Add icon markup for Standard post.
//add_action( 'genesis_entry_content', 'uwd_entry_normal_type_icon' );
function uwd_entry_normal_type_icon() {
	if ( get_post_type() != 'post' || has_post_format( 'link' ) ) {
		return;
	}

	?>
	<div class="entry-content-icon">
		<span class="dashicons dashicons-admin-post"></span>
	</div>
	<?php
}