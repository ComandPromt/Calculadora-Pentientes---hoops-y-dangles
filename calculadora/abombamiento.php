<?php

$calculo=0;

$abombamiento=0;

include('../funciones.php');

if(isset($_POST['medida1'])&& isset($_POST['medida2']) && isset($_POST['grosorBola'])&& isset($_POST['diametro'])&& isset($_POST['enganche'])){
	
	$abombamiento=($_POST['medida1']+$_POST['medida2'])/2;
	
	$enganche=0;
	
	if((int)$_POST['enganche']==1){
		
		$enganche=2;
		
	}
	
	$calculo=((3.14*$_POST['diametro']+$abombamiento-$enganche)/$_POST['grosorBola']);
	
	if((int)$_POST['enganche']==1){
		
		$calculo-=3;
		
	}
	
	else{
		
		$calculo-=6;
		
	}
	
}

if($calculo<=0){
	
	print "";
	
}

else{
	
	print 'Necesitas '.round($calculo). ' bolas';
	
}

?>