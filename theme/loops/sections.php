<?php
$page_sections = get_post_meta($post->ID, '_puzzle_page_sections', true);
$puzzle_sections = (new PuzzleSections)->sections();

if (!empty($page_sections)) :
    foreach ($page_sections as $s => $page_section) :
        $puzzle_section_type = $page_section['type'];
        
        /*
         * If this section type is not valid (likely because the user removed
         * this section type but its data was still in the database), skip it.
         */
        if (!array_key_exists($puzzle_section_type, $puzzle_sections)) continue;
        
        $puzzle_options_data = $page_section['options'];
        $puzzle_columns_data = (!empty($page_section['columns']) ? $page_section['columns'] : false);
        
        $main_content = (!empty($puzzle_options_data['main_content']) ? $puzzle_options_data['main_content'] : false);
        ?>
        <section id="<?php echo spc_section_id($s, $page_section); ?>" class="<?php echo spc_section_classes($page_section); ?>">
            <?php if (!empty($puzzle_options_data['headline'])) : ?>
            <div class="row puzzle-section-headline">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <h2><?php echo $puzzle_options_data['headline']; ?></h2>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($main_content)) : ?>
            <div class="row puzzle-main-content">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <?php echo apply_filters('the_content', $main_content); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="row<?php echo ($puzzle_section_type == 'accordions' ? ' puzzle-accordions-content' : ''); ?>">
                <?php
                $loop_file_name = $puzzle_section_type;
                
                if ($puzzle_section_type == 'one-column' || $puzzle_section_type == 'two-column') {
                    $loop_file_name = 'columns';
                }
                
                $loop_file_location = 'theme/loops/' . $loop_file_name . '.php';
        
                foreach ($puzzle_columns_data as $puzzle_column) {
                    include(locate_template($loop_file_location));
                }
                ?>
            </div>
        </section>
        <?php
    endforeach;
endif;
?>
