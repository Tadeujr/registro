<?php
	include 'funcoes.php';
	
	$nome = $_POST['nome'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	if(verificaLogin(conexao(),$login)){
		echo "<script>alert('Login já existente');location.href='formulario_usuario.php';</script>";
	}else if($nome == NULL || $login == NULL|| $senha ==NULL){
		echo "<script>alert('Você deixou algum campo vazio');location.href='formulario_usuario.php';</script>";
	}else{
		addUsuario(conexao(),$nome,$login,$senha);
		echo "<script>alert('Adicionado com sucesso');location.href='formulario_usuario.php';</script>";
	}
?>