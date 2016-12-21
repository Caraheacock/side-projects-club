<?php

/*
 * Side Projects Club
 * Helper functions
 */

/*
 * Generates favicon code
 *
 * Returns a string of favicons separated by new lines
 */
function get_the_favicons() {
    $favicons = array();
    
    $apple_sizes = array(57, 114, 72, 144, 60, 120, 76, 152);
    $standard_sizes = array(196, 96, 32, 16, 128);
    $ms_sizes = array(
        'TileImage'         => array(144, 144),
        'square70x70logo'   => array(70, 70),
        'square150x150logo' => array(150, 150),
        'wide310x150logo'   => array(310, 150),
        'square310x310logo' => array(310, 310)
    );
    
    foreach ($apple_sizes as $size) {
        $dimensions = $size . 'x' . $size;
        $favicons[] = '<link rel="apple-touch-icon-precomposed" sizes="' . $dimensions . '" href="' . get_template_directory_uri() . '/assets/images/favicons/apple-touch-icon-' . $dimensions . '.png" />';
    }
    
    foreach ($standard_sizes as $size) {
        $dimensions = $size . 'x' . $size;
        $favicons[] = '<link rel="icon" type="image/png" href="' . get_template_directory_uri() . '/assets/images/favicons/favicon-' . $dimensions . '.png" sizes="' . $dimensions . '" />';
    }
    
    $favicons[] = '<meta name="application-name" content="&nbsp;"/>';
    $favicons[] = '<meta name="msapplication-TileColor" content="#FFFFFF" />';
    
    foreach ($ms_sizes as $name => $size) {
        $dimensions = $size[0] . 'x' . $size[1];
        $favicons[] = '<meta name="msapplication-' . $name . '" content="' . get_template_directory_uri() . '/assets/images/favicons/mstile-' . $dimensions . '.png" />';
    }
    
    return join("\n    ", $favicons);
}

/* Echos the favicons */
function the_favicons() { echo get_the_favicons(); }

/*
 * Determines classes for a section. Can be edited on a theme-by-theme basis.
 *
 * $page_section - array of data pertaining to the section
 *
 * Returns a string of classes for a section
 */
function spc_section_classes($page_section) {
    $puzzle_options_data = $page_section['options'];
    
    $section_classes  = 'pz-' . $page_section['type'] . '-section';
    $section_classes .= (!empty($puzzle_options_data['background_color']) ? ' ' . $puzzle_options_data['background_color'] . '-background' : '');
    $section_classes .= (!empty($puzzle_options_data['padding_top']) ? ' pz-section-' . $puzzle_options_data['padding_top'] . '-padding-top' : '');
    $section_classes .= (!empty($puzzle_options_data['padding_bottom']) ? ' pz-section-' . $puzzle_options_data['padding_bottom'] . '-padding-bottom' : '');
    $section_classes .= (!empty($puzzle_options_data['paragraph_spacing']) ? ' ' . $puzzle_options_data['paragraph_spacing'] . '-spacing' : '');
    
    if (!empty($puzzle_options_data['align_items']) && $puzzle_options_data['align_items'] == 'top') {
        $section_classes .= ' align-top';
    }
    
    return $section_classes;
}

/*
 * Determines the ID for a section. Can be edited on a theme-by-theme basis.
 *
 * $s - integer, the section number we are on
 * $page_section - array of data pertaining to the section
 *
 * Returns a string of the ID for a section
 */
function spc_section_id($s, $page_section) {
    $puzzle_options_data = $page_section['options'];
    
    $section_id = 'section-' . ($s + 1);
    if (!empty($puzzle_options_data['id'])) {
        $section_id = ppb_parameterize($puzzle_options_data['id']);
    } else if (!empty($puzzle_options_data['headline'])) {
        $section_id = ppb_parameterize($puzzle_options_data['headline']);
    }
    
    return $section_id;
}

?>
