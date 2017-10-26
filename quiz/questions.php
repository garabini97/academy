<?php require_once 'templates/header.php';?>

<div class="content">
     	<div class="container">
     		<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h1 class="text-center text_underline"> Tempo : <span id='timer'></span> </h1>
	     			<form class="form-horizontal" role="form" id='quiz_form' method="post" action="quiz-result.php">
						
	     		</div>
	     		
			</div>
		</div>	
</div>
<script>

        function timedCount() {

        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
        	$('#timer').html(result);
            if(c == 0 ){
            	setConfirmUnload(false);
                $("#quiz_form").submit();
            }
            c = c - 1;
            t = setTimeout(function(){ timedCount() }, 1000);
        }
	</script>

<?php require_once 'templates/footer.php';?>		

