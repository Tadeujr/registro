<?php 
	session_start(); # Deve ser a primeira linha do arquivo
	header("Content-type: text/html; charset=UTF-8");
	include 'funcoes.php';
	
	
	$protocolo = verificarProtocolo(conexao());
	$horas = horaAtendimento();
	$_SESSION['protocolo'] = $protocolo;
	$_SESSION['horas'] = $horas;
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Registro</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/sgi.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/glDatePicker.default.css" />
	<link rel="stylesheet" href="css/glDatePicker.jucees.css" />
	

	

</head>
<body>

	<!-- Top container -->
	<div class="w3-container w3-top w3-black w3-large w3-padding"
		style="z-index: 4">
		<button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();">
			<i class="fa fa-bars"></i> Menu
		</button>
		<span class="w3-right">Sistema de Registro</span>
	</div>

	<?php include 'menu.php'; ?>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left: 300px; margin-top: 43px;">
		<!-- Header -->
		<div>
			<dd><h1>Protocolo: <?php echo $protocolo;?></h1></dd><hr>

	
	<!-- formulario de cadastro de duvida-->
	<form name="dados_cliente" action="cadastro.php" method="post">
		<div class="form-row">
			<dd><div class="col-7" style ="padding-: 30px" >
				<input type="text" class="form-control" name="nome" placeholder="Nome" size="80" maxlength="100">
			</div>
			<div class="form-row">
			<div class="col-7" style ="padding-: 30px" >
				<p><input type="email" class="form-control" name="email" placeholder= "Email" size="80" maxlength="50">
			</div>
			<div class="col-7" style ="padding-: 30px" >
				<input type="text" class="form-control" name="duvida" placeholder= "Dúvida" size="80" maxlength="50">
			</div><br>			
			<div class = "form-table">
				
				<textarea rows="10" cols="60" style="resize: none" name="solucao" placeholder= "Solução" maxlength="650"></textarea>
			</div>
			<button type="submit" class="btn btn-dark" >Registrar</button><br> 
	  </div>
	</form>
				
		</dd></div>

		<br /><br />

		<div id="resultado"></div>
		<!-- End page content -->
	</div>


</body>

</html>

