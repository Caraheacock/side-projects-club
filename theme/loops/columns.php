<div class="column <?php echo (!empty($puzzle_column['classes']) ? $puzzle_column['classes'] : 'xs-span12'); echo (!empty($puzzle_column['align_text']) ? ' align-text-' . $puzzle_column['align_text'] : ''); ?>">
    <div class="column-inner">
        <?php
        if (empty($puzzle_column['skip_filter'])) {
            echo apply_filters('the_content', $puzzle_column['content']);
        } else {
            echo $puzzle_column['content'];
        }
        ?>
    </div>
</div>