<?php

if( isset($_POST['longitud'])&& isset($_POST['radio']) ){

	$calculo=(2*3.14*$_POST['radio'])/((($_POST['longitud']+0.5)/2)+0.2);

	print $calculo; 
	
}


?>