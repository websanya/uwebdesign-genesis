<?php

//* Change site-title fallback to be SEO-friendly.
add_filter( 'genesis_site_title_wrap', 'uwd_site_title_markup' );
function uwd_site_title_markup() {
	if ( is_front_page() ) {
		return 'h1';
	} else {
		return 'h3';
	}
}

//* Change site-title fallback to be SEO-friendly.
add_filter( 'genesis_site_description_wrap', 'uwd_site_description_markup' );
function uwd_site_description_markup() {
	if ( is_front_page() ) {
		return 'h3';
	} else {
		return 'h4';
	}
}

//* Add 'header-banner-container' div to header, after the 'title-area'.
add_action( 'genesis_header', 'uwd_header_right', 11 );
function uwd_header_right() {
	?>
	<div class="header-banner-container">
		<?php
		$query_args = array(
			'post_type'      => 'banner',
			'orderby'        => 'rand',
			'posts_per_page' => 1,
		);

		$query = new WP_Query( $query_args );

		while ( $query->have_posts() ) : $query->the_post();
			?>
			<a href="<?php the_field( 'banner_url' ); ?>" rel="nofollow">
				<img width="770" height="140" src="<?php the_field( 'banner_img_header' ); ?>"
				     class="header-banner-image" alt="<?php the_title(); ?>">
			</a>
			<?php
		endwhile;

		//* Reset Post Data.
		wp_reset_postdata();
		?>
	</div>
	<?php
}

//* Add site logo.
add_action( 'genesis_site_title', function() {
	?>
	<a class="site-logo" href="<?php echo home_url(); ?>">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="">
	</a>
	<?php
}, 9 );

//* Reposition the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );