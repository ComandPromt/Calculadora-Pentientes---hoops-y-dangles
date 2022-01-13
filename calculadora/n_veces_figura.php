<?php

if(isset($_POST['diametro'])&&isset($_POST['ancho'])&&isset($_POST['alto'])){

	$calculo=(9*$_POST['diametro']*($_POST['ancho']*$_POST['alto']))/25.5;

	print $calculo; 
	
}


?>