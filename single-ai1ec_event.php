<?php get_header(); ?>
    <main>
        <section>
            <div class="row">
                <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
                    <div class="column-inner">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>
                            <div class="single-post-meta">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        
                            <div class="single-post-content<?php echo (comments_open() ? ' comments-open' : ''); ?>">
                                <?php the_content(); ?>
                            </div>
                            
                            <?php
                            if (comments_open()) {
                                comments_template();
                            }
                        }
                    }
                    ?>
                    </div>
                </div>
                <?php
                if (is_active_sidebar('main-sidebar')) {
                    get_sidebar();
                }
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>