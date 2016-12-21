<?php get_header(); ?>
<section>
    <div class="row">
        <div class="col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8'; ?>">
            <div class="col-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php printf(__('Search: %s', 'side-projects-club'), get_search_query()); ?></h2>
                    <h4><?php
                        echo pluralize(
                            $wp_query->found_posts,
                            _x('result', 'noun', 'side-projects-club'),
                            _x('results', 'plural noun', 'side-projects-club')
                        ); ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
                
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1><?php _e('No results', 'side-projects-club'); ?></h1>
                    <p><?php printf(_x('Sorry, no posts found for %s.', 'search query', 'side-projects-club'), '&ldquo;' . get_search_query() . '&rdquo;'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
