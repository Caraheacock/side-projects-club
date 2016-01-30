<?php

/*
 * NOVA
 * Admin Settings
 */

function nova_settings_page() {
    add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'nova_settings', 'nova_settings_page_content');
}
add_action('admin_menu', 'nova_settings_page');

function nova_settings_page_content() {
    wp_enqueue_media();
    
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
    
    if(isset($_POST['update_settings']) && $_POST['update_settings'] == 'Y') {
        update_option('nova_nav', $_POST['nova_nav']);
        update_option('nova_footer', $_POST['nova_footer']);
        update_option('nova_social', $_POST['nova_social']);
        
        echo '<div id="nova_settings_saved" class="wrap"><h4>Options saved &mdash; ' . date_i18n('m/j/y h:i:s A') . '</h4></div>';
    }
    
    $nav = get_option('nova_nav');
    $nav_logo = (!empty($nav['logo']) ? stripslashes_deep($nav['logo']) : '');
    $footer = get_option('nova_footer');
    $footer_logo = (!empty($footer['logo']) ? stripslashes_deep($footer['logo']) : '');
    $social = get_option('nova_social');
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form name="nova_settings_form" method="post" action="">
            <input type="hidden" name="update_settings" value="Y" />
            
            <div class="nova_settings_form_section">
                <h2>Navigation Bar</h2>
                <h3>Logo</h3>
                <textarea name="nova_nav[logo]" rows="10"><?php echo $nav_logo; ?></textarea>
            </div>
            
            <div class="nova_settings_form_section">
                <h2>Footer</h2>
                <h3>Logo</h3>
                <textarea name="nova_footer[logo]" rows="10"><?php echo $footer_logo; ?></textarea>
                
                <h3>Social Links</h3>
                <div class="row">
                <?php
                $social_media = array(
                  'facebook'  => 'facebook',
                  'meetup'    => 'calendar-o',
                  'twitter'   => 'twitter',
                  'tumblr'    => 'tumblr'
                );
                
                foreach ($social_media as $soc => $icon) :
                ?>
                <div class="column xs-span12 sm-span6 md-span3">
                    <div class="row">
                        <div class="column xs-span2">
                            <i class="fa fa-<?php echo $icon; ?>" style="font-size: 30px;"></i>
                        </div>
                        <div class="column xs-span10">
                            <input name="nova_social[<?php echo $soc; ?>]" type="text" value="<?php echo (!empty($social[$soc]) ? $social[$soc] : ''); ?>" />
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
            
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
            </p>
        </form>
    </div>
    <?php
}
?>