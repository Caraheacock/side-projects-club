<?php
get_header();
$cat_title = single_cat_title('', false);
?>
<section>
    <div class="row">
        <div class="col xs-12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-8'; ?>">
            <div class="col-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php printf(__('Category: %s', 'side-projects-club'), $cat_title); ?></h2>
                    <h4><?php
                        printf(
                            _x('%1$s categorized as %2$s', '# categorized as Category', 'side-projects-club'),
                            pluralize(
                                $wp_query->found_posts,
                                _x('post', 'noun', 'side-projects-club'),
                                _x('posts', 'plural noun', 'side-projects-club')
                            ),
                            $cat_title
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
                    <p><?php printf(_x('Sorry, no posts categorized as %s.', 'category title', 'side-projects-club'), $cat_title); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
