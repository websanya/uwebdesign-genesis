<?php

//* Start the engine.
require_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'uWebDesign Theme' );
define( 'CHILD_THEME_URL', 'https://uwebdesign.ru/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Check anything.
add_action( 'genesis_before_header', 'custom_shit' );
function custom_shit() {

}

//* Lots of theme supports stuff.
require_once( 'lib/uwd-theme-supports.php' );

//* Admin customizations.
require_once( 'lib/uwd-admin.php' );

//* All the scripts come here.
require_once( 'lib/uwd-scripts.php' );

//* Main loop customizations.
require_once( 'lib/uwd-loop.php' );

//* All markup customizations for the website.
require_once( 'lib/markup/uwd-markup-site-header.php' );
require_once( 'lib/markup/uwd-markup-entry.php' );
require_once( 'lib/markup/uwd-markup-search.php' );
require_once( 'lib/markup/uwd-markup-sidebar.php' );
require_once( 'lib/markup/uwd-markup-footer-widgets.php' );

//* Translation markup stuff.
require_once( 'lib/uwd-translate.php' );