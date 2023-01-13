<?php

// Agregamos los campos adicionales al formulario de registro
function add_fields_to_users_register_form() {
  $user_first_name = ( isset( $_POST['user_first_name'] ) ) ? $_POST['user_first_name'] : '';
  $user_last_name = ( isset( $_POST['user_last_name'] ) ) ? $_POST['user_last_name'] : '';
  $user_phone = ( isset( $_POST['user_phone'] ) ) ? $_POST['user_phone'] : '';
  $user_city = ( isset( $_POST['user_city'] ) ) ? $_POST['user_city'] : '';
  $user_state = ( isset( $_POST['user_state'] ) ) ? $_POST['user_state'] : '';
  $user_country = ( isset( $_POST['user_country'] ) ) ? $_POST['user_country'] : '';
  $user_instagram = ( isset( $_POST['user_instagram'] ) ) ? $_POST['user_instagram'] : '';

  include_once(VISTA."front-end-form.php");

}



// Validamos los campos adicionales
function validate_user_fields ($errors, $sanitized_user_login, $user_email) {
  if ( empty( $_POST['user_country'] ) ) {
    $errors->add( 'user_country_error', __('<strong>ERROR</strong>: Por favor, introduce tu País') );
  }

  return $errors;
}


// Guardamos los campos adicionales en base de datos
function save_user_fields ($user_id) {
  if ( isset($_POST['user_first_name']) ){
    update_user_meta($user_id, 'user_first_name', sanitize_text_field($_POST['user_first_name']));
  }
  if ( isset($_POST['user_last_name']) ){
    update_user_meta($user_id, 'user_last_name', sanitize_text_field($_POST['user_last_name']));
  }

  if ( isset($_POST['user_phone']) ){
    update_user_meta($user_id, 'user_phone', sanitize_text_field($_POST['user_phone']));
  }

  if ( isset($_POST['user_city']) ){
    update_user_meta($user_id, 'user_city', sanitize_text_field($_POST['user_city']));
  }
  if ( isset($_POST['user_state']) ){
    update_user_meta($user_id, 'user_state', sanitize_text_field($_POST['user_state']));
  }
  if ( isset($_POST['user_country']) ){
    update_user_meta($user_id, 'user_country', sanitize_text_field($_POST['user_country']));
  }
  if ( isset($_POST['user_instagram']) ){
    update_user_meta($user_id, 'user_instagram', sanitize_text_field($_POST['user_instagram']));
  }
  update_user_meta($user_id, 'user_correo', sanitize_text_field($_POST['user_email']));
}

// Agregamos los campos adicionales a Tu Perfil y Editar Usuario
function add_custom_fields_to_users( $user ) {
  $user_first_name = esc_attr( get_the_author_meta( 'user_first_name', $user->ID ) );
  $user_last_name = esc_attr( get_the_author_meta( 'user_last_name', $user->ID ) );
  $user_phone = esc_attr( get_the_author_meta( 'user_phone', $user->ID ) );
  $user_city = esc_attr( get_the_author_meta( 'user_city', $user->ID ) );
  $user_state = esc_attr( get_the_author_meta( 'user_state', $user->ID ) );
  $user_country = esc_attr( get_the_author_meta( 'user_country', $user->ID ) );
  $user_instagram = esc_attr( get_the_author_meta( 'user_instagram', $user->ID ) );
  include_once(VISTA."edit-user-form.php");

  
 }





function my_admin_scripts(){
  wp_enqueue_script( 'extra-fields.js', get_template_directory_uri() . SCRIPTS .'extra-fields.js', array('jquery'), '1.0' );
}