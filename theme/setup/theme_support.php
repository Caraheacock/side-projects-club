<?php

/*
 * Puzzle
 * Theme Support
 */

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
