    </main>
    <?php
    $social = get_theme_mod('social_media');

    if (!empty($social)) {
        foreach($social as $soc => $data) {
            if (empty($data['link'])) unset($social[$soc]);
        }
    }
    ?>
    <footer class="main-footer blue-background">
        <div class="row">
            <div class="col xs-12">
                <div class="col-inner">
                    <a class="small-logo-container" href="<?php echo get_site_url(); ?>">
                        <?php include('assets/images/logo.svg'); ?>
                    </a>
                    <?php
                    if (has_nav_menu('footer')) {
                        $args = array(
                            'theme_location'  => 'footer',
                            'container'       => 'div',
                            'container_id'    => 'footer-menu',
                            'depth'           => 0
                        );
                        wp_nav_menu($args);
                    }
                    ?>
                    
                    <?php if (!empty($social)) : ?>
                    <ul class="spc-social-links">
                        <?php
                        foreach ($social as $soc => $data) :
                            $icon = ($soc == 'meetup' ? 'calendar-o' : $soc);
                            ?>
                            <li><a href="<?php echo esc_url($data['link']); ?>"<?php if (!empty($data['open_link_in_new_tab'])) echo ' target="_blank"'; ?> aria-label="<?php echo ucfirst($soc); ?>" title="<?php echo ucfirst($soc); ?>"><i class="fa fa-<?php echo $icon; ?>" aria-hidden="true"></i></a></li>
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
