<?php 

class Userfunction{


	public function __construct(){
	
		$this->con = mysqli_connect($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);

		if(!$this->con){
			
			return false;

		}

	}

	public function htmlvalidation($form_data){
		
		$form_data = trim( stripslashes( htmlspecialchars( $form_data ) ) );
		
		$form_data = mysqli_real_escape_string($this->con, trim(strip_tags($form_data)));
		
		return $form_data;
		
	}

	public function select_assoc($tblname, $condition, $op='AND'){

		$field_op = "";
		
		foreach ($condition as $q_key => $q_value) {
			
			$field_op = $field_op."$q_key='$q_value' $op ";
			
		}
		
		$field_op = rtrim($field_op,"$op ");

		$select_assoc = "SELECT * FROM $tblname WHERE $field_op ORDER BY ID";
		
		$select_assoc_query = mysqli_query($this->con, $select_assoc);
		
		$resultado=false;
		
		if(mysqli_num_rows($select_assoc_query) > 0){
			
			if(mysqli_num_rows($select_assoc_query) == 1){
				
				$select_assoc_fire = mysqli_fetch_assoc($select_assoc_query);
				
				if($select_assoc_fire){
					
					$resultado=$select_assoc_fire;
					
				}
				
			}
		
		}
		
		return $resultado;
		
	}

	public function idioma($accion,$idioma){

		$dato="";
		
		mysqli_set_charset("utf8");
		
		$consulta = mysqli_query($this->con,	
		'SELECT texto FROM '.$idioma." WHERE accion='".$accion."'");
		
		$fila = mysqli_fetch_array($consulta);
		
		$dato=$fila[0];
		
		mysqli_close($this->con);
		
		return $dato;
		
	}

	public function logueado(){
	
		$respuesta=true;
		
		if(isset($_COOKIE['tlrrusr']) && isset($_COOKIE['tlrrpss'])){
				
			$consulta = mysqli_query($this->con, 'SELECT user_password FROM usuarios WHERE ID='.$_COOKIE['tlrrusr']);
		
			$resultado = mysqli_fetch_array($consulta);
			
			if($resultado[0]==$_COOKIE['tlrrpss']){
	
				$respuesta=true;
				
			}
			
			mysqli_close($this->con);
		
		}
			
		return $respuesta;
	
	}

	public function verDatos($id,$tabla){
				
		$resultado=array();

		$select = "SELECT * FROM $tabla WHERE ID = $id ORDER BY ID";

		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			while($row = mysqli_fetch_array($select_fire)) {
		
				for($i=1;$i<count($row);$i++){
					
					$resultado[]=$row[$i];
					
				}
			
			}

		}
		
