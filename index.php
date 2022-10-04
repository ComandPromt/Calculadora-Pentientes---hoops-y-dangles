<?php

include('funciones.php');

?>

<!DOCTYPE HTML>

<html>

	<head>
	
		<title>Calculadora</title>

		<meta charset="utf-8" />

		<link rel="icon" type="image/x-icon" href="assets/img/icon.png">

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/css/main.css" />
		
		<link rel="stylesheet" href="assets/css/estilos.css" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		
		<script src="assets/js/funciones.js"></script>
		
		<style>
  
			.ft-to-in, .ml-to-oz, .cm-to-in, .kg-to-lb{
					
				font-size: 20px;
				
				margin-bottom: 5%;
				
				padding: 2%;
				
				border: 1px solid;
				
				width: 275px;
				
				display: inline-block;
			
			}
			
			input{
				
				height: 30px;
				
			}
			
			input[type=number]{
				
				font-size: 20px;
				
			}
			
			.feetInchResult{
				
				font-size: 2rem;
				
			}
			
			option{
			
				font-size:20px;
			
			}
			
			select{
				
				font-size:18px;
				
			}
			
		</style>
  
	</head>

	<body class="landing is-preload">
	
		<div id="page-wrapper">

				<section id="banner">

					<ul class="actions special">

						<li>
						
							<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#cm_inches">Cm<-> Inches <img style="width:140px; height:40px;" src="assets/img/cm_inches.png" /></button>
						
						</li>

						<li>
						
							<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Calculadora<img class="icono" src="assets/img/hoop.png" /></button>
						
						</li>
						
						<li>
						
							<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#dangles">Dangles <img class="icono" src="assets/img/dangles_1.png" /></button>
						
						</li>
						
					</ul>

				</section>

		</div>

		<div class="container">

			<div class="modal fade" id="cm_inches" role="dialog">
			
				<div class="modal-dialog">
				
					<div class="modal-content">
				
						<div style="height:40px;" class="flotar_derecha modal-header">

							<button class="btn btn-default" data-dismiss="modal">X</button>
													
						</div>
						
						<div class="modal-body">
						
							<div style="margin-top:20px;width:100%;" class="flotar_izquierda cm-to-in">
		
								<div class="flotar_izquierda mitad">
								
									<svg width="110" height="90" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
										
										<g class="layer">
										<title>Layer 1</title>
										<rect fill="#ffffff" height="78.999999" id="svg_2" stroke="#0000bf" stroke-width="5" width="103.999999" x="3" y="3"/>
										<line fill="none" id="svg_4" stroke="#007f00" stroke-width="5" x1="3.999991" x2="103.999998" y1="7.000012" y2="79.000009"/>
										<text fill="#000000" font-family="Serif" font-size="24" id="svg_6" stroke="#0000ff" stroke-width="0" text-anchor="middle" transform="rotate(44.2152, 314.84, 243.413) matrix(7.35535, 0, 0, 1, -1921.79, 0)" x="304.082014" xml:space="preserve" y="251.510094"/>
										</g>
									
									</svg>
							
								</div>
							
								<div class="limpiar flotar_izquierda mitad">	
								
									<label>Centimetros</label>
											
									<p>
									
										<input style="width:100px;" class="centrar cmInput" type="number" placeholder="cm" min="0" oninput="cmToIn(this.value)"/>
									
									</p>
									
									<label>Pulgadas</label>
									
									<p>
									
										<input style="width:100px;" class="centrar inchResult" type="number" placeholder="in"/>
									
									</p>
										
								</div>
	
							</div>
							
						</div>
						
						<div  class="modal-footer">		
						
						</div>	
						
					</div>
				
				</div>
  
			</div>

			<div class="modal fade" id="dangles" role="dialog">
			
				<div class="modal-dialog">
				
					<div class="modal-content">
				
						<div style="height:40px;" class="flotar_derecha modal-header">

							<button class="btn btn-default" data-dismiss="modal">X</button>
													
						</div>
						
						<div  class="modal-body">
							
							<div class="limpiar flotar_izquierda">
				
								<div class="flotar_izquierda">
							
									<label>Separacion entre cuerdas</label>
								
									<input id="espacio_dangles" class="espacio numero centrar" type="number" min="0" value="0"/>
								
								</div>
					
								<div class="espacio_arriba flotar_izquierda">
							
									<label>Altura del triangulo</label>
								
									<input id="altura_dangles" class="espacio numero centrar" type="number" step="0.01" min="0.00" value="1.00" />
								
								</div>
					
								<div class="limpiar flotar_izquierda">
							
									<label>Base del triangulo</label>
								
									<input id="base_triangulo" class="espacio numero centrar" type="number" step="0.01" min="0.00" value="1.00" />
								
								</div>
					
								<div class="limpiar espacio_arriba flotar_izquierda">
								
									<label>Diametro</label>
								
									<input id="diametro_dangles" class="espacio numero centrar" type="number" min="0" value="0" />
								
								</div>
													
								<div class="espacio_arriba flotar_izquierda">
								
								<div class="espacio_arriba flotar_izquierda">
								
									<input id="dangles_1" name="modo_dangles" type="radio" value="1" checked></input>
										
									<label for="dangles_1">
									
										<img style="width:60px;height:97px;" src="assets/img/dangles_1.jpg"/>
										
									</label>
									
								</div>
								
								<div class="espacio_arriba flotar_izquierda">
									
									<input id="dangles_2" name="modo_dangles" type="radio" value="0"></input>
									
									<label for="dangles_2">
									
										<img style="width:60px;height:97px;" src="assets/img/dangles_2.jpg"/>
										
									</label>
	
								</div>
								
								</div>
							
							</div>	
				
							<div class="limpiar flotar_derecha">
										
								<input style="margin-top:-20px;" type="button" name="enviar" value="Enviar" onclick="dangles()"/>
							
							</div>
					
						</div>	
								
						<div class="flotar_izquierda">
						
							<?php echo limpiar(); ?>
						
							<div class="espacio" id="resultado_dangles"></div>
								
						
						</div>
						
						<div class="flotar_izquierda">
						
							<img class="espacio_arriba" src="assets/img/angulos.png"/>
												
						</div>
						
						<div  class="modal-footer">		
						
						</div>
						
					</div>
				
				</div>
  
			</div>

			<div class="modal fade" id="myModal" role="dialog">
			
				<div class="modal-dialog">
				
					<div class="modal-content">
				
						<div class="flotar_derecha modal-header">

							<button  class="btn btn-default" data-dismiss="modal">X</button>
													
						</div>
						
						<div>
						
							<div style="padding-left:20px;" class="espacio_arriba flotar_izquierda espacio_abajo" >
	
								<select id="tipo" onchange="ver_tipo()">
				
									<option value="enganche_simple">Simple
								
									</option>
								
									<option value="enganche_doble">Doble
									
									</option>
									
									<option value="n_bolas">Nº de bolas
									
									</option>
									
									<option value="abombamiento">Abombamiento
									
									</option>
									
									<option value="corona">Corona
									
									</option>
								
								</select>
									
							</div>
				
							<div id="tipo_estado" style="padding-left:20px;width:90%;margin-top:-10px;" class="espacio_arriba flotar_izquierda">

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
							
							<div style="margin-top:10px;padding-left:20px;width:100%;color:#42472B;background-color:#F3F4FF" class="espacio_arriba espacio_abajo flotar_izquierda">
							
								<h4 id="resultado"></h4>
							
							</div>
							
							<script>
							
								var ozConversion = document.querySelector(".ozInput");
								
								var cmInchConversion = document.querySelector(".inInput");
								
								var cmInput = document.querySelector(".cmInput");
								
								var inchResult = document.querySelector(".inchResult");
								
								cmInput.oninput = cmToIn;
								
								inchResult.oninput = inToCm;
							
							</script>
							
						</div>
						
						<div class="modal-footer">
			
							<div style="padding-left:5px;" class="limpiar flotar_izquierda">
		
								<div class="flotar_izquierda">
								
									<div class="flotar_izquierda">
									
										<?php echo limpiar(); ?>
									
										<label>N&uacute;mero de aros</label>
								
										<input id="num_aros" class="numero centrar separador" name="numero_aros" type="number" min="1" value="1">	
									
									</div>	
								
									<div style="padding-top:30px;" class="espacio flotar_izquierda">								
									
										<svg width="45" height="55" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" version="1.1">
										
											<g class="layer">
											<title>Layer 1</title>
											<g id="layer1">
											<g id="g2098" transform="matrix(0.342301, 0, 0, 0.342606, 1.81487, 2.01954)">
												<ellipse cx="44.205364" cy="53.307457" fill="none" fill-rule="evenodd" id="path31" rx="40.219383" ry="49.975842" stroke="#000000" stroke-miterlimit="4" stroke-width="1.73881" transform="matrix(0.99995066,0.00993381,-0.00988027,0.99995119,0,0)"/>
												<path d="m75.72872,5.52047l-65.69793,94.68067" fill="none" id="path947-1" stroke="#000000" stroke-miterlimit="4" stroke-width="1.50632"/>
											</g>
											</g>
											</g>
											
										</svg>
									
									</div>
	
									<div style="padding-top:35px;" class="espacio_arriba flotar_izquierda">	
									
											<label>Di&aacute;metro</label>
																	
											<input id="in_diametro" class="numero centrar separador" name="diametro" type="number" step="0.01" min="0.00" value="0.00"></input>
																	
									</div>

								</div>
								
								<div class="flotar_izquierda">
								
									<div class="limpiar espacio_arriba flotar_izquierda" >
				
										<label id="label_grosor">Grosor de la bola</label>
									
										<input id="in_grosor" style="width:80px;" class="numero centrar separador" name="anchoBola" type="number" step="0.01" min="0.00" value="0.00"></input>
									
									</div>
									
									<div class="espacio espacio_arriba flotar_derecha" >
																	
										<label id="labelm1">M1</label>
									
										<input id="medida_1" style="width:80px;" class="numero centrar separador"  type="number" step="0.01" min="0.00" value="0.00"></input>
										
										<label id="labelm2" class="espacio">M2</label>
										
										<input id="medida_2" style="width:80px;" class="numero centrar separador"  type="number" step="0.01" min="0.00" value="0.00"></input>
									
									</div>		
																	
									<div class="limpiar">
									
										<div class=" flotar_izquierda" >
										
											<label id="label_espacio_bolas">Espacio entre bolas</label>
										
											<input id="espacio_bolas" style="width:80px;" class="centrar separador" type="number" step="0.01" min="0.00" value="0.00"></input>	
		
										</div>	
		
									</div>	
																							
								</div>
								
								<div class="limpiar espacio_arriba flotar_izquierda">

									<input id="con_enganche" name="enganche" type="radio" value="1" checked/>
									
									<label for="con_enganche">Con enganche</label>
									
								</div>
								
								<div class="flotar_izquierda espacio_arriba">
													
									<input id="sin_enganche" name="enganche" type="radio" value="0"/>
									
									<label for="sin_enganche">Sin enganche</label>
								
								</div>
																
								<div class="flotar_derecha">
								
									<?php limpiar(); ?>
								
									<input style="margin-top:-20px;" type="button" name="enviar" value="Enviar" onclick="resultado()"/>
						
								</div>
							
							</div>
												
						</div>
				
					</div>
  
				</div>
			
			</div>
		
		</div>
		
		<script>
			
			document.getElementById("imagen_resultado").src = 'assets/img/simple.png';
	
			verMedidas(false);
			
			verGrosor(false);
			
			verEspacioBolas(false);
			
		</script>
		
		<script src="assets/js/jquery.min.js"></script>
		
		<script src="assets/js/jquery.dropotron.min.js"></script>
		
		<script src="assets/js/jquery.scrollex.min.js"></script>
		
		<script src="assets/js/browser.min.js"></script>
		
		<script src="assets/js/breakpoints.min.js"></script>
		
		<script src="assets/js/util.js"></script>
		
		<script src="assets/js/main.js"></script>

	</body>
	
</html>