<?php
$skip_filter = new PuzzleField;
$skip_filter->set_name('Do not apply WordPress content filter')
    ->set_id('skip_filter')
    ->set_input_type('checkbox');

$f->add_field($skip_filter);
?>
