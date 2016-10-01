<?php
$paragraph_spacing = new PuzzleField;
$paragraph_spacing->set_name('Paragraph Spacing')
    ->set_id('paragraph_spacing')
    ->set_input_type('select')
    ->set_options(array(
        'loose' => 'Loose',
        'tight' => 'Tight'
    ))
    ->set_width(6);

$f->add_field($paragraph_spacing);
?>
