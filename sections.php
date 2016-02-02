<?php
$page_sections = get_post_meta($post->ID, 'puzzle_page_sections', true);

if (!empty($page_sections)) :
    $s = 0;
    
    foreach ($page_sections as $page_section) :
        $puzzle_options_data = $page_section['options'];
        $puzzle_columns_data = (!empty($page_section['columns']) ? $page_section['columns'] : false);
        $puzzle_section_type = $page_section['type'];
        
        $section_id = 'section-' . ($s + 1);
        if (!empty($puzzle_options_data['id'])) {
            $section_id = to_slug($puzzle_options_data['id']);
        } else if (!empty($puzzle_options_data['headline'])) {
            $section_id = to_slug($puzzle_options_data['headline']);
        }
        ?>
        <section id="<?php echo $section_id; ?>" class="<?php echo section_classes($page_section); ?>">
            <?php if (!empty($puzzle_options_data['headline'])) : ?>
            <div class="row puzzle-section-headline">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <h2><?php echo $puzzle_options_data['headline']; ?></h2>
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
        
                foreach($puzzle_columns_data as $puzzle_column) {
                    include(locate_template($loop_file_location));
                }
                ?>
            </div>
        </section>
        <?php
        $s++;
    endforeach;
endif;

?>