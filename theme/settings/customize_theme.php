<?php

/*
 * Puzzle
 * Theme Customizations
 */

function puzzle_customize_register($wp_customize) {
    /* Social */
    $wp_customize->add_section('puzzle_social_media' , array(
        'title'      => 'Social Media',
        'priority'   => 200
    ));
    
    $social_media = array('facebook', 'meetup', 'twitter', 'tumblr');
    
    foreach ($social_media as $soc) {
        $wp_customize->add_setting($soc, array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control($soc, array(
            'label'             => ucfirst($soc),
            'section'           => 'puzzle_social_media',
            'settings'          => $soc,
            'type'              => 'text'
        ));
    }
}
add_action('customize_register', 'puzzle_customize_register');

?>