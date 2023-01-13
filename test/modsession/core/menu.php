<?php
/* Verificamos si hay ajax  */

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	if(isset($_POST["active-form"])){
		update_option( "MS_FORM_ACT", true);
	}
	else {
		update_option( "MS_FORM_ACT", false );
	}
	if(isset($_POST["active-style"])){
	
		update_option( "MS_STYLE_ACT", true);
	}
	else {
    	update_option( "MS_STYLE_ACT", false);
	}

	if(isset($_POST["active-optim"])){
		
		update_option( "MS_OPTIM_ACT", $a);
	
}

}else{
	if (! current_user_can ('manage_options')) wp_die ( ('No tienes suficientes permisos para acceder a esta página.'));

	echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$activeForm = "";
	$activeStyle = "";
	$activeOptim = "";
	
	if (ACTIVATED_FORM) {
		$activeForm = "checked";
	}
	if (ACTIVATED_STYLE) {
		$activeStyle = "checked";
	}
	if (ACTIVATED_OPTIM) {
		$activeOptim = "checked";
	}
	?>
		
		<div class="wrap">
			<h2><?php _e( PLUGIN_NAME ) ?></h2>
			<h3>Opciones:</h3>
			<form id="options-form" action="<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" method="post">
			<table>
				<tr><td>
					Activar Formulario Personalizado: 
				</td><td>
					<?php 
					
					echo '<input type="checkbox" name="active-form" id="active-form"'. $activeForm .">" ?>
				</td></tr>
				<tr><td>
					Activar Estilo de Login Personalizado: 
				</td><td>
					<?php 
					
					echo '<input type="checkbox" name="active-style" id="active-style"'. $activeStyle .">" ?>
				</td></tr>
				<tr><td>
					
					<input type="submit" value="Actualizar">
				</td></tr>
			</table>
			</form>
			<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
			<script>
				$(document).ready(function  ()  {
    			$("#options-form").submit( function (e)  { 
					
        			
        			$.post($("#options-form").attr('action'), $("#options-form").serialize(),
					function(result){
						console.log(result);
					});
					
					e.preventDefault();
					//location.reload();
					
					
        
    });
    
});
			</script>
		</div>
		
<?php } 
