<?php

//* Markup for Weekly post type's content.
add_action( 'genesis_entry_content', 'uwd_entry_weekly_markup', 15 );
function uwd_entry_weekly_markup() {
	if ( get_post_type() != 'weeklies' || ! is_single() ) {
		return;
	}
	$weekly_content = get_field( 'weekly_content' );
	?>
	<div class="entry-content-weekly-container">
		<?php
		foreach ( $weekly_content as $weekly_item ) {
			?>
			<div class="entry-content-weekly-item">
				<img class="entry-content-weekly-item-image" width="300" height="300"
				     src="<?php echo $weekly_item['image']['sizes']['uwd-custom-medium']; ?>"
				     alt="<?php echo $weekly_item['title']; ?>">
				<h2 class="entry-content-weekly-item-title">
					<?php echo $weekly_item['title']; ?>
				</h2>
				<div class="entry-content-weekly-item-content">
					<?php echo $weekly_item['content']; ?>
				</div>
				<a class="entry-content-weekly-item-url" href="<?php echo $weekly_item['url']; ?>">Ссылка »</a>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}