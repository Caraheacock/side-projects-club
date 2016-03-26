<?php

/*
 * Puzzle
 * Helper functions
 */

// Determines classes for a section. Can be edited on a theme-by-theme basis.
//
// $page_section - array of data pertaining to the section
//
// Returns a string of classes for a section
function section_classes($page_section) {
    $puzzle_options_data = $page_section['options'];
    
    $section_classes  = $page_section['type'] . '-section';
    $section_classes .= (!empty($puzzle_options_data['background_color']) ? ' ' . $puzzle_options_data['background_color'] : '');
    $section_classes .= (!empty($puzzle_options_data['padding_top']) ? ' ' . $puzzle_options_data['padding_top'] . '-padding-top' : '');
    $section_classes .= (!empty($puzzle_options_data['padding_bottom']) ? ' ' . $puzzle_options_data['padding_bottom'] . '-padding-bottom' : '');
    $section_classes .= (!empty($puzzle_options_data['paragraph_spacing']) ? ' ' . $puzzle_options_data['paragraph_spacing'] . '-spacing' : '');
    
    if (!empty($puzzle_options_data['align_items']) && $puzzle_options_data['align_items'] == 'top') {
        $section_classes .= ' align-top';
    }
    
    return $section_classes;
}

?>