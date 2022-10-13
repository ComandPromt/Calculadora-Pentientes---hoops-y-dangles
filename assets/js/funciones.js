
function convertirATexto(medida){
	
	medida=""+medida;
	
	var cm="";

	var numero=medida.substring(0, medida.indexOf("."));
	
	var metro="metros";
	
	if(numero==1){
		
		metro="metro";
		
	}

	cm=medida.substring(medida.indexOf(".")+1,medida.length)

	if(cm.length>2){
		
		cm=cm.substring(0,2);
		
	}
	
	return numero+' '+metro+' y '+cm;
	
}

function textoACm(calculo){
	
	var resultado=calculo;
	
	if(parseFloat(calculo)>0){
	
		if(calculo>100){

			calculo=calculo/100;
		
			resultado=convertirATexto(calculo);
				
		}
		
		if(calculo%100==0){
		
			texto+=(calculo/100);
			
			if(texto==1){
				
				texto+=" metro";
				
			}
			
			else{
				
				texto+=" metros";
				
			}
		
			resultado=texto;
		
		}
			
		
	
	}
	
	return resultado;

}

function conversion(calculo,tipo){
	
	var resultado=calculo;

	switch(tipo){
		
		case "cm":
	
			resultado=textoACm(calculo);
	
		break;

	}
	
	return resultado;
	
}

function calcularNumeroAros(numeroAros, calculo,tipo){
	
	var resultado="";
	
    if (numeroAros > 1) {
		
		calculo = parseFloat(calculo);
		
        resultado = "<p> Necesitas "+conversion(calculo,tipo)+" "+tipo+" por aro</p>";

        calculo *= parseFloat(numeroAros);

        resultado += '<p>Para '+numeroAros+' aros necesitas '+conversion(calculo,tipo)+' '+tipo+'.</p>';

    }
	
	else{
	
		resultado="<p> Necesitas "+conversion(calculo,tipo)+" "+tipo+"</p>";
	
	}

    return resultado;

}

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
	
	var radio_dangles=parseFloat(document.getElementById("diametro_dangles").value);
	
	var espacio=parseFloat(document.getElementById("espacio_dangles").value);
	
	var altura_triangulo=parseFloat(document.getElementById("altura_dangles").value);
	
	var base_triangulo=parseFloat(document.getElementById("base_triangulo").value);

	radio_dangles/=2;
	
	var vueltas=0;

	var resultado="";

	calculo=(2*3.14*radio_dangles)/4;
	
	vueltas=calculo;
	
	vueltas=vueltas/espacio;
		
	base_triangulo/=2;
	
	var resultado_circulo=90/vueltas;
	
	var contador_circulo=0;
	
	var angulo_circulo=0;
	
	var indices = [];
	
	var datos = [];
	
	var angulo;
	
	var a;
	
	var b;
	
	var indice;
	
	var valor;
	
	var y;
	
	for(var i=1;i<=vueltas;i++){
					
		if(i==1){
			
			angulo=Math.acos(espacio/radio_dangles);
			
			angulo_circulo=angulo;
			
		}
		
		else{
			
			angulo_circulo=contador_circulo;
			
		}
		
		if(angulo_circulo<=180){
		
			a=radio_dangles-(Math.sin(angulo_circulo)*radio_dangles);
			
			b=(altura_triangulo*((Math.cos(angulo_circulo)*altura_triangulo)))/base_triangulo;
						
			if(angulo_circulo>0 && contador_circulo==0){
				
				contador_circulo=angulo;
							
			}
			
			if(contador_circulo==0){
				
				contador_circulo=180;
				
			}
			
			indice='x2 '+redondear(contador_circulo)+' --> ';
			
			valor=Math.round(a+b,1);
						
			indices[i]=indice;
			
			datos[i]=valor;
			
			resultado+='<h4>'+indice+valor+'</h4>';
			
			if(contador_circulo==resultado_circulo){
				
				contador_circulo=0;
				
			}
			
			else{
			
				contador_circulo-=resultado_circulo;
				
			}
									
		}
		
	}
	
	if(modo==1){
	
		resultado='';

		y=datos.length;
		
		y--;
	
		for(var i=0;i<indices.length;i++){
		
			resultado+='<h4>'+indices[i]+datos[y]+'</h4>';

			y--;
			
		}
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(calculo>0){
		
		resultado=calculo;
		
	}
	
	document.getElementById("resultado").innerHTML=resultado;
	
}

