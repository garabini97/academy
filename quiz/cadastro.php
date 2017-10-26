<?php require_once 'templates/header.php';?>
<?php

include('conecta.php');

	$sql = $mysqli->prepare('select id,nome from categorias');
	$sql->execute();
	$sql->bind_result($id,$nome);	
?>
<form>

<div style="margin:100px;margin-left:30px" id='cadastro_perguntas'>


	<legend>Cadastro de perguntas</legend>
			
	Selecione a categoria:
	<select class="form-control" id='combo_categorias' type='text' name='combo_categorias'>
		<option value="">Selecione a categoria </option>
		<?php 	while ($sql->fetch()){
					echo	"<option value='$id'>$nome </option>" ;
				}	
		?>	
	</select>
	
		Selecione o assunto:
		<select class="form-control" id="combo_assuntos" type="text" name= "combo_assuntos">
			<option value="">Selecione a categoria </option>
		
		</select><br>
		
		
	
	Pergunta: <br><textarea  class="form-control" name='pergunta' rows="4" cols="50"></textarea><br>
		
	Alternativas (Lembre-se de marcar qual é a questão correta) <br>
	
		<input required  name='resposta' type='radio' value='1'></input>
		A)<input  class="form-control" name='a1' type='text' value=''></input>
		<input   name='resposta' type='radio' value='2'></input>
		B)<input  class="form-control" name='a2' type='text' value=''></input>
		<input   name='resposta' type='radio' value='3'></input>
		C)<input  class="form-control" name='a3' type='text' value=''></input>
		<input   name='resposta' type='radio' value='4'></input>
		D)<input  class="form-control" name='a4' type='text' value=''></input>
	
		<input name='funcao' type='hidden' value='cadastra_pergunta'></input>
	<?php
		$sql = $mysqli->prepare('select id,nome from dificuldades');
		$sql->execute();
		$sql->bind_result($id,$nome);
		
	?>
	
		<select  type='text' name='dificuldade'>
			<option value="">Selecione a categoria </option>
			<?php 	while ($sql->fetch()){
						echo	"<option value='$id'>$nome </option>" ;
					}	
			?>
		
		<input id='submit_pergunta' name='submit_pergunta' type='button' value='Cadastrar'></input><br>
		
		<div id='resultado'></div>

</div>
</form>

	
	
			



