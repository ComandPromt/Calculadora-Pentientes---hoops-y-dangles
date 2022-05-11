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

function diametro(){
	
	print '	

	<svg
   width="45"
   height="55"
   version="1.1"
   id="svg53"
   sodipodi:docname="icon.svg"
   inkscape:version="1.1 (c68e22c387, 2021-05-23)"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <defs
     id="defs57" />
  <sodipodi:namedview
     id="namedview55"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageshadow="2"
     inkscape:pageopacity="0.0"
     inkscape:pagecheckerboard="0"
     showgrid="false"
     inkscape:zoom="3.235"
     inkscape:cx="28.593509"
     inkscape:cy="82.380216"
     inkscape:window-width="1280"
     inkscape:window-height="897"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="layer1" />
  <g
     id="layer1">
    <g
       id="g2098"
       transform="matrix(0.45418392,0,0,0.49268084,1.4282029,1.4539147)">
      <ellipse
         cx="44.205364"
         cy="53.307457"
         fill="none"
         fill-rule="evenodd"
         id="path31"
         rx="40.219383"
         ry="49.975842"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="1.73881"
         transform="matrix(0.99995066,0.00993381,-0.00988027,0.99995119,0,0)" />
      <path
         d="M 75.72872,5.5204657 10.030787,100.20114"
         fill="none"
         id="path947-1"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="0.40279"
         style="stroke-width:1.50632;stroke-miterlimit:4;stroke-dasharray:none" />
    </g>
  </g>
</svg>';
	
}

function calculo(){
	
	print '
	
<div id="tipo_estado" style="padding-left:20px;width:90%;padding-top:20px;" class="flotar_izquierda">

	<div class="flotar_izquierda">
	
		<h4>C&aacute;lculo:</h4>
	
	</div>

	<div style="padding-left:5px;" class="flotar_izquierda">

		<h4 id="tipo_calculo">Simple</h4>

	</div>

	<div class="flotar_derecha" style="margin-right:20px;" >
	
		<img id="imagen_resultado" class="imagen" />
	
	</div>

</div>

<div style="padding-left:20px;" class="limpiar flotar_izquierda">

	<h4>Di&aacute;metro:</h4>
	
</div>

<div style="padding-top:20px;" class="flotar_izquierda">

<div style="padding-left:10px;padding-right:20px;" class="flotar_izquierda">

	<h4 id="diametro"></h4>

</div>
<div style="margin-top:-8px;" class="flotar_izquierda">
<svg
   width="45"
   height="55"
   version="1.1"
   id="svg53"
   sodipodi:docname="icon.svg"
   inkscape:version="1.1 (c68e22c387, 2021-05-23)"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <defs
     id="defs57" />
  <sodipodi:namedview
     id="namedview55"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageshadow="2"
     inkscape:pageopacity="0.0"
     inkscape:pagecheckerboard="0"
     showgrid="false"
     inkscape:zoom="3.235"
     inkscape:cx="28.593509"
     inkscape:cy="82.380216"
     inkscape:window-width="1280"
     inkscape:window-height="897"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="layer1" />
  <g
     id="layer1">
    <g
       id="g2098"
       transform="matrix(0.45418392,0,0,0.49268084,1.4282029,1.4539147)">
      <ellipse
         cx="44.205364"
         cy="53.307457"
         fill="none"
         fill-rule="evenodd"
         id="path31"
         rx="40.219383"
         ry="49.975842"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="1.73881"
         transform="matrix(0.99995066,0.00993381,-0.00988027,0.99995119,0,0)" />
      <path
         d="M 75.72872,5.5204657 10.030787,100.20114"
         fill="none"
         id="path947-1"
         stroke="#000000"
         stroke-miterlimit="4"
         stroke-width="0.40279"
         style="stroke-width:1.50632;stroke-miterlimit:4;stroke-dasharray:none" />
    </g>
  </g>
</svg>
</div>
</div>

<div style="padding-left:30%;width:100%;" class="flotar_izquierda">

	<h4 id="resultado"></h4>

</div>

<script>

	var ozConversion = document.querySelector(".ozInput");
	
	var cmInchConversion = document.querySelector(".inInput");
	
	var cmInput = document.querySelector(".cmInput");
	
	var inchResult = document.querySelector(".inchResult");
	
	cmInput.oninput = cmToIn;
	
	inchResult.oninput = inToCm;

</script>';

}

?>