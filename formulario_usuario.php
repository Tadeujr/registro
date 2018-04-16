<?php header("Content-type: text/html; charset=UTF-8");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Registros</title>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/glDatePicker.default.css" />
	<link rel="stylesheet" href="css/glDatePicker.jucees.css" />     

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/sgi.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	
	
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
	
		<br><center><dd><h1><b>Cadastro de Usuários</b></h1></center><hr></hr>
		
		
	<!-- formulario de cadastro de duvida-->
	<form name="input" action="cadastro_usuario.php" method="post">
		<center><div>
			<div class="col-7" style ="padding-: 30px" >
				<input type="text" class="form-control" name="nome"  placeholder="Nome do usuário" size="30" >
			</div>	
			<div class="col-7" style ="padding-: 30px" >
				<input type="text" class="form-control" name="login"  placeholder="login de cadastro" size="30" >
			</div>
			
			<div class="col-7" style ="padding-: 30px" >
				<input type="password" class="form-control" name="senha" placeholder="senha do usuário"  size="30" >
			</div>
			<div class="col-7" style ="padding-: 30px"><br>
			<button type="submit" class="btn btn-dark"> Registrar</button>
			</div>
		</div><center>	
			
	</form>

	

		
		<!-- End page content -->
	


</body>

</html>

