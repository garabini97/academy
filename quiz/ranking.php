<?php require_once 'templates/header.php';
	include('conecta.php');
	
	
	$sql = $mysqli->prepare('SELECT u.nome,s.pontuacao from usuarios as u,player_stats as s WHERE s.usuario_id = u.id order by s.pontuacao desc limit 10 ');
	$sql->execute();
	$sql->bind_result($nome,$acertos);



?>
<br><div  class="content">
    <br><br><br><br><div class="container">
	
     		<div id='resultado'  class="row"><br>
			
				<table>
					<thead>
						<tr>
							<td></td>
							<td>Nome</td>
							<td>Pontuação</td>
						</tr>
					</thead>
					<tbody>
	
	
	<?php
	
	while ($sql->fetch()){
		
		echo "
				<tr>
					<td></td>
					<td>$nome</td>
					<td>$acertos</td>
				</tr>";
	
	}
	?>
	
	
	<tbody>
		  </table>

			</div>
	</div>
</div>