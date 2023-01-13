<?php


if(ACTIVATED_OPTIM ?? false){
    include_once(CORE."optimize_head.php");
}

if(ACTIVATED_STYLE ?? false){
    include_once(CORE."style.php");
    
    add_filter( 'login_headerurl', 'custom_url_login' );
    add_action( 'login_head', 'custom_login' );

    
}
if(ACTIVATED_FORM ?? false){
    include_once(CORE."forms.php");

    add_action('register_form', 'add_fields_to_users_register_form' );
    add_filter('registration_errors', 'validate_user_fields', 10, 3);
    add_action('user_register', 'save_user_fields');

    add_action( 'show_user_profile', 'add_custom_fields_to_users' );
    add_action( 'edit_user_profile', 'add_custom_fields_to_users' );

    add_action( 'personal_options_update', 'save_user_fields' );
    add_action( 'edit_user_profile_update', 'save_user_fields' );

    add_action('admin_print_scripts', 'my_admin_scripts');
}


