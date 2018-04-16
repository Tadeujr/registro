<?php 
define('__ROOT__', dirname(__FILE__));


session_start();
?>
<!DOCTYPE html>
<html>
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Registros</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/sgi.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/glDatePicker.default.css" />
	<link rel="stylesheet" href="css/glDatePicker.jucees.css" />
	<link rel="stylesheet" href="css/jquery.timepicker.css" />
	<link rel="stylesheet" href="css/jquery.form-validator.min.css" />
</head>
<body>
	<!-- Top container -->
	<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:2000">
		<button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
		<span class="w3-right">Sistema de Registros</span>
	</div>

	<?php include 'menu.php'; ?>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:300px;margin-top:43px;">

	  	<!-- Header -->
		<header class="w3-container" style="padding-top:22px">
			<h5><b><i class="fa fa-eye fa-calendar"></i> Agendamentos</b></h5>
		</header>
			 
		<div class="dropdown w3-left">
			<button class="dropbtn">Treinamentos</button>
			<div class="dropdown-content">
				<a href="#" id="agendarTreinamento">Agendar</a>
				<a href="#" id="listarTreinamentos">Listar</a>
			</div>
		</div>
		
		<br /><br /><br />
		
		<?php exibirAlertaSessao('agendarTreinamento'); ?>
		
		<div id ="resultado"></div>
	
		<!-- End page content -->
	</div>


</body>
</html>
