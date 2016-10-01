<?php
/* Modify the page builder's existing section */
$accordions = $puzzle_sections->section('accordions');
$accordions->set_option_fields(array(
        $f->field('headline')->set_width(6),
        $f->field('id')->set_width(6),
        $f->field('background_color')->set_width(4),
        $f->field('padding_top')->set_width(4),
        $f->field('padding_bottom')->set_width(4)
    ));
?>
