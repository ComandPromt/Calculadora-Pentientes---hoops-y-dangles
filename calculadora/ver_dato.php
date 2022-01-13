<?php



$resultado="";

if(isset($_POST['tipo'])){
	
	$user_fun = new Userfunction();
		
	$resultado=$user_fun->idioma($_POST['tipo'],'spanish');
	
}

print $resultado;

?>