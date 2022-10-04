<?php

$vueltas=0;

$resultado="";

$salida=true;

if( isset($_POST['radio']) && isset($_POST['espacio']) && isset($_POST['altura_triangulo']) && isset($_POST['base_triangulo']) && isset($_POST['modo']) ){

	$calculo=(2*3.14*$_POST['radio'])/4;
	
	$vueltas=$calculo;
	
	$vueltas=(int)($vueltas/$_POST['espacio']);
		
	$_POST['base_triangulo']/=2;
	
	$resultado_circulo=90/$vueltas;
	
	$contador_circulo=0;
	
	$angulo_circulo=0;
	
	$indices=array();
	
	$datos=array();
	
	for($i=1;$i<=$vueltas;$i++){
					
		if($i==1){
			
			$angulo=rad2deg(acos($_POST['espacio']/$_POST['radio']));
			
			$angulo_circulo=$angulo;
			
		}
		
		else{
			
			$angulo_circulo=$contador_circulo;
			
		}
		
		if($angulo_circulo<=180){
		
			$a=$_POST['radio']-(sin(deg2rad($angulo_circulo))*$_POST['radio']);
			
			$b=($_POST['altura_triangulo']*((cos(deg2rad($angulo_circulo))*$_POST['altura_triangulo'])))/$_POST['base_triangulo'];
						
			if($angulo_circulo>0 &&$contador_circulo==0){
				
				$contador_circulo=$angulo;
							
			}
			
			if($contador_circulo==0){
				
				$contador_circulo=180;
				
			}
			
			$indice='x2 '.round($contador_circulo,2).' --> ';
			
			$valor=round($a+$b,1);
						
			$indices[]=$indice;
			
			$datos[]=$valor;
			
			$resultado.='<h4>'.$indice.$valor.'</h4>';
			
			if((int)$contador_circulo==(int)$resultado_circulo){
				
				$contador_circulo=0;
				
			}
			
			else{
			
				$contador_circulo-=$resultado_circulo;
				
			}
									
		}
		
	}
	
	if((int)$_POST['modo']==1){
	
		$resultado='';

		$y=count($datos);
		
		$y--;
	
		for($i=0;$i<count($indices);$i++){
		
			$resultado.='<h4>'.$indices[$i].$datos[$y].'</h4>';

			$y--;
			
		}
		
	}
	
}

if(!$salida){
	
	$resultado='';
	
}

print $resultado;

?>