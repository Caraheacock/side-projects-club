<div id="post-<?php the_ID(); ?>" <?php post_class('puzzle-loop'); ?>>
    <h3><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h3>

    <?php if (get_post_type($post) == 'post') : ?>
    <h5><?php the_time('F j, Y'); ?>, by <?php the_author(); ?></h5>
    <?php endif; ?>

    <?php
    if (has_post_thumbnail()) {
        $args = array(
            'class' => 'alignright'
        );
        the_post_thumbnail('small', $args);
    }
    ?>

    <?php the_excerpt(); ?>
    <p><a class="puzzle-button" href="<?php echo get_the_permalink($post->ID); ?>">Read More</a></p>
</div>