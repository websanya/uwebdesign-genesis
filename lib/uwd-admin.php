<?php
/**
 * Some customizations made to the website admin.
 */

//* Deregister default sidebars.
unregister_sidebar( 'header-right' );
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

//* Reregister primary sidebar with some russian text.
add_action( 'after_setup_theme', 'uwd_register_sidebar', 12 );
function uwd_register_sidebar() {
	genesis_register_widget_area(
		array(
			'id'               => 'sidebar',
			'name'             => 'Основной сайдбар',
			'description'      => 'Все виджеты для сайдбара — сюда.',
			'_genesis_builtin' => true,
		)
	);
}

//* Remove Genesis Framework settings page metaboxes.
add_action( 'genesis_theme_settings_metaboxes', 'uwd_remove_layouts' );
function uwd_remove_layouts( $_genesis_theme_settings_pagehook ) {
	remove_meta_box( 'genesis-theme-settings-layout', $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage', $_genesis_theme_settings_pagehook, 'main' );
}

//* Remove Yoast SEO metabox on banner page.
add_action( 'add_meta_boxes', 'uwd_remove_meta_boxes', 100000 );
function uwd_remove_meta_boxes() {
	remove_meta_box( 'wpseo_meta', 'banner', 'normal' );
}

//* Remove Genesis Page Templates.
add_filter( 'theme_page_templates', 'uwd_remove_genesis_page_templates' );
function uwd_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );

	return $page_templates;
}