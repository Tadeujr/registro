<?php /*href="menu_principal.php"*/
		/*password_hash($senha, PASSWORD_DEFAULT); //vai para o banco
	password_verify(senha digitada, 'senha salva no banco'){
	*/
	include'funcoes.php';
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	if(login(conexao(),$usuario,$senha) == True){
		include'menu_principal.php';
	}else{
		echo "<script>alert('Login ou senha inválido');location.href='index.php';</script>";
		
	}

	
	
	
?>