<?php

include('../funciones.php');

$resultado="";

if(isset($_POST['modo']) && isset($_POST['numero_aros']) && isset($_POST['medidaDiametro']) && isset($_POST['enganche'])){

	if ((int)$_POST['modo']==1) {

		$calculo = ($_POST['medidaDiametro'] * 10.7) / 4;
		
		if ((int)$_POST['enganche']!=1) {

			$calculo += 2;
			
		}

	}

	else{

		$calculo = ($_POST['medidaDiametro'] * 142.5) / 8.7;
		 
		if ((int)$_POST['enganche']==1) {
		
			$calculo -= 19;
		
		}
		
		else{
			
			$calculo -= 17;
			
		}
		
	}
	
	if($calculo<100){
		
		$resultado=$calculo." cm";
		
	}
	
	if($calculo==100){
		
		$resultado="1 metro";
		
	}
	
	if($calculo>100){
		
		$calculo=round($calculo,2);
	
		$calculo=$calculo/100;
		
		$calculo=truncate_float($calculo,2);
	
		$resultado=convertirATexto($calculo);
				
	}
	
	if($calculo<=0){
		
		$resultado="";
		
	}
	
	if(empty($resultado)){
		
		print '';
		
	}
	
	else{
		
		$resultado='Necesitas '.$resultado;
		
		$resultado.=calcularNumeroArosCm((int)$_POST['numero_aros'],$calculo);
			
	}

}

print $resultado;
		
?>