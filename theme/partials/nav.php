<nav class="main-nav<?php if (is_front_page()) echo ' home-nav animate-nav'; ?>">
    <div class="row">
        <div class="col xs-8 sm-6 md-4 lg-3 nav-logo">
            <a class="small-logo-container" href="<?php echo get_site_url(); ?>">
                <?php include(TEMPLATEPATH . '/assets/images/logo.svg'); ?>
            </a>
        </div>
        <?php if (is_front_page()) : ?>
        <div class="col xs-8 sm-6 md-4 lg-3 home-scroll-to-content">
            <a class="spc-button" href="#"><?php _e('Explore', 'side-projects-club'); ?> <i class="fa fa-angle-double-down"></i></a>
        </div>
        <?php endif; ?>
        <div class="col xs-4 sm-6 md-8 lg-9">
            <?php
            if (has_nav_menu('primary')) {
                $args = array(
                    'theme_location'    => 'primary',
                    'container_id'      => 'desktop-nav-menu',
                    'container_class'   => 'desktop-nav-menu'
                );
                wp_nav_menu($args);
            
                $args = array(
                    'theme_location'    => 'primary',
                    'container_id'      => 'dl-menu',
                    'container_class'   => 'dl-menuwrapper',
                    'items_wrap'        => '<button class="dl-trigger">Open Menu</button><ul class="dl-menu">%3$s</ul>'
                );
                wp_nav_menu($args);
            }
            ?>
        </div>
    </div>
</nav>
