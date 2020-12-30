 <!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <title>Enviar</title>
    </head>
    
<! -- Código realizado por Beatriz Franco -->

<?php

    include "conexao.php";
    session_start();

    $email= $_POST['email'];
    $sql= "SELECT * FROM cliente WHERE email='$email' AND excluido='n';";
    $query= pg_query($conecta, $sql);
    $num= pg_num_rows($query);

    if($num > 0){
        $linha=pg_fetch_assoc($query);
        $_SESSION['email']= $email;
        $_SESSION['idcliente']= $linha[idcliente];
        if(include "recuperar.php"){ echo "<script type='javascript'>alert('Email enviado com Sucesso! Confira sua caixa de entrada.');</script>";
        header("Location: ./login.html");}
    }

    else{
        echo "<script type='javascript'>alert('Houve um erro ao enviar o email. Tente novamente mais tarde.');</script>";
        header("Location: ./esqueceu_senha.html");
    }	

?>