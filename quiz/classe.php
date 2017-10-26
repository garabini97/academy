<?php

class Quiz {
	
	
	public function cadastrapergunta($mysqli,$categoria_id ,$assunto_id ,$dificuldade_id ,$pergunta,$resposta,$autor_id){
			$sql = "INSERT INTO perguntas(categoria_id , assunto_id , dificuldade_id , pergunta , resposta,autor_id)
			VALUES ('$categoria_id' ,'$assunto_id ','$dificuldade_id' ,'$pergunta','$resposta','$autor_id')";
			$resultado = mysqli_query($mysqli,$sql);
			return $resultado;
			
			
	}	
}