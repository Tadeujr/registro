<?php /*href="menu_principal.php"*/
		/*password_hash($senha, PASSWORD_DEFAULT); //vai para o banco
	password_verify(senha digitada, 'senha salva no banco'){
	*/
	session_start();
	include'funcoes.php';
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$_SESSION['usuario'] = $usuario;
	

	if(login(conexao(),$usuario,$senha) == True){
		include'menu_principal.php';
	}elseif($usuario == NULL || $senha == NULL){
		
		echo "<script>alert('Campo Login ou senha vazio');location.href='index.php';</script>";

	}else{
		echo "<script>alert('Login ou senha inválido');location.href='index.php';</script>";
	}
	
	
	
?>