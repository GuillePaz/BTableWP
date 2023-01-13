<?php

copy(ESTILOS . 'new_style_login.css', get_template_directory() . '/new_style_login.css');

function custom_login() {
    
    wp_enqueue_style( 'custom_login', get_stylesheet_directory_uri() . '/new_style_login.css' );
  }


  function custom_url_login() {
	return get_home_url(); // Ponemos la web que queramos.
}

