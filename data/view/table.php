<?php 

//Como crear un shortcode en Wordpress
function shortcode_mostrar_autor($atts) {

    $p = shortcode_atts( array (
          'nombre' => 'Invitado'
          ), $atts );
          
    $texto = 'Este artículo ha sido creado por '.$p['nombre'];
    return $texto;
}
add_shortcode('autor', 'shortcode_mostrar_autor');