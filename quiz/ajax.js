$(document).ready(function(){
	
	
	//CARREGA COMBO BOX CATEGORIAS - CADASTRO.PHP
	$('#combo_categorias').mouseup(function(){
		
		var categoria = $('#combo_categorias').serialize();
		$.ajax({
			url:'carrega_combocat.php',
			type:'POST',
			dataType:'html',
			data: categoria,
			success: function(data){
				$('#combo_assuntos').empty().html(data);
			}	
		});
	});
	
	
	$('#submit_pergunta').click(function(){
		
		var dados = $('form').serialize();
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	$('#submit_login').click(function(){
		
		var dados = $('form').serialize();
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	$('#submit_buscaquiz').click(function(){
	
		var dados = $('form').serialize();
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
				
			
			}	
		});
	});
	
	$('#comecar').click(function(){
	var dados = $('form').serialize();
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	 $(document).on("click","#anterior",function(){
	var dados = $('form').serialize();
		$.ajax({
			url:'anterior_prg.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	 $(document).on("click","#proxima",function(){
		
		var dados = $('form').serialize();
		$.ajax({
			url:'proxima_prg.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	
	$(document).on("click","#finalizar",function(){
		  var confirmacao = confirm("Tem certeza que deseja finalizar?");
 		  if (confirmacao == true){
		var dados = $('form').serialize();
		$.ajax({
			url:'grava_resultado.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#modal').empty().html(data);
				$('#myModal').modal('show');
			}	
		});
	}});
	
	$(document).on("click","#close",function(){
		
		top.location.href="home.php"
	
	});
	
	$('#cadastrar_usuario').click(function(){
		
	var dados = $('form').serialize();
	
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
			
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	$('#combo_filtro').mouseup(function(){
	var dados = $('form').serialize();
		$.ajax({
			url:'processa_cadastros.php',
			type:'POST',
			dataType:'html',
			data: dados,
			success: function(data){
				
				$('#resultado').empty().html(data);
			}	
		});
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$("#senha").blur(function(){
				if($("#senha").val().length < 6 && $("#senha").val() != "" )
					{
						
						
						alert('Senha invalida,digite uma senha com no minimo 6 digitos')
						$("#senha").val("");
						$("#senha").focus();
						
						
						
					}
					
			});
			
			$("#confirmasenha").blur(function(){
				if($("#senha").val() == $("#confirmasenha").val()){
				
						
					}
				else{
					alert('As senhas nao conferem, tente novamente')
					$("#senha").focus();
				
				}
			
			});

});
