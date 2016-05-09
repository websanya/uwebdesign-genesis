<?php

//* Footer widgets.
add_action( 'genesis_before_footer', 'uwd_footer_widgets_markup' );
function uwd_footer_widgets_markup() {
	?>
	<aside id="footer-widgets" class="footer-widgets">
		<div class="footer-widgets-widget">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
				Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a,
				pede.</p>
			<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim
				pellentesque felis.</p>
		</div>
		<div class="footer-widgets-widget">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
				Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a,
				pede.</p>
			<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim
				pellentesque felis.</p>
		</div>
		<div class="footer-widgets-widget">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
				Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a,
				pede.</p>
			<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim
				pellentesque felis.</p>
		</div>
	</aside>
	<?php
}