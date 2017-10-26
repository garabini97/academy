<?php
session_start();
if(isset($_SESSION['login'])){//não está logado
	echo '<script>top.location.href="home.php";</script>';
	
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="php quiz script, php quiz code, php quiz application, quiz php code, php quiz system, online quiz using php, quiz using php, how to make quiz in php, quiz system in php, php programming quiz, online quiz using php and mysql, create online quiz using php and mysql, create quiz using php mysql, php quiz script free">
    <meta name="keywords" content="php quiz script, php quiz code, php quiz application, quiz php code, php quiz system, online quiz using php, quiz using php, how to make quiz in php, quiz system in php, php programming quiz, online quiz using php and mysql, create online quiz using php and mysql, create quiz using php mysql, php quiz script free">
    <title>PHP Quiz Script</title>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
		<script src="jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='ajax.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="container">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<center><h2><b>AcademySkills</b></h2></center>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form>
				<br><div>
					<input name="nome" id="nome" type="text" class="form-control" placeholder="Nome"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="login" id="login" type="text" class="form-control" placeholder="Login" > 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="senha" id="senha" type="password" class="form-control" placeholder="Senha"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirmasenha" id="confirmasenha" type="password" class="form-control" placeholder="Confirmar Senha"> 
					<span class="help-block"></span>
				</div>
				<div>
				
					<input name="celular" id="celular" type="text" class="form-control" placeholder="Celular" > 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email" id="email" type="email" class="form-control" placeholder="Endereço de E-mail" > 
					<span class="help-block"></span>
				</div>
				<div>
					<h5>Jogador</h5>
					<input   name='tipo_usuario' type='radio' value='3'>
					<h5>Professor</h5>
					<input   name='tipo_usuario' type='radio' value='4'>
					<span class="help-block"></span>
				</div>
				
				<input name="funcao" id="funcao" type="hidden" value='cadastrar_usuario' >
				<input type='button' id='cadastrar_usuario'  class="btn btn-block bt-login" value='Salvar' >
			</form>
			<div class="form-footer">
				<div class="row">
					
					
						<i class="fa fa-check"></i>
						<a href="index.php"> Entrar </a>
						<div id='resultado'></div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    