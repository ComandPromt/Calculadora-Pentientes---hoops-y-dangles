
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
	
	var numero_aros=document.getElementById('num_aros').value;
	
	var espacio_bolas=document.getElementById('espacio_bolas').value;
	
	var enganche=0;
		
	if(document.getElementById('con_enganche').checked){
		
		enganche=1;
		
	}

	switch(tipo){
		
		case "n_bolas":
		
			numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas);
						
		break;
		
		case "abombamiento":
		
			abombamiento(document.getElementById('medida_1').value,document.getElementById('medida_2').value,diametro,enganche,anchoBola);
		
		break;
		
		case "enganche_simple":
					
			longitud_cuerda(diametro,enganche,1);
			
		break;
		
		case "enganche_doble":
		
			longitud_cuerda(diametro,enganche,2);
		
		break;
		
	}
		
}
	
function abombamiento(medida_1,medida_2,diametro,enganche,anchoBola) {

	var parametros = {"medida1":medida_1,"medida2":medida_2,"diametro":diametro,"enganche":enganche,"grosorBola":anchoBola};
	
	$.ajax({
		
		data:parametros,
		
		url:'calculadora/abombamiento.php',
		
		type: 'post',

		success: function (response) {
	
			document.getElementById("resultado").innerHTML=response;

		}
		
	});
	
}

function longitud_cuerda(diametro,enganche,modo) {
	
	var parametros = {"medidaDiametro":diametro,"enganche":enganche,"modo":modo};
	
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

function ver_tipo(){
	
	var valorDiametro=document.getElementById('in_diametro').value;
	
	var valorGrosorBola=document.getElementById('in_grosor').value;
	
	if(parseFloat(valorDiametro)>0){

		document.getElementById('diametro').innerHTML=valorDiametro+' cm';
	
	}
	
	else{
		
		document.getElementById('diametro').innerHTML="";
		
	}
	
	if(parseFloat(valorGrosorBola)>0){

		document.getElementById('grosor-bola').innerHTML=valorGrosorBola+' cm';
	
	}
	
	else{
		
		document.getElementById('grosor-bola').innerHTML="";
		
	}
	
	var tipo=document.getElementById('tipo').value;
	
	var imagen='';

	var texto='';

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
		
	}

	document.getElementById("tipo_calculo").innerHTML=texto;
		
	document.getElementById("imagen_resultado").src = 'assets/img/'+imagen;	
	
}