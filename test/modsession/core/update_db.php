<?php


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
	$a = false;
	if($_POST["active-optim"] =="on"){ $a = true; }
	update_option( "MS_OPTIM_ACT", $a);
	
}