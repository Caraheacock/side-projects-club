<?php

/*
 * Puzzle Page Builder
 * Config
 */

/* General settings */
function spc_modify_puzzle_settings($settings) {
    $settings->set_button_formats(false);
    $settings->set_templates_directory('/theme/loops');
    $settings->set_owl_carousel(false);
    $settings->set_icon_library(false);
    
    $settings->set_spacing(array(
        'unit'              => 'rem',
        'section_padding'   => 3
    ));
}
add_action('ppb_modify_settings', 'spc_modify_puzzle_settings');

/* Color modifications */
function wbg_modify_puzzle_colors($colors) {
    $blue = new PuzzleColor(array(
        'name'              => 'Blue',
        'id'                => 'blue',
        'color'             => '#6e90ca',
        'text_color_scheme' => 'light',
        'order'             => 0
    ));
    
    $orange = new PuzzleColor(array(
        'name'              => 'Orange',
        'id'                => 'orange',
        'color'             => '#f2af56',
        'text_color_scheme' => 'light',
        'order'             => 1
    ));
    
    $light_blue = new PuzzleColor(array(
        'name'              => 'Light Blue',
        'id'                => 'light-blue',
        'color'             => '#e5edf9',
        'text_color_scheme' => 'dark',
        'order'             => 2
    ));
    
    $white = new PuzzleColor(array(
        'name'              => 'White',
        'id'                => 'white',
        'color'             => '#fff',
        'text_color_scheme' => 'dark',
        'order'             => 3
    ));
    
    $colors->replace_theme_colors(array(
        $blue, $orange, $light_blue, $white
    ));
    
    $colors->set_text_colors(array(
        'headline_dark'     => '#444',
        'text_dark'         => '#666',
        'headline_light'    => '#fff',
        'text_light'        => '#fff'
    ));
    
    $colors->set_link_colors(array(
        'link_dark'         => $colors->theme_color('orange')->color(),
        'link_dark_hover'   => $colors->theme_color('blue')->color(),
        'link_light'        => '#ffdebc',
        'link_light_hover'  => 'rgba(255, 255, 255, 0.75)'
    ));
}
add_action('ppb_modify_colors', 'wbg_modify_puzzle_colors');

/* Field modifications */
function spc_modify_puzzle_fields($f) {
    foreach (glob(get_stylesheet_directory() . '/theme/fields/*.php') as $filename) {
        include $filename;
    }
}
add_action('ppb_modify_fields', 'spc_modify_puzzle_fields');

/* Section modifications */
function spc_modify_puzzle_sections($puzzle_sections, $f) {
    $puzzle_sections->keep_sections(array('one-column', 'two-column', 'accordions'));
    
    foreach (glob(get_stylesheet_directory() . '/theme/sections/*.php') as $filename) {
        include $filename;
    }
}
add_action('ppb_modify_sections', 'spc_modify_puzzle_sections', 10, 2);

?>
