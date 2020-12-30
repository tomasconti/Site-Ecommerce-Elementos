<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastrar</title>
</head>
<body>
<! -- Código realizado por Beatriz Franco e Anna Macari -->

<?php
	include "conexao.php";
	session_start();
	$nome = $_POST['nome'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];
	$cep = $_POST[cep];
	$cpf = $_POST[cpf];
	$excluido = 'n';
	$sql = "INSERT INTO cliente values (default, '$nome', '$login', '$email', '$senha', $telefone, $cep, $cpf, '$excluido');";
	$resultado = pg_query ($conecta, $sql);
	$linhas = pg_affected_rows ($resultado);
	if ($linhas<=0)
	{
		echo "Ocorreu um erro no cadastro";
		header ('refresh:7; url = http://200.145.153.175/annamacari/elementos/cadastro.php', true, 303);
		pg_close($conecta);
		die();
	}
		echo "Cadastrado com sucesso!";
		header ('refresh:7; url = http://200.145.153.175/annamacari/elementos/cadastro.php', true, 303);
		pg_close($conecta);
		die();
</body>
</html>