<?php
/**
 * Contains the post embed base template
 */

if ( ! headers_sent() ) {
	header( 'X-WP-embed: true' );
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php do_action( 'embed_head' ); ?>
</head>
<body <?php body_class(); ?>>

<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		?>
		<div <?php post_class( 'wp-embed' ); ?>>
			<?php
			$thumbnail_id = 0;

			if ( has_post_thumbnail() ) {
				$thumbnail_id = get_post_thumbnail_id();
			}

			if ( 'attachment' === get_post_type() && wp_attachment_is_image() ) {
				$thumbnail_id = get_the_ID();
			}

			$image_size = 'medium'; // Fallback.

			?>

			<div class="wp-embed-featured-image square">
				<a href="<?php the_permalink(); ?>" target="_top">
					<?php echo wp_get_attachment_image( $thumbnail_id, $image_size ); ?>
				</a>
			</div>

			<p class="wp-embed-heading">
				<a href="<?php the_permalink(); ?>" target="_top">
					<?php the_title(); ?>
				</a>
			</p>

			<div class="wp-embed-excerpt"><?php the_excerpt_embed(); ?></div>

			<?php
			/**
			 * Print additional content after the embed excerpt.
			 *
			 * @since 4.4.0
			 */
			do_action( 'embed_content' );
			?>

			<div class="wp-embed-footer">
				<?php the_embed_site_title() ?>

				<div class="wp-embed-meta">
					<?php
					/**
					 * Print additional meta content in the embed template.
					 *
					 * @since 4.4.0
					 */
					do_action( 'embed_content_meta' );
					?>
				</div>
			</div>
		</div>
		<?php

	endwhile;
else :
	?>
	<div class="wp-embed">
		<p class="wp-embed-heading"><?php _e( 'Oops! That embed can&#8217;t be found.' ); ?></p>

		<div class="wp-embed-excerpt">
			<p>
				<?php
				printf(
				/* translators: %s: a link to the embedded site */
					__( 'It looks like nothing was found at this location. Maybe try visiting %s directly?' ),
					'<strong><a href="' . esc_url( home_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></strong>'
				);
				?>
			</p>
		</div>

		<?php
		/** This filter is documented in wp-includes/theme-compat/embed-content.php */
		do_action( 'embed_content' );
		?>

		<div class="wp-embed-footer">
			<?php the_embed_site_title() ?>
		</div>
	</div>
	<?php
endif;

do_action( 'embed_footer' );

?>

</body>
</html>