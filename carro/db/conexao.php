<?php
   include("config.php");

   // mysqli_con = conecta o projeto com o banco
   $conexao = mysqli_connect(SERVIDOR,USUARIO,SENHA,BANCO) or die ("Erro na conexão com o servidor!".mysqli_connect_error());

?>
