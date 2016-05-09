<?php
/**
 * All script magic for the website.
 */

//* Include advanced Typekit.
add_action( 'genesis_before', 'uwd_typekit_markup' );
function uwd_typekit_markup() {
	?>
	<script>
		(function( d ) {
			var config = {
					kitId: 'arx7kli',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement, t = setTimeout( function() {
					h.className = h.className.replace( /\bwf-loading\b/g, "" ) + " wf-inactive";
				}, config.scriptTimeout ), tk = d.createElement( "script" ), f = false, s = d.getElementsByTagName( "script" )[0], a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if ( f || a && a != "complete" && a != "loaded" )return;
				f = true;
				clearTimeout( t );
				try {
					Typekit.load( config )
				} catch (e) {
				}
			};
			s.parentNode.insertBefore( tk, s )
		})( document );
	</script>
	<?php
}

add_action( 'wp_enqueue_scripts', 'uwd_dashicons' );
function uwd_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_enqueue_style( 'dashicons' );
	}
}

//* Add uWebDesign scripts.
add_action( 'wp_enqueue_scripts', 'uwd_scripts' );
function uwd_scripts() {
	wp_enqueue_script( 'uwd-color-thief', get_stylesheet_directory_uri() . '/js/min/uwebdesign.min.js', array(), '', true );
	wp_enqueue_script( 'uwd-ya-share', 'https://yastatic.net/share2/share.js', array(), '', false );
}