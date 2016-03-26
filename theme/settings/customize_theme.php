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
    
    $social_media = array('facebook', 'meetup', 'twitter', 'tumblr', 'slack');
    
    foreach ($social_media as $soc) {
        $wp_customize->add_setting('social_media[' . $soc . '][link]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('social_media[' . $soc . '][link]', array(
            'label'             => ucfirst($soc),
            'section'           => 'puzzle_social_media',
            'settings'          => 'social_media[' . $soc . '][link]',
            'type'              => 'text'
        ));
        
        $wp_customize->add_setting('social_media[' . $soc . '][open_link_in_new_tab]', array(
            'default'           => '',
            'sanitize_callback' => 'esc_attr',
            'transport'         => 'refresh'
        ));
    
        $wp_customize->add_control('social_media[' . $soc . '][open_link_in_new_tab]', array(
            'label'             => 'Open link in new tab',
            'section'           => 'puzzle_social_media',
            'settings'          => 'social_media[' . $soc . '][open_link_in_new_tab]',
            'type'              => 'checkbox'
        ));
    }
}
add_action('customize_register', 'puzzle_customize_register');

?>