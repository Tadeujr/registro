<?php
	session_start();
	include 'funcoes.php';
	

	$login = $_SESSION['usuario']; 
	$nome = $_POST['nome'];
	$duvida = $_POST['duvida'];
	$solucao = $_POST['solucao'];
	$protocolo = $_SESSION['protocolo'];
	$horas = $_SESSION['horas'];
	$email = $_POST['email'];
	
	

	if($nome != NULL){
		$pessoa_id =  addPessoa(conexao(),$nome);
		$cliente_id = addCliente(conexao(),$pessoa_id);
		verificaFormulario(conexao(),$duvida,$solucao ,$protocolo,$cliente_id,$horas,$login);
	}else{
		echo "<script>alert('Informe o nome por favor!');location.href='formulario_cliente.php';</script>";
		
	}
	
	
?>
