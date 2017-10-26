<?php require_once 'templates/header.php';
include('conecta.php');
	
	$_SESSION['id_quiz'] = $_GET['id'];
	$id_quiz = $_SESSION['id_quiz'];
	
	
?>


<br><br><br><br><br><br><div class="content">
     	<div class="container">
		
			<div id='resultado' class="row"><br>
<form>
		
		<input id='comecar' type='button' class="btn btn-success btn-block" value='COMEÇAR'>
		<input type='hidden' class="btn btn-success btn-block" name='id_quiz' value='<?php echo $id_quiz?>'>
		<input type='hidden' class="btn btn-success btn-block" name='funcao' value='carrega_quiz'>
	</form>
		</div>
		<div id='modal'></div>
		
  
</div>			
</div>							