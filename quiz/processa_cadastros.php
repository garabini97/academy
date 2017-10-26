<?php
include('conecta.php');
session_start();


if(isset($_POST['funcao']) && $_POST['funcao'] == 'login'){
	
	$sql = $mysqli->prepare('SELECT s.xp,s.level,u.id,u.tipo_usuario,s.pontuacao from usuarios as u, player_stats as s WHERE (u.login= ? and u.senha= ?) and (u.status = "A") and (u.id = s.usuario_id)');
	$sql->bind_param('ss',$_POST['login'],$_POST['senha']);
	$sql->execute();
	$sql->bind_result($xp,$level,$id,$tipo,$pontuacao);
	$sql->store_result();
	$sql->fetch();
	if(($sql->num_rows()) > 0){
		
		
		$_SESSION['id'] = $id;
		$_SESSION['xp'] = $xp;
		$_SESSION['level'] = $level;
		$_SESSION['pontuacao'] = $pontuacao;
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['tipo_usuario'] = $tipo;
		$_SESSION['pont_max'] = (($_SESSION['level'] * 1.5) * 150);
		$_SESSION['pont_bar'] = intval(($_SESSION['xp'] /$_SESSION['pont_max']) * 100 );
		echo '<script>top.location.href="home.php";</script>';
	}
	else{echo "<h2>Dados Invalidos</h2>";		
	}
	
}


elseif(isset($_POST['funcao']) && $_POST['funcao'] == 'busca_quiz'){
	
	
	$sql = $mysqli->prepare('SELECT u.nome,q.id,q.titulo,d.nome,q.vaga_id,q.premio_id from dificuldades as d, quiz as q,usuarios as u where (q.categoria_id = ?) and (q.assunto_id = ?) and (q.autor_id = u.id) and (q.dificuldade_id = d.id) order by q.titulo asc');
	$sql->bind_param('ii',$_POST['combo_categorias'],$_POST['combo_assuntos']);
	$sql->execute();
	$sql->bind_result($autor,$id,$titulo,$dificuldade,$vaga_id,$premio_id);
	while ($sql->fetch()){
		
		echo "<div style=width:300px class='col-xs-12 col-sm-5 col-md-5 col-lg-5 start-page'>
		
			<h4>$titulo $dificuldade</h4>
			<h5>Autor: $autor</h5>
			<a href=quiz.php?id=$id class='btn btn-success btn-block'>Iniciar</a>
		</div>";
		
		
}
$sql->close();

}	

	elseif(isset($_POST['funcao']) && $_POST['funcao'] == 'carrega_quiz'){
		
	$id_quiz = $_POST['id_quiz'];	
	$sql = $mysqli->prepare('select titulo,perguntas_ids,gabarito from quiz where id = ? ');
	$sql->bind_param('i',$id_quiz);
	$sql->execute();
	$sql->bind_result($titulo,$perguntas_ids,$_SESSION['gabarito']);
	$sql->store_result();
	$sql->fetch(); 
	
	
	
	$_SESSION['contador'] = 0;
	$_SESSION['perguntas_array'] = explode(",",$perguntas_ids);
	$_SESSION['titulo_quiz'] = $titulo;
	
	$id_pergunta = $_SESSION['perguntas_array'][$_SESSION['contador']];
	
	for($i=0;$i < count($_SESSION['perguntas_array']);$i++){
		$_SESSION['array_respostas'][$i] = 0;
		
	}
	
	echo " 
	
	<h3>$titulo</h3>";
	$sql2 = $mysqli->prepare('select p.pergunta,a.texto,a.ind_alt from perguntas as p , alternativas as a where (p.id = ?) and (p.id = a.id_pergunta) ');
	$sql2->bind_param('i',$id_pergunta);
	$sql2->execute();
	$sql2->bind_result($pergunta,$alternativa,$ind_alt);
	$sql2->fetch();
	$_SESSION['sql_perguntas'] = $sql2;
	$a=1;
	echo "
	<form>
	<h4>$pergunta</h4>
	
	$ind_alt)<input   name='resposta' type='radio' value='$a'></input>
		<input readonly class='form-control' name='a1' type='text' value='$alternativa'></input>
";
		while ($sql2->fetch()){
		$a++;
		echo" 
		
		$ind_alt)<input   name='resposta' type='radio' value='$a'></input>
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
	
	elseif(isset($_POST['funcao']) && $_POST['funcao'] == 'cadastra_pergunta'){
		
	$sql = $mysqli->prepare('INSERT INTO perguntas(categoria_id , assunto_id , dificuldade_id , pergunta , resposta,autor_id)
			VALUES (?,?,?,?,?,?)');
	$sql->bind_param('iiisii',$_POST['combo_categorias'] ,$_POST['combo_assuntos'] ,$_POST['dificuldade'] ,$_POST['pergunta'],$_POST['resposta'],$_SESSION['id']);
	$sql->execute();
	$sql->close();
	$sql = $mysqli->prepare('select max(id) from perguntas');
	$sql->execute();
	$sql->bind_result($id);
	$sql->fetch();
	$id_pergunta = $id;
	$sql->close();
	$sql = $mysqli->prepare('INSERT INTO alternativas (texto,id_pergunta,ind_alt) VALUES (?,?,?)');
	for($i= 1;$i <= 4;$i++){
		

		switch ($i) {
    case '1':
       $ind_alt = 'A';
        break;
    case '2':
       $ind_alt = 'B';
        break;
	case '3':
       $ind_alt = 'C';
        break;
	case '4':
       $ind_alt = 'D';
        break;	
}
		$alternativa = $_POST['a'.$i];
		$sql->bind_param('sis',$alternativa,$id_pergunta,$ind_alt);
		
		$sql->execute();
	}
	$sql->close();

	echo "<h1>CADASTRADO COM SUCESSO</h1>";
	
}





elseif(isset($_POST['funcao']) && $_POST['funcao'] == 'cadastrar_usuario'){
	
	
	
	$sql = $mysqli->prepare('SELECT login from usuarios where (login = ?)');
	$sql->bind_param('s',$_POST['login']);
	$sql->execute();
	$sql->store_result();
	$sql->fetch();
	if(($sql->num_rows()) > 0){
		
		echo "<h2>Login ja cadastrado</h2>";
		
	}
	
	else{
			
			$sql = $mysqli->prepare('SELECT email from usuarios where (email = ?)');
			$sql->bind_param('s',$_POST['email']);
			$sql->execute();
			$sql->store_result();
			$sql->fetch();
			if(($sql->num_rows()) > 0){
				
				echo "<h2>Email ja cadastrado</h2>";
				
			}
			
			else{
				
				
				$sql = $mysqli->prepare('INSERT INTO usuarios(nome,login,senha,tipo_usuario,celular,email)
					VALUES (?,?,?,?,?,?)');
					$sql->bind_param('sssiis',$_POST['nome'] ,$_POST['login'] ,$_POST['senha'] ,$_POST['tipo_usuario'],$_POST['celular'],$_POST['email']);
					$sql->execute();
					$sql->close();
					
				echo "<script>alert('Cadastrado com sucesso')
						top.location.href='home.php'
				
					</script>";
				
				
			}
	
	
	}
	
	
}
	

?>