		return $resultado;

	}

	public function insertarDatos($valores,$cabeceras,$tabla){
		
		$select = 'SELECT MAX(ID)+1,COUNT(ID)+1,MIN(ID) FROM '.$tabla;
		
		$select_fire = mysqli_query($this->con, $select);
		
		$row = mysqli_fetch_array($select_fire);

		if(mysqli_num_rows($select_fire) > 0 && (int)$row[0]>0){
			
			if((int)$row[0]==(int)$row[1]){
				
				$indiceContador=$row[1];
				
			}
			
			else{
				
				if((int)$row[0]==0 || (int)$row[1]==0){
					
					$indiceContador='1';
					
				}
				
				if((int)$row[2]!=1){
					
					$indiceContador=(int)$row[2];
					
					$indiceContador--;
					
				}
				
				else{
					
					$valorBusqueda=0;
					
					for($i=1;$i<=(int)$row[1];$i++){
						
						$select = 'SELECT COUNT(ID) FROM '.$tabla.' WHERE ID='.$i;
		
						$select_fire = mysqli_query($this->con, $select);
		
						$filaRegistro = mysqli_fetch_array($select_fire);
						
						if((int)$filaRegistro[0]==0){
							
							$i==(int)$filaRegistro[0];
							
							$valorBusqueda=$i;
							
							$i++;
							
						}
						
						
					}
					
					if($valorBusqueda>0){
						
						$indiceContador=$valorBusqueda;
						
					}
					
					else{
						
						$indiceContador=$row[1];
						
					}
										
				}
								
			}
						
		}
		
		else{
			
			$indiceContador='1';
			
		}

		$select = 'SELECT COUNT(ID) FROM '.$tabla.' WHERE '.$cabeceras[0]." = '".$valores[0]."'";

		$select_fire = mysqli_query($this->con, $select);
		
		$row = mysqli_fetch_array($select_fire);
					
		if((int)$row[0]==0){
		
			$columnas="";
			
			$datos="";
			
			for($i=0;$i<count($cabeceras);$i++){
				
				$columnas.=$cabeceras[$i].',';
				
				$datos.="'".$valores[$i]."',";
				
			}
			
			$columnas= substr($columnas, 0, -1);
			
			$datos= substr($datos, 0, -1);
		
			mysqli_query($this->con, 'INSERT INTO '.$tabla.' (ID,'.$columnas.') VALUES('.$indiceContador.','.$datos.')');

		}
					
	}

	public function eliminarDatos($id,$tabla){
	
		mysqli_query($this->con, 'DELETE FROM '.$tabla.' WHERE ID= '.$id);
			
	}

	public function actualizarDatos($valores,$cabeceras,$tabla,$id){
		
		for($i=0;$i<count($cabeceras);$i++){
			
			$select = "SELECT ".$cabeceras[$i].' FROM '.$tabla.' WHERE '.$cabeceras[$i]." = '".$valores[$i]."'";

			$select_fire = mysqli_query($this->con, $select);
		
			$row = mysqli_fetch_array($select_fire);
							
			mysqli_query($this->con, 'UPDATE '.$tabla.' SET '.$cabeceras[$i]." = '".$valores[$i]."' WHERE ID=".$id);
					
		}
		
	}

	public function verValorTabla($tblname,$id){
		
		$resultado="";

		$select = 'SELECT NOMBRE FROM '.$tblname.'S WHERE ID='.$id;

		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			$select_fetch = mysqli_fetch_array($select_fire);
			
			$resultado=$select_fetch[0];
						
		}
		
		return $resultado;

	}

	public function verValoresMultiples($tblname){
		
		$resultado=array();

		$select = 'SELECT ID,NOMBRE FROM '.$tblname.'S';
		
		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			while($select_fetch = mysqli_fetch_array($select_fire)){
			
				$resultado['id'][]=$select_fetch[0];
				$resultado['valor'][]=$select_fetch[1];
			
			}
		}
		
		return $resultado;

	}

	public function verTipoColumnaTabla($tblname){
		
		$resultado=array();

		$select = "SELECT COLUMN_KEY
		FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tblname' 
		ORDER BY ordinal_position";
		
		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			$select_fetch = mysqli_fetch_all($select_fire, MYSQLI_ASSOC);
			
			if($select_fetch){
				
				for($i=0;$i<count($select_fetch);$i++){

					$resultado[]=$select_fetch[$i]["COLUMN_KEY"];
				}
								
			}

		}
		
		return $resultado;

	}

	public function verTipoTabla($tblname){
		
		$resultado=array();

		$select = "SELECT DATA_TYPE
		FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tblname' 
		ORDER BY ordinal_position";
		
		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			$select_fetch = mysqli_fetch_all($select_fire, MYSQLI_ASSOC);
			
			if($select_fetch){
				
				for($i=0;$i<count($select_fetch);$i++){

					$resultado[]=$select_fetch[$i]["DATA_TYPE"];
				}
								
			}

		}
		
		return $resultado;

	}

	public function verColumnas($tblname){
		
		$resultado=array();

		$select = "SELECT COLUMN_NAME
		FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tblname' 
		ORDER BY ordinal_position";
		
		$select_fire = mysqli_query($this->con, $select);
		
		if(mysqli_num_rows($select_fire) > 0){
			
			$select_fetch = mysqli_fetch_all($select_fire, MYSQLI_ASSOC);
			
			if($select_fetch){
				
				for($i=0;$i<count($select_fetch);$i++){

					$resultado[]=$select_fetch[$i]["COLUMN_NAME"];
				}
								
			}

		}
		
		return $resultado;

	}

	public function select($tblname){

		$select = "SELECT * FROM $tblname ORDER BY ID";
		
		$select_fire = mysqli_query($this->con, $select);
		
		$resultado=false;
		
		if(mysqli_num_rows($select_fire) > 0){
			
			$select_fetch = mysqli_fetch_all($select_fire, MYSQLI_ASSOC);
			
			if($select_fetch){
				
				$resultado=$select_fetch;
				
			}
						
		}
					
		return $resultado;
				
	}

	public function search($tblname,$search_val,$op="AND"){

		$search = "";
		
		foreach($search_val as $s_key => $s_value){
			
			$search = $search."$s_key LIKE '%$s_value%' $op ";
			
		}
		
		$search = rtrim($search, "$op ");

		$search = "SELECT * FROM $tblname WHERE $search";

		$search_query = mysqli_query($this->con, $search);
		
		if(mysqli_num_rows($search_query) > 0){
			
			$serch_fetch = mysqli_fetch_all($search_query, MYSQLI_ASSOC);
			
			return $serch_fetch;
			
		}
		
	}	

}

?>
