<?php
/* Código realizado por Beatriz Franco e Tomás Conti */
    session_start();

    $id=$_POST[id];
    $senha= $_POST[senha];
    $senhacod= md5($senha);

    include "conexao.php";

    $sql="UPDATE public.usuarios SET senha='$senhacod' WHERE idcliente=$id;";
    $query=pg_query($conect, $sql);
    header("Location: ./index.php");

?>