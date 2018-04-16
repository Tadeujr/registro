<?php  header("Content-type: text/html; charset=UTF-8");

echo
"<nav class=\"w3-sidenav w3-collapse w3-white w3-animate-left\" style=\"z-index:3;width:300px;\" id=\"mySidenav\"><br>
  <div class=\"w3-container w3-row\">
    <div class=\"w3-col s4\">
      <img src=\"img/usuario_logado.png\" class=\"w3-circle w3-margin-right\" style=\"width:46px\">
    </div>
    <div class=\"w3-col s8\">
      <span>Bemvindo! Adm</span><br>
      <a href=\"menu_principal_adm.php\" class=\"w3-hover-none w3-hover-text-blue w3-show-inline-block\"><i class=\"fa fa-home\"></i></a>
      <a href=\"https://mx.correio.es.gov.br/OWA/auth/logon.aspx?\" target=\"_blank\" class=\"w3-hover-none w3-hover-text-red w3-show-inline-block\"><i class=\"fa fa-envelope\"></i></a>        
      <a href=\"indexadm.php\" class=\"w3-hover-none w3-hover-text-green w3-show-inline-block\"><i class=\"fa fa-power-off\"></i></a>           
    </div>
  </div>
   <hr>
    <center><h5>Menu</h5></center>
  <a href=\"#\" class=\"w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black\" onclick=\"w3_close()\" title=\"close menu\"><i class=\"fa fa-remove fa-fw\"></i>  Fechar Menu</a>
  <a href=\"formulario_usuario.php\" class=\"w3-padding\"><i class=\"fa fa-users\"></i>  Cadastrar Usuário</a>
  <a href=\"relatorio_adm.php\" class=\"w3-padding\"><i class=\"fa fa-bar-chart\"></i>  Relatório</a>
  

</nav>
<!-- Overlay effect when opening sidenav on small screens -->
<div class=\"w3-overlay w3-hide-large w3-animate-opacity\" onclick=\"w3_close()\" style=\"cursor:pointer\" title=\"close side menu\" id=\"myOverlay\"></div>";


?>