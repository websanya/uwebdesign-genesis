<?php

//* Add icon markup for Link post format.
add_action( 'genesis_entry_content', 'uwd_entry_books_link' );
function uwd_entry_books_link() {
	if ( get_post_type() != 'books' ) {
		return;
	}
	$book_id = get_the_ID();
	?>
	<a class="direct-link" href="<?php echo get_post_meta( $book_id, 'book_url', true ); ?>" rel="nofollow">&rarr;
		Ссылка для ознакомления &larr;</a>
	<?php
}

//* Add meta support for books.
add_post_type_support( 'books', 'genesis-entry-meta-after-content' );