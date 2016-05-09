<?php

//* Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Customize the output.
add_action( 'genesis_loop', 'genesis_404' );
function genesis_404() {
	?>

	<article class="entry">

		<header class="entry-header">

			<img width="622" height="415" class="post-image entry-image"
			     src="<?php echo get_stylesheet_directory_uri() . '/img/black_hole.jpg'; ?>"
			     alt="404 image">

			<div class="entry-header-inner">
				<h1 class="entry-title">Не найдено (404).</h1>
			</div>

		</header>

		<div class="entry-content">

			<p>Страница, которую вы ищете, больше не существует. Возможно стоит вернуться на <a
					href="<?php echo home_url(); ?>">главную</a> или воспользовать поиском?</p>

			<?php echo get_search_form(); ?>

			<p>
				<?php do_shortcode( '[uwd_articles]' ); ?>
			</p>
			<p>
				<?php do_shortcode( '[tweet_this]testing of wrapping shortcode[/tweet_this]' ) ?>
			</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum nobis reprehenderit vitae. Accusamus
				asperiores assumenda corporis fuga minima, modi molestiae nemo nesciunt perspiciatis quisquam quod
				ratione sequi, suscipit tempore voluptate!</p>
			<p>A aliquam animi aperiam architecto cupiditate delectus deserunt dicta doloremque ea ex facere, id in,
				molestiae neque numquam pariatur quia quidem rerum sapiente sed suscipit tenetur velit vitae voluptas
				voluptatibus.</p>
			<p>Accusantium aliquid, commodi ducimus earum eius excepturi fugiat fugit id illo iusto maiores, molestias
				mollitia nobis odit porro praesentium quidem quod recusandae reiciendis rem suscipit ullam voluptatem
				voluptates. Adipisci, ipsam.</p>

		</div>

	</article>

	<?php
}

genesis();