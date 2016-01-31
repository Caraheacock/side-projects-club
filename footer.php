<?php
$footer = get_option('puzzle_footer');
$social = array_filter(array(
    'facebook'  => get_theme_mod('facebook'),
    'meetup'    => get_theme_mod('meetup'),
    'twitter'   => get_theme_mod('twitter'),
    'tumblr'    => get_theme_mod('tumblr')
));
?>
    <footer id="footer" class="blue-background">
        <div class="row">
            <div class="column xs-span12">
                <div class="column-inner">
                    <a class="small-logo-container" href="<?php echo get_site_url(); ?>">
                        <?php include('assets/images/logo.svg'); ?>
                    </a>
                    <?php
                    if (has_nav_menu('footer')) {
                        $args = array(
                            'theme_location'  => 'footer',
                            'menu'            => '',
                            'container'       => 'div',
                            'container_id'    => 'footer-menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => ''
                        );
                        wp_nav_menu($args);
                    }
                    ?>
                    
                    <?php if (!empty($social)) : ?>
                    <ul class="spc-social-links">
                        <?php foreach ($social as $soc => $link) :
                            if ($soc == 'meetup') {
                                $icon = 'calendar-o';
                            } else {
                                $icon = $soc;
                            }
                            ?>
                        <li><a href="<?php echo $link; ?>" target="_blank"><i class="fa fa-<?php echo $icon; ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>