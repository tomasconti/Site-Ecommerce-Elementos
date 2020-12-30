<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Grava Produto </title>
</head> 
<body>
 <! -- Código realizado por Anna Macari -->
<?php
include "conexao.php"; 
$nome=$_GET["nome"];
$descricao=$_GET["descricao"];
$quantidade=$_GET["quantidade"]; 
$nome_imagem=$_GET["nome_imagem"];
$cor=$_GET["cor"];
$tamanho=$_GET["tamanho"];
$material = $_GET["material"];
$preco = $_GET["preco"]; 
$excluido='n';
$sql="INSERT INTO produto
VALUES(DEFAULT, '$nome', '$descricao', '$quantidade', '$nome_imagem', '$cor','$tamanho','$material','$preco','$excluido')";
$resultado=pg_query($conecta,$sql);
$linhas=pg_affected_rows($resultado);

if ($linhas > 0)
{
    echo "<script type='text/javascript'>alert('Cadastro feito!')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuario2.php'>";

	
}

else
{
  $sql="SELECT * FROM cliente WHERE excluido='n' AND LOWER(login) = LOWER('$login');";
  $resultado= pg_query($conecta, $sql);
  $qtde=pg_num_rows($resultado);
  if ($qtde > 0)
   {
	   echo "<script type='text/javascript'>alert('Login já existente! Tente novamente')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=admcriarcliente.php'>";
    }
  else
	{
    		echo "<script type='text/javascript'>alert('Ocorreu um erro! Tente novamente')</script>";
           	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=admcriarcliente.php'>";
	}
}
pg_close($conecta);
?>  
</body>
</html> 
 