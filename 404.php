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

		</div>

	</article>

	<?php
}

genesis();