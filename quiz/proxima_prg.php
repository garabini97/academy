<?php
include('conecta.php');
session_start();
	
if(isset($_POST['id_proxima'])){
	$_SESSION['contador'];
	if(isset($_POST['resposta'])){
		
		$resposta = $_POST['resposta'];
	}
	else{
		
		$resposta = '0';
		
	}
		$_SESSION['array_respostas'][$_SESSION['contador']] = $resposta;
		

	$_SESSION['contador']++;
	
	if(($_SESSION['contador'] <0) || ($_SESSION['contador'] >= count($_SESSION['perguntas_array']))){
		
		$_SESSION['contador']--;
		
	}
	
	if(count($_SESSION['array_respostas']) > $_SESSION['contador']){
  $alternativa_select = $_SESSION['array_respostas'][$_SESSION['contador']];

	 
	switch ($alternativa_select) {
    case '1':
       echo "<script>$('#1').prop('checked', true)</script>";
        break;
    case '2':
      echo "<script>$('#2').prop('checked', true)</script>";
        break;
	case '3':
     echo "<script>$('#3').prop('checked', true)</script>";
        break;
	case '4':
       echo "<script>$('#4').prop('checked', true)</script>";
        break;	
}
	
	}
	$titulo = $_SESSION['titulo_quiz'] ;
	
	$id_pergunta = $_SESSION['perguntas_array'][$_SESSION['contador']];
	

	echo " <h3>$titulo</h3>";

	$sql2 = $mysqli->prepare('select p.pergunta,a.texto,a.ind_alt from perguntas as p , alternativas as a where (p.id = ?) and (p.id = a.id_pergunta) ');
	$sql2->bind_param('i',$id_pergunta);
	$sql2->execute();
	$sql2->bind_result($pergunta,$alternativa,$ind_alt);
	$sql2->fetch();
	$a=1;
	echo "
	
	<form>
	<h4>$pergunta</h4>
	
	$ind_alt)<input id='$a'  name='resposta' type='radio' value='$a' ></input>
		<input readonly class='form-control' name='a1' type='text' value='$alternativa'></input>
";
		while ($sql2->fetch()){
		$a++;
		echo" 
		
		$ind_alt)<input  id='$a'   name='resposta' type='radio' value='$a' ></input>
		<input readonly class='form-control' name='a1' type='text' value='$alternativa'></input>
		";
		}		
		
		echo "
	  
	  <input type='hidden' id='id_anterior' class=btn btn-success btn-block name='id_anterior' value='0'>
	  <input type='hidden' id='id_proxima' class=btn btn-success btn-block name='id_proxima' value='$_SESSION[contador]'>
	  </form>
	  <input style='width:100px' id='anterior' type='button'  class='btn btn-success btn-block' name='anterior' value='Anterior'>
	  <input style='width:100px' id='proxima' type='button'  class='btn btn-success btn-block' name='proxima' value='Proxima'>
	  <input style='width:100px' id='finalizar'type='button'  class='btn btn-success btn-block' name='finalizar' value='Finalizar'>
	  
";
$sql2->close();		
	
}



