<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
unlink(get_template_directory() . '/new_style_login.css');
//delete_option('MDform_actived');
//delete_site_option('MDstyle_actived');