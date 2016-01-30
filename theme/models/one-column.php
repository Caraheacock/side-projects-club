<?php
$one_column = new PuzzleSection;
$one_column->set_group_name('One Column')
    ->set_group_name_slug('one-column')
    ->set_single_name('Column')
    ->set_fixed_column_num(1)
    ->set_admin_column_classes('xs-span12')
    ->set_order(10)
    ->set_markup_attr(array(
        'classes'           => array(
            'name'          => 'Classes',
            'input_type'    => 'text'
        ),
        'align_text'        => array(
            'name'          => 'Align Text',
            'input_type'    => 'select',
            'options'       => array(
                'Left'      => 'left',
                'Center'    => 'center',
                'Right'     => 'right'
            )
        ),
        'skip_filter'       => array(
            'name'          => 'Do not apply WordPress content filter',
            'input_type'    => 'checkbox'
        ),
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 10,
            'save_as'       => 'content'
        )
    ))
    ->set_options(array(
        'id'                => array(
            'name'          => 'Section Slug',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'text'
        ),
        'background_color'        => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'             => 'white-background',
                'Light blue'        => 'light-blue-background',
                'Blue'              => 'blue-background',
                'Orange'            => 'orange-background'
            )
        ),
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs span12 sm-span6 md-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'padding_bottom'    => array(
            'name'          => 'Bottom Padding',
            'width'         => 'xs span12 sm-span6 md-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'paragraph_spacing' => array(
            'name'          => 'Paragraph Spacing',
            'width'         => 'xs-span12 sm-span6 md-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Loose'     => 'loose',
                'Tight'     => 'tight'
            )
        )
    ));

$puzzle_pieces = new PuzzlePieces;
$puzzle_pieces->add_section($one_column);
?>