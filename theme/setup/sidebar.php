<?php

/*
 * Side Projects Club
 * Sidebar
 */

/* Initialize sidebar */
function spc_sidebar_init() {
    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'spc_sidebar_init');

?>
