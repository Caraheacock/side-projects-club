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
            <div class="row">
                <?php
                foreach($puzzle_columns_data as $puzzle_column) {
                    include(locate_template('loop-column.php'));
                }
                ?>
            </div>
        </section>
        <?php
        $s++;
    endforeach;
endif;

?>