function resultado(){
	
	var diametro=document.getElementById('in_diametro').value;
	
	var numero_aros=document.getElementById('num_aros').value;
	
	diametro=parseFloat(diametro);
	
	numero_aros=parseInt(numero_aros);
	
	if(parseFloat(diametro)>0 && parseInt(numero_aros)>0){
	
		var texto=ver_tipo();
		
		var tipo=document.getElementById('tipo').value;
		
		var anchoBola=document.getElementById('in_grosor').value;
	
		var espacio_bolas=document.getElementById('espacio_bolas').value;
		
		var m1=document.getElementById('medida_1').value;
		
		var m2=document.getElementById('medida_2').value;
			
		var enganche=0;
		
		anchoBola=parseFloat(anchoBola);
		
		espacio_bolas=parseFloat(espacio_bolas);
		
		m1=parseFloat(m1);
		
		m2=parseFloat(m2);
		
		if(document.getElementById('con_enganche').checked){
			
			enganche=1;
			
		}
		
		document.getElementById("tipo_calculo").innerHTML=texto;

		switch(tipo){
			
			case "n_bolas":
			
				if(parseFloat(anchoBola)>0){
				
					numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas);
			
				}
			
			break;
			
			case "corona":
								
				corona(diametro,m2,m1,numero_aros);
			
			break;
			
			case "abombamiento":
			
				if(parseFloat(anchoBola)>0){
					
					abombamiento(m1,m2,diametro,enganche,anchoBola,espacio_bolas,numero_aros);
				
				}
				
			break;
			
			case "enganche_simple":
						
				longitud_cuerda(diametro,enganche,1,numero_aros);
				
			break;
			
			case "enganche_doble":
			
				longitud_cuerda(diametro,enganche,2,numero_aros);
			
			break;
			
			case "circle_form":
			
				chapa(diametro,espacio_bolas,numero_aros);
			
			break;
			
			case "circle_form_2":
			
				mover(diametro,m1,m2,numero_aros);
			
			break;
			
		}
	
	}

}

function mover(diametro,m1,m2,numero_aros){
	
	var calculo=0;
	
	var resultado="";
	
	if(validar(diametro)){
		
		calculo=((9*diametro)*(m1*m2))/25.5;

	}
	
	if(calculo>0){

		calculo=redondear(calculo);
		
		resultado=calcularNumeroAros(numero_aros,calculo,"bolas");
		
	}
	
	document.getElementById("resultado").innerHTML=resultado;
	
}

function chapa(diametro,espacio_bolas,numero_aros){
	
	var calculo=0;
	
	var resultado="";
	
	if(validar(diametro)){
		
		calculo=(2*3.14*(diametro/2))/(((espacio_bolas+0.5)/2)+0.2);

	}
	
	if(calculo>0){
		
		calculo=redondear(calculo);
		
		resultado=calcularNumeroAros(numero_aros,calculo,"bolas");
		
	}
	
	document.getElementById("resultado").innerHTML=resultado;
	
}

