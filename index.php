<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">

        <title>Sistema de Registros</title>
        <link rel="stylesheet" href="css/w3.css" />        
        <link rel="stylesheet" href="css/login.css" />
    </head>
    <body>

        <div>
            <img src="img/brasao.png" class="w3-left"/>
            <img src="img/logo-jucees.png" class="w3-right"/>           
        </div>

        <div class="login">
            <div class="login-screen">                
                <div class="app-title">                    
                    <h1>JUCEES</h1>
                      <h4>Sistema de Registros</h4>                       
                </div>

                <div class="login-form" >
					<form name="input" action="login.php" method="post">
						<div class="control-group">
							<input type="text" class="login-field"  placeholder="Usuário" name="usuario">
						</div>

						<div class="control-group">
							<input type="password" class="login-field" placeholder="Senha" name="senha">
						</div>

						<button type="submit" class="btn btn-primary btn-lg" >Entrar</button>
						<p><a class="btn btn-primary btn-large btn-block" href="indexadm.php">Entrar como administrador</a></p>
					</form>
                </div>
                
                <div class="w3-center login-footer">Desenvolvido pela equipe REDESIM - JUCEES @ 2017/2018</div>
            </div>	
        </div>
    </body>
</html>
