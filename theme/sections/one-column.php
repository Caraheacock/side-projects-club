<?php
/* Modify the page builder's existing section */
$one_column = $puzzle_sections->section('one-column');
$one_column->set_option_fields(array(
        $f->field('id')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('padding_top')->set_width(6),
        $f->field('padding_bottom')->set_width(6),
        $f->field('paragraph_spacing')->set_width(6)
    ))
    ->set_column_fields(array(
        $f->field('classes'),
        $f->field('align_text')->set_selected('left'),
        $f->field('skip_filter'),
        $f->field('content')
    ));
?>
