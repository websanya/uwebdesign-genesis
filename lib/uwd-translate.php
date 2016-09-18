<?php
/**
 * All the Genesis to Russian translation.
 */

//* Translate entry header meta.
add_filter( 'genesis_post_info', 'uwd_custom_post_meta' );
function uwd_custom_post_meta() {
	$output = '<a href="' . get_the_permalink() . '">[post_date]</a> — <a href="' . get_the_permalink() . '#respond">' . russian_comments( get_comments_number(), array(
			'комментарий',
			'комментария',
			'комментариев',
		) ) . '</a>';
	if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
		$output .= ' <a class="entry-meta-edit" href="' . get_edit_post_link() . '">(редактировать)</a>';
	}

	return $output;
}

//* Translate the read more link text.
add_filter( 'get_the_content_more_link', 'uwd_custom_read_more_link' );
add_filter( 'the_content_more_link', 'uwd_custom_read_more_link' );
function uwd_custom_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Читать далее &rarr;</a>';
}

//* Translate breadcrumbs.
add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
	$args['home']                = 'uWebDesign';
	$args['sep']                 = ' » ';
	$args['labels']['prefix']    = '';
	$args['labels']['author']    = 'Автор: ';
	$args['labels']['category']  = 'Рубрика: '; // Genesis 1.6 and later
	$args['labels']['tag']       = 'Метка: ';
	$args['labels']['date']      = 'Дата: ';
	$args['labels']['search']    = 'Поиск: ';
	$args['labels']['tax']       = 'Тип видео: ';
	$args['labels']['post_type'] = '';
	$args['labels']['404']       = 'Не найдено: '; // Genesis 1.5 and later
	return $args;
}

//* Translate comments title.
add_filter( 'genesis_title_comments', 'uwd_comments_text' );
function uwd_comments_text() {
	return '<h4 class="comment-list-title">' . russian_comments( get_comments_number(), array(
		'комментарий',
		'комментария',
		'комментариев',
	) ) . '</h4>';
}

//* Translate comments author text.
add_filter( 'comment_author_says_text', 'uwd_comment_author_says_text' );
function uwd_comment_author_says_text() {
	return 'прокомментировал';
}

//* Translate post category.
add_filter( 'genesis_post_categories_shortcode', 'uwd_post_categories' );
function uwd_post_categories() {
	$cats   = get_the_category_list( trim( ', ' ) . ' ' );
	$output = sprintf( '<span %s>', genesis_attr( 'entry-categories' ) ) . 'Рубрика: ' . $cats . '</span>';

	return $output;
}

//* Translate post tags.
add_filter( 'genesis_post_tags_shortcode', 'uwd_post_tags' );
function uwd_post_tags() {
	$tags   = get_the_tag_list( 'Метки: ', trim( ', ' ) . ' ' );
	$output = sprintf( '<span %s>', genesis_attr( 'entry-tags' ) ) . $tags . '</span>';

	return $output;
}

//* Translate search placeholder.
add_filter( 'genesis_search_text', 'uwd_search_text' );
function uwd_search_text() {
	return 'например: svg';
}

//* Translate search title text.
add_filter( 'genesis_search_title_text', 'uwd_search_title_text' );
function uwd_search_title_text() {
	return 'Вы искали: ';
}

//* Translate previous link text.
add_filter( 'genesis_prev_link_text', 'uwd_previous_link' );
function uwd_previous_link() {
	return '&#x000AB; <span class="pagination-mobile">Пред.</span>';
}

//* Translate next link text.
add_filter( 'genesis_next_link_text', 'uwd_next_link' );
function uwd_next_link() {
	return '<span class="pagination-mobile">След.</span> &#x000BB;';
}

//* Translate author page title.
add_filter( 'genesis_author_box_title', function() {
	return 'Автор: ' . get_the_author();
} );