
function cmToIn(){
	
    result = this.value/2.54;
	
    x = result.toFixed(4);
	
    inchResult.value = x;
	
}

function inToCm(){
	
    result = this.value * 2.54;
	
    cmInput.value = result;
	
}

function dangles(){
	
	var modo=document.querySelector('input[name="modo_dangles"]:checked').value;
	
	var radio_dangles=parseInt(document.getElementById("diametro_dangles").value);
	
	radio_dangles/=2;
	
	var parametros = {"radio":radio_dangles,"espacio":parseInt(document.getElementById("espacio_dangles").value),"altura_triangulo":parseFloat(document.getElementById("altura_dangles").value),"base_triangulo":parseFloat(document.getElementById("base_triangulo").value),"modo":modo};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/calculo_dangles.php',
		
		type: 'post',

		success: function (response) {
			
			document.getElementById("resultado_dangles").innerHTML=response;

		}
		
	});
}

function resultado(){
	
	ver_tipo();
		
	var tipo=document.getElementById('tipo').value;
	
	var diametro=document.getElementById('in_diametro').value;
	
	var anchoBola=document.getElementById('in_grosor').value;
	
	var numero_aros=document.getElementById('num_aros').value;
		
	var espacio_bolas=document.getElementById('espacio_bolas').value;
	
	var m1=document.getElementById('medida_1').value;
	
	var m2=document.getElementById('medida_2').value;
	
	var enganche=0;
		
	if(document.getElementById('con_enganche').checked){
		
		enganche=1;
		
	}

	switch(tipo){
		
		case "n_bolas":
		
			numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas);
						
		break;
		
		case "corona":

			corona(diametro,m2,m1);
		
		break;
		
		case "abombamiento":
					
			abombamiento(m1,m2,diametro,enganche,anchoBola,espacio_bolas,numero_aros);
		
		break;
		
		case "enganche_simple":
					
			longitud_cuerda(diametro,enganche,1,numero_aros);
			
		break;
		
		case "enganche_doble":
		
			longitud_cuerda(diametro,enganche,2,numero_aros);
		
		break;
		
	}
		
}

function corona(diametro,altura_bolas,altura_corona) {

	var parametros = {"diametro":diametro,"altura_bolas":altura_bolas,"altura_corona":altura_corona};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/corona.php',
		
		type: 'post',

		success: function (response) {
	
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function abombamiento(medida_1,medida_2,diametro,enganche,anchoBola,espacio_bolas,numero_aros) {

	var parametros = {"medida1":medida_1,"medida2":medida_2,"diametro":diametro,"enganche":enganche,"grosorBola":anchoBola,"espacio_bolas":espacio_bolas,"numero_aros":numero_aros};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/abombamiento.php',
		
		type: 'post',

		success: function (response) {
	
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function longitud_cuerda(diametro,enganche,modo,numero_aros) {
	
	var parametros = {"medidaDiametro":diametro,"enganche":enganche,"modo":modo,"numero_aros":numero_aros};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/longitud_cuerda.php',
		
		type: 'post',

		success: function (response) {
					
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas) {
	
	var parametros = {"diametro":diametro,"anchoBola":anchoBola,"numero_aros":numero_aros,"enganche":enganche,"espacio_bolas":espacio_bolas};
	
	$.ajax({
		
		data:parametros,
		url:'calculadora/nbolas.php',
		type: 'post',

		success: function (response) {  
		
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function verEspacioBolas(check){
	
	if(check){
				
		document.getElementById('espacio_bolas').hidden = false;
		
		document.getElementById('label_espacio_bolas').hidden = false;
	}
	
	else{
		
		document.getElementById('espacio_bolas').hidden = true;
		
		document.getElementById('label_espacio_bolas').hidden = true;
	}
	
}

function verGrosor(check){
	
	if(check){
		
		document.getElementById('label_grosor').hidden = false;
		
		document.getElementById('in_grosor').hidden = false;
		
	}
	
	else{
	
		document.getElementById('label_grosor').hidden = true;
		
		document.getElementById('in_grosor').hidden = true;
		
	}
	
}

function verMedidas(check){
	
	if(check){
		
		document.getElementById('medida_1').hidden = false;
	
		document.getElementById('medida_2').hidden = false;
	
		document.getElementById('labelm1').hidden = false;
	
		document.getElementById('labelm2').hidden = false;
	
		
	}
	
	else{
	
		document.getElementById('medida_1').hidden = true;
	
		document.getElementById('medida_2').hidden = true;
	
		document.getElementById('labelm1').hidden = true;
	
		document.getElementById('labelm2').hidden = true;
	
		
	}
	
}

function ver_tipo(){
	
	var valorDiametro=document.getElementById('in_diametro').value;
	
	var valorGrosorBola=document.getElementById('in_grosor').value;
	
	if(parseFloat(valorDiametro)>0){

		document.getElementById('diametro').innerHTML=valorDiametro+' cm';
	
	}
	
	else{
		
		document.getElementById('diametro').innerHTML="";
		
	}
		
	var tipo=document.getElementById('tipo').value;
	
	var imagen='';

	var texto='';

	verMedidas(false);
	
	verEspacioBolas(false);
	
	verGrosor(false);	
	
	switch(tipo){
		
		
		case "n_bolas":
		
			verGrosor(true);
			
			verGrosor(true);
			
			verEspacioBolas(true);
		
		break;
		
		case "abombamiento":
				
			verMedidas(true);
			
			verEspacioBolas(true);
			
			verGrosor(true);
					
		break;

		case "corona":
		
			verMedidas(true);
						
			verGrosor(false);
			
		break;
				
	}
	
	switch(tipo){
		
		case "enganche_simple":
					
			imagen='simple.png';
			
			texto='Simple';
		
		break;
		
		case "enganche_doble":
		
			texto='Doble';
			
			imagen='doble.png';
		
		break;
		
		case "n_bolas":
			
			texto='N&uacute;mero de bolas';
		
			imagen='nbolas.png';
					
		break;
		
		case "abombamiento":
					
			texto='Abombamiento';
		
			imagen='abombamiento.png';
		
		break;
		
		case "corona":
		
			texto='Corona';
		
			imagen='corona.png';
		
		break;
		
	}

	document.getElementById("tipo_calculo").innerHTML=texto;
		
	document.getElementById("imagen_resultado").src = 'assets/img/'+imagen;	
	
	document.getElementById("resultado").innerHTML="";

}