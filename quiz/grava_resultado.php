<?php
session_start();
include('conecta.php');


$acertos = 0;
$erros = 0;
$pontuacao = 0;
$gabarito_array = explode(",",$_SESSION['gabarito']);


if(isset($_POST['resposta'])){
		
		$resposta = $_POST['resposta'];
	}
	else{
		
		$resposta = '0';
		
	}
		$_SESSION['array_respostas'][$_SESSION['contador']] = $resposta;



for($i=0;$i < count($_SESSION['perguntas_array']);$i++){
	

	$sql = $mysqli->prepare('SELECT d.nome from dificuldades as d,perguntas as p WHERE (p.id= ?) and (p.dificuldade_id = d.id)');
	$sql->bind_param('i',$_SESSION['perguntas_array'][$i]);
	$sql->execute();
	$sql->bind_result($dificuldade);
	$sql->fetch();
	$sql->close();
	
	
	if($_SESSION['array_respostas'][$i] == null){
		
		$_SESSION['array_respostas'][$i] = 0;
		}
		
		if($_SESSION['array_respostas'][$i] == $gabarito_array[$i]){
			
		
			
			
			$acertos++;			
			switch ($dificuldade) {
				case 'Basico':
			$pontuacao = $pontuacao + '20';
			break;
			case 'Intermediario':
	
			$pontuacao = $pontuacao + '35';
			break;
			case 'Avancado':
	
			$pontuacao = $pontuacao + '50';
			break;

			}
			
		}
		else $erros ++;

}
	
	$sql = $mysqli->prepare('INSERT INTO resultados(id_quiz ,acertos,erros,pontuacao,id_usuario)
			VALUES (?,?,?,?,?)');
	$sql->bind_param('iiiii',$_SESSION['id_quiz'],$acertos,$erros,$pontuacao,$_SESSION['id']);
	$sql->execute();
	$sql->close();
	
	$xp = $_SESSION['xp']+ $pontuacao;
	
	$sql = $mysqli->prepare('UPDATE player_stats set xp = xp + ?, acertos = acertos + ? , erros = erros + ?, pontuacao = pontuacao + ? where usuario_id = ?');
	$sql->bind_param('iiiii',$xp,$acertos,$erros,$pontuacao,$_SESSION['id']);
	$sql->execute();
	$sql->close();
	
	$_SESSION['xp'] = $xp;
	$_SESSION['pontuacao'] = $_SESSION['pontuacao'] + $pontuacao;
	$_SESSION['pont_bar'] = intval(($_SESSION['xp'] /$_SESSION['pont_max']) * 100 );
	
	if( $_SESSION['xp'] == $_SESSION['pont_max'] || $_SESSION['xp'] > $_SESSION['pont_max']){
		
		
		$_SESSION['level']++;
		$_SESSION['xp'] = $xp - $_SESSION['pont_max'];
		$_SESSION['pont_max'] = (($_SESSION['level'] * 1.5) * 150);
		$_SESSION['pont_bar'] = intval(($_SESSION['xp'] /$_SESSION['pont_max']) * 100 );
		$sql = $mysqli->prepare('UPDATE player_stats set xp = ?,level = level +1 where usuario_id = ?');
		$sql->bind_param('ii',$_SESSION['xp'],$_SESSION['id']);
		$sql->execute();
		$sql->close();
		
	
	
		
	}
	
	
		
		
		
	
	

echo "
	<div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
      <!-- Modal content-->
	  
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Você acertou $acertos questões e errou $erros.</p>
		  <p>Total: $pontuacao pontos.</p>
        </div>
        <div class='modal-footer'>
          <input style='width:100px' id='close' type='button'  class='btn btn-default' name='close' value='Concluir'>
        </div>
      </div>
      
    </div>
  </div>";



	unset($_SESSION['titulo_quiz'],$_SESSION['sql_perguntas'],$_SESSION['perguntas_array'],$_SESSION['contador'],$_SESSION['array_respostas']);unset($_SESSION['titulo_quiz'],$_SESSION['sql_perguntas'],$_SESSION['perguntas_array'],$_SESSION['contador'],$_SESSION['array_respostas']);


?>