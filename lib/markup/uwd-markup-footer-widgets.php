<?php

//* Footer widgets.
add_action( 'genesis_before_footer', 'uwd_footer_widgets_markup' );
function uwd_footer_widgets_markup() {
	?>
	<aside id="footer-widgets" class="footer-widgets">
		<div class="footer-widgets-widget">
			<h5>Полезные ссылки</h5>
			<ul>
				<li><a href="<?php echo home_url( 'about' ); ?>">О проекте</a></li>
				<li><a href="<?php echo home_url( 'faq' ); ?>">Часто задаваемые вопросы</a></li>
				<li><a href="<?php echo home_url( 'advertise' ); ?>">Реклама на uWebDesign</a></li>
				<li><a href="<?php echo home_url( 'subscribe' ); ?>">Мы в соц. сетях</a></li>
				<li><a href="<?php echo home_url( 'contact' ); ?>">Связаться с нами</a></li>
			</ul>
		</div>
		<div class="footer-widgets-widget">
			<a href="<?php echo home_url( 'donate' ); ?>">
				<img class="donate-banner" src="<?php echo get_stylesheet_directory_uri(); ?>/img/doshik.jpg"
				     alt="Пожертвуй на развитие проекта">
			</a>
		</div>
		<div class="footer-widgets-widget">
			<h5>Наш подкаст</h5>
			<div class="pp-ssb-widget pp-ssb-widget-modern">
				<a
					href="https://itunes.apple.com/ru/podcast/uwebdesign-mysli-ob-it-i-web/id923355344?mt=2&#038;ls=1"
					class="pp-ssb-btn pp-ssb-itunes" title="Subscribe on iTunes">
					<span class="pp-ssb-ic"></span>
					в iTunes
				</a>
				<a href="https://subscribeonandroid.com/uwebdesign.ru/feed/podcast/"
				   class="pp-ssb-btn pp-ssb-android" title="Subscribe on Android">
					<span class="pp-ssb-ic"></span>
					в Android
				</a>
				<a href="https://uwebdesign.ru/feed/podcast/"
				   class="pp-ssb-btn pp-ssb-rss"
				   title="Subscribe via RSS">
					<span class="pp-ssb-ic"></span>
					в RSS
				</a>
			</div>
		</div>
	</aside>
	<?php
}