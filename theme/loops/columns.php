<div class="col <?php echo (!empty($puzzle_column['classes']) ? $puzzle_column['classes'] : 'xs-12'); if (!empty($puzzle_column['align_text'])) echo ' align-text-' . $puzzle_column['align_text']; ?>">
    <div class="col-inner">
        <?php
        if (empty($puzzle_column['skip_filter'])) {
            echo ppb_format_content($puzzle_column['content']);
        } else {
            echo $puzzle_column['content'];
        }
        ?>
    </div>
</div>
