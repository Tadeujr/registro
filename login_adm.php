<?php /*href="menu_principal.php"*/
		/*password_hash($senha, PASSWORD_DEFAULT); //vai para o banco
	password_verify(senha digitada, 'senha salva no banco'){
	*/

	
	include'funcoes.php';
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	
	if(loginAdm(conexao(),$usuario,$senha) == True){
		include'menu_principal_adm.php';
	}elseif($usuario == NULL || $senha == NULL){
		echo "<script>alert('Campo Login ou senha vazio');location.href='indexadm.php';</script>";

	}else{
		echo "<script>alert('Login ou senha inválido');location.href='indexadm.php';</script>";
	}
	
	

	
	
	
?>