function corona(diametro,altura_bolas,altura_corona,numero_aros) {

	var calculo=0;
	
	var resultado="";
			
	if(validar(diametro)){
		
		var valor1="";
		
		var valor2="";
		
		var calculo_1="";
		
		var calculo_2="";
		
		valor1=3.14*Math.pow((diametro/2),2)*altura_corona;
	
		valor2=3.14*Math.pow(((diametro/2)+altura_bolas),2)*altura_corona;
	
		calculo_1=valor2-valor1;
		
		calculo_2=Math.pow(altura_bolas,3);
		
		calculo=calculo_1/calculo_2;
		
		calculo-=7;
		
		calculo=redondear(calculo);
		
		if(calculo>0){
			
			resultado=calcularNumeroAros(numero_aros,calculo,"bolas");
		
		}
			
	}
	
	document.getElementById("resultado").innerHTML=resultado;	
	
}

function abombamiento(medida_1,medida_2,diametro,enganche,anchoBola,espacio_bolas,numero_aros) {

	if(validar(diametro)){
		
		var calculo=0;
	
		var abombamiento=0;
	
		var resultado="";
				
		abombamiento=(medida_1+medida_2)/2.0;

		if(enganche==1){
			
			enganche=2;
			
		}

		calculo=dosDecimales((3.14*diametro)+abombamiento-enganche+espacio_bolas)/dosDecimales(anchoBola+espacio_bolas);
		
		if(calculo>0){
		
			calculo=redondear(calculo);

			if(enganche>0){
				
				calculo-=3;
				
			}
			
			else{
				
				calculo-=6;
				
			}
			
			resultado=calcularNumeroAros(numero_aros,calculo,"bolas");
		
		}
			
		document.getElementById("resultado").innerHTML=resultado;	
		
	}
	
}

function validar(diametro){
	
	var resultado=false;
	
	if(diametro>0){
		
		resultado=true;
		
	}
		
	return resultado;
	
}

function longitud_cuerda(diametro,enganche,modo,numero_aros) {

	if(validar(diametro)){
		
		var calculo=0;
				
		if (modo==1) {
	
			calculo = (diametro * 10.7) / 4;
			
			if (enganche!=1) {
	
				calculo += 2;
				
			}
	
		}
		
		else{
	
			calculo = (diametro * 142.5) / 8.7;
			
			if (enganche==1) {
			
				calculo -= 19;
			
			}
			
			else{
				
				calculo -= 17;
				
			}
			
		}
		
		document.getElementById("resultado").innerHTML=calcularNumeroAros(numero_aros,calculo,"cm");
			
	}	
	
}

function dosDecimales(n) {
	
  let t=n.toString();
  
  let regex=/(\d*.\d{0,2})/;
  
  return t.match(regex)[0];

}

function redondear(numero){
	
	return Math.round(numero,2);
	
}

function numeroBolas(diametro,anchoBola,numero_aros,enganche,espacio_bolas) {
			
	var espacio=0;
	
	if(enganche==1){
					
		espacio=2;
	
	}
	
	var calculo=(((diametro*3.14)-espacio)+espacio_bolas)/anchoBola+espacio_bolas;
	
	calculo=dosDecimales(calculo);
	
	calculo=redondear(calculo);
	
	document.getElementById("resultado").innerHTML=calcularNumeroAros(numero_aros,calculo,"bolas");
		
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
			
	var tipo=document.getElementById('tipo').value;
	
	var imagen='';

	var texto='';

	verMedidas(false);
	
	verEspacioBolas(false);
	
	verGrosor(false);	
	
	switch(tipo){
				
		case "n_bolas":
		
			verGrosor(true);
						
			verEspacioBolas(true);
		
		break;
		
		case "abombamiento":
						
			verGrosor(true);
						
			verEspacioBolas(true);
			
			verMedidas(true);
						
		break;

		case "corona":
		
			verMedidas(true);
						
			verGrosor(false);
			
		break;
		
		case "circle_form_2":
		
			verMedidas(true);
		
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
		
		case "circle_form":
		
			texto='Chapas';
		
			imagen='chapas.png';
		
		break;
		
		case "circle_form_2":
		
			texto='Mover';
		
			imagen='mover.png';
		
		break;
		
	}
		
	document.getElementById("imagen_resultado").src = 'assets/img/'+imagen;	

	return texto;

}