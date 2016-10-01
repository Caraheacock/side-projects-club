<?php get_header(); ?>
<section>
    <div class="row">
        <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2>Category: <?php single_cat_title(); ?></h2>
                    <h4><?php echo pluralize($wp_query->found_posts, 'post'); ?> <?php _e('categorized as', 'side-projects-club'); ?> &quot;<?php echo single_cat_title(); ?>&quot;</h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
                
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1><?php _e('No results', 'side-projects-club'); ?></h1>
                    <p><?php _e('Sorry, no posts tagged as', 'side-projects-club'); ?> &quot;<?php echo single_tag_title(); ?>&quot;.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
