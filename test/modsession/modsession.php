<?php

/*
Plugin Name: MODSesion
Plugin URI:
Description: Estilos y control de formularios personalizados para iniciar sesón y registrarse
Version:0.0.1
Author:BunnyWhite
Author URI: https://www.instagram.com/fixmoon.tech/
License:GPL2
*/

//Configuracion Basica
define("PLUGIN_NAME","MODSession");
define("PLUGIN_MENU",true);



// DIRECTORIOS
define("VISTA",__DIR__."/views/");
define("ESTILOS",__DIR__."/styles/");
define("SCRIPTS",__DIR__."/js/");
define("CORE",__DIR__."/core/");

//URL
define("URL_PLUGIN_MS",plugins_url( "", dirname(__DIR__) ));
define("URL_VISTA",URL_PLUGIN_MS."/views/");
define("URL_ESTILOS",URL_PLUGIN_MS."/styles/");
define("URL_SCRIPTS",URL_PLUGIN_MS."/js/");
define("URL_CORE",URL_PLUGIN_MS."/core/");

//Crear opciones en la base de datos
add_option( "MS_FORM_ACT", true);
add_option( "MS_STYLE_ACT", false);
add_option( "MS_OPTIM_ACT", false);

//Base de datos
define("ACTIVATED_FORM",get_option( "MS_FORM_ACT", true ));
define("ACTIVATED_STYLE",get_option( "MS_STYLE_ACT", true ));
define("ACTIVATED_OPTIM",get_option( "MS_OPTIM_ACT", false));



//Inicializar Menu
function menu_admin()
{
 add_menu_page(PLUGIN_NAME,PLUGIN_NAME,'manage_options',CORE.'/menu.php');

}
function jquery_start() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'update_db.js', get_template_directory_uri() . SCRIPTS .'update_db.js', array('jquery'), '1.0' );
	}
}


if(PLUGIN_MENU ?? false){

    add_action( 'admin_menu', 'menu_admin' );
    add_action('init', 'jquery_start');
}


//Inicializar Core
require_once("core.php");



