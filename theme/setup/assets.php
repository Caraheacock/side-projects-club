<?php

/*
 * Side Projects Club
 * Assets
 */

/* Add styles and scripts */
function spc_scripts() {
    /* Google fonts */
    wp_enqueue_style('google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i');
    
    /* Main styles */
    $spc_style_location = '/assets/css/main.css';
    wp_enqueue_style('side-projects-club-style', get_template_directory_uri() . $spc_style_location, array(), filemtime(get_stylesheet_directory() . $spc_style_location));
    
    /* DL Menu Modernizr */
    $dl_menu_modernizr_location = '/assets/js/lib/modernizr.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-modernizr',
        get_template_directory_uri() . $dl_menu_modernizr_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_modernizr_location)
    );
    
    /* DL Menu */
    $dl_menu_script_location = '/assets/js/lib/jquery.dlmenu.js';
    wp_enqueue_script(
        'dl-menu-script',
        get_template_directory_uri() . $dl_menu_script_location,
        array('jquery'),
        filemtime(get_stylesheet_directory() . $dl_menu_script_location)
    );
    
    /* Main script */
    $spc_script_location = '/assets/js/main.js';
    wp_enqueue_script('side-projects-club-script', get_template_directory_uri() . $spc_script_location, array('jquery'), filemtime(get_stylesheet_directory() . $spc_script_location));
}
add_action('wp_enqueue_scripts', 'spc_scripts');

/* Add script for comments */
function pzp_enqueue_comments_reply() {
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('comment_form_before', 'pzp_enqueue_comments_reply');

?>
