<?php



include('../funciones.php');

function convertirATexto($medida){
	
	$numero=substr($medida,0,strpos($medida,"."));
	
	$metro="metros";
	
	if((int)$numero==1){
		
		$metro="metro";
		
	}
	
	return $numero.' '.$metro.' y '.substr($medida,strpos($medida,".")+1,strlen($medida)).' cm';
	
}

function truncate_float($number, $decimals) {
	
    $power = pow(10, $decimals); 
	
    if($number > 0){
		
        $resultado=floor($number * $power) / $power; 
		
    }
	
	else {
		
        $resultado=ceil($number * $power) / $power; 
		
    }
	
	return $resultado;
	
}

$resultado="";

if(isset($_POST['modo'])){

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
		
		print 'Necesitas '.$resultado;
		
	}
	
	
	
}

?>