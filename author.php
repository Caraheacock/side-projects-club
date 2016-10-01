<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

get_header();
?>
<section>
    <div class="row">
        <div class="column xs-span12<?php echo (is_active_sidebar('main-sidebar') ? ' lg-span8' : ''); ?>">
            <div class="column-inner">
                <?php if (have_posts()) : ?>
                    <h2><?php _e('Author:', 'side-projects-club'); ?> <?php echo $curauth->display_name; ?></h2>
                    <h4><?php echo $found_posts ?> post<?php if ($found_posts != 1) echo 's'; ?> <?php _e('written by', 'side-projects-club'); ?> <?php echo $curauth->display_name; ?></h4>
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('theme/loops/loop');
                    }
            
                    get_template_part('theme/partials/pagination');
                    ?>
                <?php else : ?>
                    <h1><?php _e('No results', 'side-projects-club'); ?></h1>
                    <p><?php _e('Sorry, no posts by', 'side-projects-club'); ?> <?php echo $curauth->display_name; ?>.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (is_active_sidebar('main-sidebar')) get_sidebar(); ?>
    </div>
</section>
<?php get_footer(); ?>
