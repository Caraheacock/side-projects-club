<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            <div class="column-inner">
            <?php
            if (have_posts()) :
                while (have_posts()) {
                    the_post();
                    get_template_part('theme/loops/loop');
                }
            
                get_template_part('theme/partials/pagination');
                ?>
            <?php else : ?>
                <h1><?php _e('No results', 'side-projects-club'); ?></h1>
                <p><?php _e('Sorry, no posts found.', 'side-projects-club'); ?></p>
            <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
