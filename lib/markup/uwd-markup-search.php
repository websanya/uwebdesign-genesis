<?php

//* Remove breadcrumbs for Search results.
add_action( 'genesis_before_header', 'uwd_remove_breadcrumbs' );
function uwd_remove_breadcrumbs() {
	if ( is_search() ) {
		remove_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );
	}
}

//* Customize search page with no results.
add_filter( 'genesis_noposts_text', 'uwd_customize_no_posts' );
function uwd_customize_no_posts() {
	?>
	<div class="entry">
		<div class="entry-content no-posts">
			<p>По вашему запросу ничего не найдено. Возможно стоит вернуться на <a
					href="<?php echo home_url(); ?>">главную</a> или воспользовать поиском ещё раз?</p>
			<?php echo get_search_form(); ?>
		</div>
	</div>
	<?php
}