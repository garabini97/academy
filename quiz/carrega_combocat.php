<?php
include ('conecta.php');

//Carrega combo categorias


	$campo =  $_POST['combo_categorias'];
	$sql = $mysqli->prepare('select id,nome from assuntos where categoria_id like ? ');
	$sql->bind_param("i",$campo);
	$sql->execute();
	$sql->bind_result($id,$nome);
	
	echo "<option value=''>Selecione o assunto </option>	";
		while ($sql->fetch()){
			echo "
					<option value='$id'>$nome </option>
			
				 ";
		   
		}

		
?>






