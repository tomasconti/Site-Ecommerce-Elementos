<?php
/* Código realizado por Beatriz Franco */
    include "conexao.php";
    $login;
    session_start();
    if (isset($_SESSION['user']))
    {
	   $login=$_SESSION['user'];
    }
    $senha = $_GET["senha"];
    $sql="SELECT * FROM cliente WHERE excluido='n' AND login='$login' AND senha = md5('$senha');";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);
    if ($qtde==0)
    {
        echo "<script type='text/javascript'>alert('Senha incorreta!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=confirma_senha.html?idcliente=".$linha["idcliente"]."'>";
        pg_close($conecta);
    }
    else
    {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=alterar_dados2.php'>";
    }
    

?>