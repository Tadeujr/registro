<?php 
	date_default_timezone_set('America/Sao_Paulo');
	
	include 'conexao.php';
	

#------------------------------------------------------------------------------------------------------------------------------------------------
	#função retorna o horario do atendimento
	# para inserir a hora de entrada 
	function horaAtendimento(){
		return $data = date("H:i:s "); 
	}	
#------------------------------------------------------------------------------------------------------------------------------------------------
	#função lista os clientes do sistema
	#retorna uma matriz com todos os clientes
	#usar para o relatório
	function listarClientes($conexao){
		$banco = mysqli_query($conexao, "select protocolo.protocolo,pessoa.nome, DATE_FORMAT(protocolo.periodo,'%d/%m/%Y') as 'data' 
		,protocolo.duvida,protocolo.solucao,protocolo.inicio,protocolo.fim from pessoa inner join cliente on (pessoa.pessoa_id = cliente.pessoa_fid) inner join 
		protocolo on (protocolo.cliente_fid = cliente.cliente_id)");
		
		$saida = [];
		$clientes = [];
		$i = 0;
		
		while($clientes= mysqli_fetch_array($banco)){
			array_push($saida,$clientes);
			
			
		}
		
		return $saida;
   }
   
#------------------------------------------------------------------------------------------------------------------------------------------------
	#função busca um determinado cliente  do sistema
	# o retorno e um vetor
	function buscarProtocolo($conexao,$protocolo){
		$banco = mysqli_query($conexao,"select protocolo.protocolo,pessoa.nome, DATE_FORMAT(protocolo.periodo,'%d/%m/%Y') as 'data' 
		,protocolo.duvida,protocolo.solucao,protocolo.inicio,protocolo.fim from pessoa inner join cliente on (pessoa.pessoa_id = cliente.pessoa_fid) inner join 
		protocolo on (protocolo.cliente_fid = cliente.cliente_id) where protocolo.protocolo = '$protocolo'"); 
		$cliente = [];
		
		$cliente= mysqli_fetch_array($banco);
	
		return $cliente;
   }
    
#------------------------------------------------------------------------------------------------------------------------------------------------
	#função adiciona na tabela pessoa, so precisa do nome pq o id prenche sozinho
	# lembra de fazer uma função para buscar o nome e retornar o id, para adicionar no protocolo, cliente ou usuario 
	function addPessoa($conexao,$nome){
		$banco = mysqli_query($conexao, "INSERT INTO `pessoa`(`nome`)values ('$nome')");
		$saida = [];
		
		$id_pessoa = mysqli_query($conexao, "select pessoa_id from pessoa where nome = '$nome'");
		$saida= mysqli_fetch_array($id_pessoa);
		
		return $saida[0];
   }
   
#------------------------------------------------------------------------------------------------------------------------------------------------
 
	#função adicionar adiciona na tabela cliente
	#addCliente($conexao, addPessoa($conexao,$nome))
	function addCliente($conexao,$id_pessoa){
		$banco = mysqli_query($conexao, "INSERT INTO `cliente`(`pessoa_fid`) values ('$id_pessoa')");
		
		$saida = [];
		
		$id_cliente = mysqli_query($conexao, "SELECT `cliente_id` FROM cliente where pessoa_fid = '$id_pessoa'");
		$saida= mysqli_fetch_array($id_cliente);
		return $saida[0];
	
		
   }
 #-------------------------------------------------------------------------------------------------------------------------------------------------------  
 #EMAIL
 function Email($endereco,$protocolo){

	// Dados de Envio
	$email_enviar = "Nome de Identificação <$endereco>";//email que envia
	$assunto = "Protocolo de Atendimento JUCEES";

	// Cabeçalho do Email
	$cabecalho = 'MIME-Version: 1.0' . "\r\n";
	$cabecalho .= 'Content-type: text/html; charset=iso-8859-1;' . "\r\n";
	$cabecalho .= "Return-Path: $email_enviar \r\n";
	$cabecalho .= "From: $email_enviar \r\n";
	$cabecalho .= "Reply-To: $email_enviar \r\n";

	// Corpo do Email
	$mensagem = "<h1>Protocolo de Atendimento</h1>";
	$mensagem .= "Protocolo numero: <b>$protocolo</b><br />";//colocar o protocolo
	$mensagem .= "Att. <br /> <b>Equipe REDESIM</b>";

	// Envia o Email
	if(mail($email_enviar, $assunto, $mensagem, $cabecalho)){
		echo "Mensagem enviada com sucesso.";
	}else{
		echo "Sua mensagem não pode ser enviada. Tente novamente.";
	}


	 }
 
 #----------------------------------------------------------------------------------------------------------------------------------------------------
	#função busca o id da pessoa na tabela pessoa atraves do nome
	#
	function buscaPessoa($conexao,$nome){
		$banco = mysqli_query($conexao, "select pessoa_id from pessoa where nome = '$nome'");
		$saida = [];
		$saida= mysqli_fetch_array($banco);
		
		return $saida[0];		
	}

#------------------------------------------------------------------------------------------------------------------------------------------------
	/*PRIMEIRO CHAMAR A FUNÇÃO DE ADICIONAR PESSOA 
	DEPOIS BUSCAR PESSOA VAI RETORNAR O ID
	E POR ULTIMO EU CADASTRO COM LOGIN E SENHA
	*/
	#função adicionar adiciona na tabela Usuario
	#addUsuário($conexao, addPessoa($conexao,$nome)) LEMBRAR DE POR LOGIN E SENHA 
	#a senha entra enbaralhada no banco de dados
	
	function addUsuario($conexao,$nome,$login,$senha){
		$usuario_id = addPessoa($conexao,$nome);
		$hash = password_hash($senha, PASSWORD_DEFAULT);
		$banco = mysqli_query($conexao, "INSERT INTO `usuario`(`login`, `senha`, `pessoa_fid`) VALUES ('$login','$hash','$usuario_id')");
		
		
   }
#-------------------------------------------------------------------------------------------------------------------------------------------------
   #função para verificar o login e a senha do usuario
   # a entrada e a conexão, o nome do usuario e a senha
   function login($conexao, $user,$senha){
	   $banco = mysqli_query($conexao, "SELECT senha,login FROM usuario WHERE login = '$user'");
	   $hash = [];
	   $hash= mysqli_fetch_array($banco);
	   
	   if(password_verify($senha,$hash[0]) && $hash[1] == $user){
		   
		   return True;
	   }else{
		   return False;
	   }
	  
	  
	   
   }
   
      function loginAdm($conexao, $user,$senha){
	   $banco = mysqli_query($conexao, "SELECT senha,adm_user FROM usuario WHERE login = '$user'");
	   
	   $hash = [];
	   $hash= mysqli_fetch_array($banco);
	   
	   if(password_verify($senha,$hash[0]) && $hash[1] != NULL 	){
		   return True;
	   }else{
		   return False;
	   }
	  
	  
	   
   }
 
 #------------------------------------------------------------------------------------------------------------------------------------------------
 
	#função adicionar adiciona na tabela cliente
	function verificarProtocolo($conexao){
		$protocolo = randomNum();
		$banco = mysqli_query($conexao, "select protocolo_id from protocolo like '$protocolo'");
		
		
		// enquanto nao achar um protocolo valido é criado um novo
		while($banco != NULL){
			$protocolo = randomNum();
			$banco = verificarProtocolo($conexao,$protocolo);
		}
		
		return $protocolo;#retorno para mostrar na tela e salvar no banco
		
   }
   # so para mostrar o protocolo na tela
   # chamar a função para testa o protocolo e mostra na tela
   function mostrarProtocolo($protocolo){
	
	   echo $protocolo;
   }
 
#------------------------------------------------------------------------------------------------------------------------------------------------
 
	#função  adiciona na tabela protocolo
	function protocolo($conexao,$duvida,$solucao ,$protocolo_id,$cliente_id,$inicio,$id_user){
		$entrada = mysqli_query($conexao, "INSERT INTO `protocolo`(`duvida`, `solucao`, `protocolo`, `cliente_fid`, `inicio`, `fim`, `periodo`,`usuario_fid`) 
		VALUES ('$duvida','$solucao','$protocolo_id','$cliente_id','$inicio',NOW(),NOW(),'$id_user')");
   
   }
   
#-------------------------------------------------------------------------------------------------------------------------------------------------  
   #função para gerar numero aletório para registro do cliente 
   # retorno ANO.NUM => 2018123456
	function randomNum(){
		$num = mt_rand (111111 , 999999);
		
		return date('Y').$num;
	}
#------------------------------------------------------------------------------------------------------------------------------------------------- 	
#função verififca se as informações duvida e solução nao estao vazias 	
	function verificaFormulario($conexao,$duvida,$solucao ,$protocolo,$cliente_id,$hora,$usuario){
		
		if($duvida == NULL || $solucao == NULL){
			echo "<script>alert('Existe algum campo vazio!');location.href='formulario_cliente.php;</script>";


		}else{
			

			$id_user = mysqli_query($conexao, "SELECT usuario_id FROM `usuario` WHERE login = '$usuario'");
			$saida = [];
			$saida= mysqli_fetch_array($id_user);
			protocolo($conexao,$duvida,$solucao ,$protocolo,$cliente_id,$hora,$saida[0]);
			
			echo "<script>alert('cadastrado  com sucesso!')</script>
				<script>window.location = 'menu_principal.php';</script>";
		}
		
	}
	
	function verificaLogin($conexao,$login){
		$banco =  mysqli_query($conexao, "SELECT `login` FROM `usuario` WHERE login = '$login'");
		$flag = [];
		$flag = mysqli_fetch_array($banco);
		
		if($flag[0]!= NULL){
			return True;	
		}else{
			return False;
		}
	}
	
	
	
	function relatorioHorasAtendimento($conexao){
		$banco = mysqli_query($conexao,"SELECT * FROM RELATORIO"); /*posição 0 recebe qtd e posição 1 recebe a media de tempo do total*/
		$saida = [];
		$saida = mysqli_fetch_array($banco);
		
		return $saida;
	}
	
	
	function relatorioUsuario($conexao){
		$bancoUsuario = mysqli_query($conexao,"SELECT pessoa.nome,count(protocolo.protocolo) as atendimento, TIME_TO_SEC(avg(TIME_TO_SEC(protocolo.fim-protocolo.inicio))/ count(protocolo.protocolo)) as media FROM protocolo inner join usuario on (usuario.usuario_id = protocolo.usuario_fid) inner join pessoa on (pessoa.pessoa_id = usuario.pessoa_fid) group by pessoa.nome"); 
		$usuarios = [];
		
		/*Busco os usuarios no banco*/
        while($usuario = mysqli_fetch_assoc($bancoUsuario )){
            
            array_push($usuarios,$usuario);
            
            
        }
	
		return $usuarios;
	}
	
	
	function relatorioDiario($conexao){
		$bancoUsuario = mysqli_query($conexao,"SELECT pessoa.nome as nome,count(protocolo.protocolo) as atendimento, TIME_TO_SEC(avg(TIME_TO_SEC(protocolo.fim-protocolo.inicio))/ count(protocolo.protocolo)) as media
		FROM protocolo inner join usuario on (usuario.usuario_id = protocolo.usuario_fid) inner join pessoa on (pessoa.pessoa_id = usuario.pessoa_fid)
		WHERE protocolo.periodo = DATE_FORMAT(curdate(), '%y-%m-%d') group by pessoa.nome"); 
		$usuarios = [];
		
		/*Busco os usuarios no banco*/
        while($usuario = mysqli_fetch_assoc($bancoUsuario )){
            
            array_push($usuarios,$usuario);
            
            
        }
	
		return $usuarios;
	}
	
	function atendimentoDiario(){
		$usuarios = [];
		$usuarios = relatorioDiario(conexao());
		
		echo"<table class='table'>
			<thead>
			  <tr >
				<th>Nome</th>
				<th>Atendimento</th>
				<th>Tempo Médio de Atendimento</th>				
			  </tr>
			</thead>
			<tbody>
			  ";
			foreach($usuarios as $pessoa ){
				echo "<tr><td>".$pessoa['nome']."</td>"."<td>".$pessoa['atendimento']."</td>";
				printf("<td> %.2f  Min </td>", $pessoa['media']);
			}		
	}
	function atendimentoGeral(){
		$dados = [];
		$dados = relatorioHorasAtendimento(conexao());
		echo"<table class='table'>
			<thead>
			  <tr >
				<th>Atendimento Geral</th>
				<th>Tempo Médio de Atendimento</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>$dados[0] </td>
				<td>";
				printf("%.2f  Min", $dados[1]);
	}
	
	function atendimentoUsuario(){
		$usuarios = [];
		$usuarios = relatorioUsuario(conexao());
		
		echo"<table class='table'>
			<thead>
			  <tr >
				<th>Nome</th>
				<th>Atendimento</th>
				<th>Tempo Médio de Atendimento</th>				
			  </tr>
			</thead>
			<tbody>
			  ";
			foreach($usuarios as $pessoa ){
				echo "<tr><td>".$pessoa['nome']."</td>"."<td>".$pessoa['atendimento']."</td>";
				printf("<td> %.2f  Min </td>", $pessoa['media']);
			}		
	}
	
	
	
	
	
	/*
SELECT count(protocolo.protocolo),pessoa.nome, DATE_FORMAT(protocolo.periodo, "%d-%m-%y") FROM protocolo inner join usuario on (usuario.usuario_id = protocolo.usuario_fid) inner join pessoa on (pessoa.pessoa_id = usuario.pessoa_fid) WHERE protocolo.periodo = DATE_FORMAT(curdate(), "%d-%m-%y") group by pessoa.nome

SELECT count(protocolo.protocolo),pessoa.nome, DATE_FORMAT(protocolo.periodo, "%d-%m-%y") FROM protocolo inner join usuario on (usuario.usuario_id = protocolo.usuario_fid) inner join pessoa on (pessoa.pessoa_id = usuario.pessoa_fid) WHERE protocolo.periodo = DATE_FORMAT(curdate(), "%y-%m-%d") group by pessoa.nome







create view  RELATORIOGERAL as SELECT count(protocolo.protocolo) as atendimento ,pessoa.nome, DATE_FORMAT(protocolo.periodo, "%d-%m-%y") as relatorioDia FROM protocolo inner join usuario on (usuario.usuario_id = protocolo.usuario_fid) inner join pessoa on (pessoa.pessoa_id = usuario.pessoa_fid) group by pessoa.nome

*/
?>
