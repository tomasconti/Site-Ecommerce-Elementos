<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastrar</title>
</head>
<body>
 <! -- Código realizado por Beatriz Franco e Anna Macari e Interface feita por Felipe Franzin-->
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
    $classificacao= $_POST['classificacao'];
	$excluido = 'n';
	$sql = "INSERT INTO cliente values (default, '$nome', '$login', '$email', '$senha', $telefone, $cep, $cpf, $classificacao, '$excluido');";
	$resultado = pg_query ($conecta, $sql);
	$linhas = pg_affected_rows ($resultado);
	if ($linhas<=0)
	{
		echo "Ocorreu um erro no cadastro";
		header ('refresh:7; url = http://200.145.153.175/annamacari/elementos/adm_criarcliente.php', true, 303);
		pg_close($conecta);
		die();
	}
		echo "Cadastrado com sucesso!";
		header ('refresh:7; url = http://200.145.153.175/annamacari/elementos/adm_criarcliente.php', true, 303);
		pg_close($conecta);
		die();
</body>
</html>