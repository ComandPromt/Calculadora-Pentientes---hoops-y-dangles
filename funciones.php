<?php

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

function calcularNumeroArosCm($numeroAros,$calculo){
	
	$resultado="";
	
	if($numeroAros>1){
			
		$resultado.=" por aro.</p>";
				
		$calculo*=(int)$numeroAros;
		
		$resultado.='<p>Para '.$numeroAros.' aros necesitas '.$calculo.' cm.</p>';
			
	}
	
	return $resultado;
}

function calcularNumeroAros($numeroAros,$calculo){
	
	$resultado="";
	
	if($numeroAros>1){
			
		$resultado.=" por aro.</p>";
		
		$calculo=(int)$calculo;
		
		$calculo*=(int)$numeroAros;
		
		$resultado.='<p>Para '.$numeroAros.' aros necesitas '.$calculo.' bolas.</p>';
			
	}
	
	return $resultado;
}

function limpiar(){
	
	print '<hr class="mt-2 mb-3"/>';
	
}

?>