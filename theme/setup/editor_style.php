<?php
/*
 * Side Projects Club
 * Custom Editor Style
 */

/* Insert Formats dropdown into TinyMCE buttons */
function spc_mce_buttons($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'spc_mce_buttons');

/* Add style options */
function spc_insert_formats($init_array) {
    $style_formats = array(
        array(
            'title'     => 'Button',
            'inline'    => 'a',
            'selector'  => 'a',
            'classes'   => 'puzzle-button'
        )
    );
    
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    
    return $init_array;
}
add_filter('tiny_mce_before_init', 'spc_insert_formats');

/* Add editor stylesheets so the content looks more like it will on the frontend */
add_editor_style('assets/css/editor-style.css');

?>
