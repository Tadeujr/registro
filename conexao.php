<?php

	#-----------------------------------------------------------------------------------------------------------------------------------------------
	#Função para conectar ao banco de dados
	# retorna a conexao
	function conexao(){
		return $conexao = mysqli_connect('localhost','root','','sistemaderegistro');
	}
	
	#--------------------------------------------------------------------------------------------------------------------------------------------------

	#funçao para desconecatar do banco de dados
	function desconectar($conexao){
		mysql_close($conexao);
	}

	
?>