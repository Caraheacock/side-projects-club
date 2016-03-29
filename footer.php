<?php
$social = get_theme_mod('social_media');

if (!empty($social)) {
    foreach($social as $soc => $data) {
        if (empty($data['link'])) unset($social[$soc]);
    }
}
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
                        <?php foreach ($social as $soc => $data) :
                            if ($soc == 'meetup') {
                                $icon = 'calendar-o';
                            } else {
                                $icon = $soc;
                            }
                            ?>
                        <li><a href="<?php echo $data['link']; ?>"<?php echo (!empty($data['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>><i class="fa fa-<?php echo $icon; ?>"></i></a></li>
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