<?php

include('../funciones.php');

$calculo=0;

$resultado="";

if(isset($_POST['numero_aros'])&& isset($_POST['diametro'])&& isset($_POST['altura_bolas'])&& isset($_POST['altura_corona']) && (int)$_POST['diametro']>0 && (float)$_POST['altura_bolas']>0 && (float)$_POST['altura_corona']>0){

	$valor1=3.14*pow(($_POST['diametro']/2),2)*$_POST['altura_corona'];
	
	$valor2=3.14*pow((($_POST['diametro']/2)+$_POST['altura_bolas']),2)*$_POST['altura_corona'];

	$calculo_1=$valor2-$valor1;
	
	$calculo_2=pow($_POST['altura_bolas'],3);
	
	$calculo=$calculo_1/$calculo_2;
	
	$calculo-=7;

}

if($calculo>0){
		
	$resultado='Necesitas '.round($calculo). ' bolas';
	
	$resultado.=calcularNumeroAros((int)$_POST['numero_aros'],$calculo);
	
}

print $resultado;

?>