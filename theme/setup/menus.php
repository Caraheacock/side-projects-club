<?php

/*
 * Side Projects Club
 * Menus
 */

/* Register menus */
function spc_menus() {
    register_nav_menus( array(
        'primary'   => 'Primary Menu',
        'footer'    => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'spc_menus');

?>
