<?php require_once 'templates/header.php';?>
<?php 
	if( !empty( $_POST )){
		try {
			$user = new Cl_User();
			$result = $user->getAnswers( $_POST );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}else{
		header('Location: home.php');exit;
	}
?>
	<div class="content">
     	<div class="container">
     		<div class="row">
	     		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<h1 class="text-center text_underline">Seus Resultados:</h1>
					<br />
					
<h3>Respostas Corretas:</h3>
    <h4><?php echo isset($result['right_answer'])? $result['right_answer']:''; ?></h4>
    <hr/>
  
    <h3>Respostas Incorretas:</h3>
    <h3><?php echo isset($result['wrong_answer'])? $result['wrong_answer']:''; ?></h3>
    <hr/>
     <h3>Sem Resposta:</h3>
     <h3><?php echo isset($result['unanswered'])? $result['unanswered']:''; ?></h3>
     <hr/>
					<div class="row btn-c well">
	     				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	     					<a href="start-quiz.php" class="btn btn-success btn-home">Iniciar Novo Quiz !</a>
	     				</div>

	     				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	     					<a href="https://docs.google.com/forms/d/e/1FAIpQLSf9VR_oL4Ry_WUlVWdnSwyQoE21yB2OfU2jichaaZeyS_Y6JQ/viewform" class="btn btn-warning btn-home">Enviar Feedback</a>
	     				</div>
	     			</div>
				</div>
     		</div>
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>