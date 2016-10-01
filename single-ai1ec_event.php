<?php
get_header();
the_post();
?>
<section>
    <div class="row">
        <div class="column xs-span12<?php if (is_active_sidebar('main-sidebar')) echo ' lg-span8'; ?>">
            <div class="column-inner">
                <div class="single-post-meta">
                    <?php the_title('<h2>', '</h2>'); ?>
                </div>
                <div class="single-post-content<?php if (comments_open()) echo ' comments-open'; ?>">
                    <?php the_content(); ?>
                </div>
                <?php if (comments_open()) comments_template(); ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
