<?php
/* Create new fields */
$align_items = new PuzzleField;
$align_items->set_name('Vertically Align Columns')
    ->set_id('align_items')
    ->set_input_type('select')
    ->set_options(array(
        'center'    => 'Center',
        'top'       => 'Top'
    ))
    ->set_width(6);

/* Modify the page builder's existing section */
$two_column = $puzzle_sections->section('two-column');
$two_column->set_option_fields(array(
        $f->field('id')->set_width(6),
        $f->field('background_color')->set_width(6),
        $f->field('padding_top')->set_width(6),
        $f->field('padding_bottom')->set_width(6),
        $f->field('paragraph_spacing')->set_width(6),
        $align_items
    ))
    ->set_column_fields(array(
        $f->field('classes'),
        $f->field('align_text')->set_selected('left'),
        $f->field('skip_filter'),
        $f->field('content')
    ));
?>
