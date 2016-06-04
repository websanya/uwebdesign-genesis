<?php

//* Add icon markup for Link post format.
add_action( 'genesis_entry_content', 'uwd_entry_link_format_icon' );
function uwd_entry_link_format_icon() {
	if ( ! has_post_format( 'link' ) ) {
		return;
	}
	?>
<!--	<div class="entry-content-icon">-->
<!--		<span class="dashicons dashicons-admin-links"></span>-->
		<a class="direct-link" href="<?php the_field( 'post_url' ); ?>" rel="nofollow">&rarr; Прямая ссылка &larr;</a>
<!-- Придумаем как по-другому сделать. -->
<!--	</div>-->
	<?php
}