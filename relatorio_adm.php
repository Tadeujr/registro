<?php
	include 'funcoes.php';
	header("Content-type: text/html; charset=UTF-8");

	
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<center><title>Sistema de Registros</title></center>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
		<span class="w3-right">Sistema de Registros</span>
		
	</div>
	
	<?php include 'menu_adm.php'; ?>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left: 300px; margin-top: 43px;">
		<!-- Header -->
		<dd>
		<div>
			<h1><b>Relatório</b></h1>

	
		<!-- formulario de cadastro de duvida-->
			<div class="container">
		
			 <?php atendimentoUsuario()?>
			 <?php atendimentoGeral()?>
			</td></tr></table>
			</div>

		<a  href="relatorioDiario_adm.php" role="button" class="btn btn-dark">Relatorio Diário</a>
		 <a  href="relatorio_adm.php" role="button" class="btn btn-dark">Relatorio Mensal</a>
	


		</div>

	</div>


	<!-- End page content -->



</body>

</html>

