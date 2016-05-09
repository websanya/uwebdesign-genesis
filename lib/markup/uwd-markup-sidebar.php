<?php

//* Customize widget titles' markup.
add_filter( 'genesis_register_widget_area_defaults', 'uwd_sidebar_title_markup' );
function uwd_sidebar_title_markup() {
	$args = array(
		'before_widget' => genesis_markup( array(
			'html5' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'xhtml' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'echo'  => false,
		) ),
		'after_widget'  => genesis_markup( array(
			'html5' => '</div></section>' . "\n",
			'xhtml' => '</div></div>' . "\n",
			'echo'  => false,
		) ),
		'before_title'  => '<h5 class="widget-title widgettitle">',
		'after_title'   => "</h5>\n",
	);

	return $args;
}