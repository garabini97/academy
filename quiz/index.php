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
    <meta name="description" content="RankQuest Jogue Agora !">
	<meta name="author" content="">
    <title>RankQuest</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
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
	<script src="jquery-3.2.1.min.js"></script>
	<script src='ajax.js'></script>
  </head>
  <body>
	<div class="container">
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			<center><h2><b>Rankquest</b></h2></center>
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form id="login-form" class="form-signin">
				<input name="login" id="login" type="text" class="form-control" placeholder="Login" autofocus> 
				<input name="senha" id="senha_login" type="password" class="form-control" placeholder="Password"> 
				<input name="funcao" id="funcao" type="hidden" value='login'> 
				<input type='button' id='submit_login' class="btn btn-block bt-login" value='Login'>
				<div id='resultado'></div>
			</form>
			<div class="form-footer">
				<div class="row">
			
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="register.php"> Cadastro </a>
					</div>
				</div>
			</div>
			<br/>
		
		</div>
	</div>
	<!-- /container -->
    
  </body>
</html>