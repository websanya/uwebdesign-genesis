<?php

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	?>
	Все права защищены © 2014-<?php echo date( 'Y' ); ?> uWebDesign. Сделано с <a
		class="hearts-link" href="https://uwebdesign.ru/humans.txt">♥</a> в Челябинске.<br>
	<a href="<?php echo home_url( 'user-agreement' ); ?>">Пользовательское
		соглашение</a>. Сайт работает на <a href="<?php echo home_url( 'smartape' ); ?>">хостинге SmartApe</a>.
	<?php
}