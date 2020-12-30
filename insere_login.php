<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Grava login </title>
</head> 
<body>
<! -- Código realizado por Anna Macari e Beatriz Franco -->
<?php
include "conexao.php"; 
$nome=$_GET["nome"];
$login=$_GET["login"];
$email=$_GET["email"]; 
$senhaForca=$_GET["senhaForca"];
$telefone=$_GET["telefone"];
$ddd=$_GET["ddd"];
$cep = $_GET["cep"];
$cpf = $_GET["cpf"]; 
$classificacao='clientes';

$excluido='n';
$sql="INSERT INTO cliente
VALUES(DEFAULT, '$nome', LOWER('$login'), '$email', md5('$senhaForca'), '$telefone','$ddd','$cep','$cpf','$classificacao','$excluido')";
$resultado=pg_query($conecta,$sql);
$linhas=pg_affected_rows($resultado);

if ($linhas > 0)
{
    echo "<script type='text/javascript'>alert('Cadatro feito!')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.html'>";

	
}

else
{
  $sql="SELECT * FROM cliente WHERE excluido='n' AND LOWER(login) = LOWER('$login');";
  $resultado= pg_query($conecta, $sql);
  $qtde=pg_num_rows($resultado);
  if ($qtde > 0)
   {
	   echo "<script type='text/javascript'>alert('Login já existente! Tente novamente')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
    }
  else
	{
    		echo "<script type='text/javascript'>alert('Ocorreu um erro! Tente novamente')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
	}
}
pg_close($conecta);
?>  
</body>
</html> 
