<?php require_once 'templates/header.php';
	include('conecta.php');

	$sql = $mysqli->prepare('select id,nome from categorias');
	$sql->execute();
	$sql->bind_result($id,$nome);	



?>


	<div class="content">
     	<div class="container">
			
     		<div class="row"><br>
			<legend>Selecione uma categoria e assunto para iniciar o quiz</legend>
     			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 start-page">
	     			
					<form class="form-signin well">
						<div class="form-group">
							<select   class="form-control" id='combo_categorias' type='text' name='combo_categorias'>
								<option value="">Selecione a categoria </option>
								<?php 	while ($sql->fetch()){
											echo	"<option value='$id'>$nome </option>" ;
										}	
								?>	
							</select> 
							<span class="help-block"></span>
						</div>
	
						<div class="form-group">
							<select class="form-control" id="combo_assuntos" type="text" name= "combo_assuntos">
								<option value="">Selecione o assunto </option>
							
							</select>
							<span class="help-block"></span>
						</div>
	
						<br>

						<input name='funcao' type='hidden' value='busca_quiz'></input>
						<input type='button' id="submit_buscaquiz" class="btn btn-success btn-block" value="Buscar">
					
				</div>
				
				
	     		
				</div>
				<div id='resultado'>
				
			</div>
			</form>
		</div>
    </div> <!-- /container -->
    

<?php require_once 'templates/footer.php';?>
	
