<?php

include_once('config.php');
							$valores=array();
$user_fun = new Userfunction();

$counter = 1;

$tabla=$_COOKIE['ver'];

$nombreColumnasTabla=$user_fun->verColumnas($tabla);

?>

<table class="table" style="vertical-align: middle; text-align: center;">
 
	<thead class="thead-dark">
 
		<tr>
		
			<th scope="col">#</th>
			
				<?php
		
				for($i=0;$i<count($nombreColumnasTabla);$i++){
					
					$valores[]=$nombreColumnasTabla[$i];
					
					print '<th scope="col">'.$nombreColumnasTabla[$i].'</th>';
					
				}

				?>
												
		</tr>
					
	</thead>
				  
	<tbody>
				  
		<?php

			if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){
			
				$keyword = $user_fun->htmlvalidation($_POST['keyword']);
			
				$match_field=array();
			
				for($i=0;$i<count($valores);$i++){
					
						$match_field[$valores[$i]] = $keyword;
						
				}
				
				$select = $user_fun->search($tabla, $match_field, "OR");
			
			}
			
			else{
			
				$select = $user_fun->select($tabla);
			
			}
			
			if($select){ foreach($select as $se_data){?>
			
				<tr>
				
				<th scope="row"><?php echo $counter; $counter++; ?></th>
				
					<?php
					
					$tipos_columna=$user_fun->verTipoColumnaTabla($tabla);
				
					for($i=0;$i<count($nombreColumnasTabla);$i++){
						
						$nombre="";
						
						if($i==0){
							
							$nombre=$valores[0].'_'.$se_data[$nombreColumnasTabla[$i]];	
							
						}
						
						else{
							
							$nombre=$valores[$i].'_'.$se_data[$nombreColumnasTabla[0]];
							
							
						}
						
						$dato=$se_data[$nombreColumnasTabla[$i]];	

						if($tipos_columna[$i]=="MUL"){
							
							$dato=$user_fun->verValorTabla($nombreColumnasTabla[$i],$dato);

						}

						
						print '<td id="'.$nombre.'">'.$dato.'</td>';
						
					}
				
					?>
					
					<td>
					
						<button type="button" id="<?php echo $se_data[$nombreColumnasTabla[0]]; ?>" class="btn btn-danger editdata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#updateModalCenter">Update</button>
						
						<button type="button" id="del_<?php echo $se_data[$nombreColumnasTabla[0]]; ?>" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#deleteModalCenter">Delete</button>
					
					</td>
					
				</tr>
			
			<?php 
			
				}
				
			}
			
			else{
				
				echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; 
				
			} 
			
			?>
			
			</tbody>
				  
				</table>	