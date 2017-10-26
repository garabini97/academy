<?php 
session_start();

if(!isset($_SESSION['login'])){//não está logado
	echo '<script>top.location.href="index.php";</script>';
	
}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Academyskills Quiz">
    <meta name="keywords" content="Jogue agora !">
	<meta name="author" content="">
    <title>Academy Skills Quiz</title>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="http://demos.vetbossel.in/img/favicon.png" type="image/x-icon" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
	<script src="jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='ajax.js'></script>
	<style>
			#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  
  height: 30px;
  background-color: #4CAF50;
}
 </style>   
	
 </head>
 <body>

    <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
			<?php 
			$arr = explode("/",$_SERVER['REQUEST_URI']);
			$uri = end( $arr ); 
			?>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Incio</a></li>
					<li><a href="start-quiz.php">Buscar Quiz</a></li>
					<li><a href="ranking.php">Ranking</a></li>
					
					<?php
						
					echo  "<h4>Level:$_SESSION[level] <br> XP:$_SESSION[xp] / $_SESSION[pont_max] <br></h4><div   id='myProgress'>
							<div style='width:$_SESSION[pont_bar]%' id='myBar'></div>
								</div>";
							
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Player
							
						<?php if($_SESSION['login']) { ?>
							<?php echo $_SESSION['login']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
						
							<li><a href="cadastro.php">Cadastro de pergunta</a></li>
							
							<li class="divider"></li>
							<li><a href="cadastro_quiz.php">Cadastro de quiz</a></li>
							<li class="divider"></li>
							<li style="background: #e67e22; color:#fff"> <a href="logout.php">Sair</a> </li>
						</ul>
						<?php } ?>
					</li>
					
				</ul>
			</div>
		</div>
	</div>