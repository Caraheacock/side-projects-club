<?php

/*
 * Puzzle
 * Theme Support
 */

/* Add theme supports */
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');

/*
 * Add like_the_content Filter
 *
 * Has the same actions as the_content but for times when running
 * the_content filter conflicts with plugins.
 * 
 * The only action this does not have is 'prepend_attachment' because
 * it causes attachment pages to show attachments in weird places.
 */
$actions = array('wptexturize', 'convert_smilies', 'convert_chars', 'wpautop', 'shortcode_unautop');
foreach ($actions as $action) {
    add_filter('like_the_content', $action);
}

/*
 * Add title for home page
 * Workaround for title being blank if the front page is
 * a custom home page.
 */
function spc_title_for_home($title) {
    if (empty($title) && (is_home() || is_front_page())) {
        return get_bloginfo() . ' | ' . get_bloginfo('description');
    }
    
    return $title;
}
add_filter('wp_title', 'spc_title_for_home');

/*
 * Alters formatting of excerpt_more
 * Default is [...]
 */
function spc_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'spc_excerpt_more');

/* Set $content_width variable */
if (!isset($content_width)) $content_width = 1200;

/* Add basic SVG support to allowed tags */
function spc_allow_svg_tags() {
    global $allowedposttags;
    
    $svgtags = array(
        'svg'                       => array(
            'aria-labelledby'       => true,
            'class'                 => true,
            'id'                    => true,
            'preserveaspectratio'   => true,
            'style'                 => true,
            'version'               => true,
            'viewbox'               => true,
            'xmlns'                 => true
        ),
        'circle'                    => array(
            'class'                 => true,
            'cx'                    => true,
            'cy'                    => true,
            'fill'                  => true,
            'id'                    => true,
            'r'                     => true,
            'style'                 => true,
        ),
        'ellipse'                   => array(
            'class'                 => true,
            'cx'                    => true,
            'cy'                    => true,
            'fill'                  => true,
            'id'                    => true,
            'rx'                    => true,
            'ry'                    => true,
            'style'                 => true,
        ),
        'g'                         => array(
            'class'                 => true,
            'id'                    => true,
        ),
        'line'                      => array(
            'class'                 => true,
            'id'                    => true
        ),
        'linearGradient'            => array(
            'class'                 => true,
            'id'                    => true,
            'stroke'                => true,
            'stroke-width'          => true,
            'x1'                    => true,
            'x2'                    => true,
            'y1'                    => true,
            'y2'                    => true
        ),
        'path'                      => array(
            'class'                 => true,
            'd'                     => true,
            'fill'                  => true,
            'id'                    => true,
        ),
        'polygon'                   => array(
            'class'                 => true,
            'fill'                  => true,
            'id'                    => true,
            'points'                => true
        ),
        'rect'                      => array(
            'class'                 => true,
            'fill'                  => true,
            'height'                => true,
            'id'                    => true,
            'style'                 => true,
            'width'                 => true,
            'x'                     => true,
            'y'                     => true
        ),
        'stop'                      => array(
            'class'                 => true,
            'offset'                => true
        )
    );

    $allowedposttags = array_merge($allowedposttags, $svgtags);
}
add_action('init', 'spc_allow_svg_tags');

?>
