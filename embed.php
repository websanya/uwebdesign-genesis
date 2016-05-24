<?php
/**
 * Contains the post embed base template
 */

get_header( 'embed' );

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

			/**
			 * Filter the thumbnail image size for use in the embed template.
			 */
			$image_size = 'medium';
			$image_size = apply_filters( 'embed_thumbnail_image_size', $image_size, $thumbnail_id );

			/**
			 * Filter the thumbnail shape for use in the embed template.
			 *
			 * Rectangular images are shown above the title while square images
			 * are shown next to the content.
			 */
			$shape = 'square';
			$shape = apply_filters( 'embed_thumbnail_image_shape', $shape, $thumbnail_id );

			if ( 'rectangular' === $shape ) : ?>
				<div class="wp-embed-featured-image rectangular">
					<a href="<?php the_permalink(); ?>" target="_top">
						<?php echo wp_get_attachment_image( $thumbnail_id, $image_size ); ?>
					</a>
				</div>
			<?php endif; ?>

			<p class="wp-embed-heading">
				<a href="<?php the_permalink(); ?>" target="_top">
					<?php the_title(); ?>
				</a>
			</p>

			<?php if ( 'square' === $shape ) : ?>
				<div class="wp-embed-featured-image square">
					<a href="<?php the_permalink(); ?>" target="_top">
						<?php echo wp_get_attachment_image( $thumbnail_id, $image_size ); ?>
					</a>
				</div>
			<?php endif; ?>

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

get_footer( 'embed' );
