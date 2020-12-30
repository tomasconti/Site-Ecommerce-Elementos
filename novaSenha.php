/* Código realizada por Beatriz Franco */
<?php

    session_start();

    $id=$_SESSION['id'];
    $senha= $_POST[senha];
    $senhacod= md5($senha);

    include "conexao.php";

    $sql="UPDATE cliente SET senha='$senhacod' WHERE idcliente=$id;";
    $query=pg_query($conecta, $sql);
    header("Location: ./login.html");
    

?>
