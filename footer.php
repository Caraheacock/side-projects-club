<?php
$footer = get_option('puzzle_footer');
$footer_logo = (!empty($footer['logo']) ? stripslashes_deep($footer['logo']) : false);
$footer_content = (!empty($footer['content']) ? stripslashes_deep($footer['content']) : false);
$social = array_filter(get_option('puzzle_social', array()));
?>
    <footer id="footer" class="blue-background">
        <div class="row">
            <div class="column xs-span12">
                <div class="column-inner">
                    <?php if ($footer_logo) : ?>
                    <a class="small-logo-container" href="<?php echo get_site_url(); ?>">
                        <?php echo $footer_logo; ?>
                    </a>
                    <?php endif; ?>
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