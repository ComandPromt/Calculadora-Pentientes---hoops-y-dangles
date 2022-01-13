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
			
			if((int)$_POST['modo']==1){
			
				$b=($_POST['altura_triangulo']*($_POST['base_triangulo']-(cos(deg2rad($angulo_circulo))*$_POST['altura_triangulo'])))/$_POST['base_triangulo'];

			}
			
			else{
				
				$b=($_POST['altura_triangulo']*((cos(deg2rad($angulo_circulo))*$_POST['altura_triangulo'])))/$_POST['base_triangulo'];
				
			}
						
			if($angulo_circulo>0 &&$contador_circulo==0){
				
				$contador_circulo=$angulo;
							
			}
			
			if($contador_circulo==0){
				
				$contador_circulo=180;
				
			}
			
			if((int)$a+$b<0){
				
				$salida=false;
				
			}
				
			$resultado.='<h4>x2 '.round($contador_circulo,2).' --> '.round($a+$b,1).' </h4>';
			
			if((int)$contador_circulo==(int)$resultado_circulo){
				
				$contador_circulo=0;
				
			}
			
			else{
			
				$contador_circulo-=$resultado_circulo;
				
			}
									
		}
		
	}
	
}

if(!$salida){
	
	$resultado='';
	
}

print $resultado;

?>