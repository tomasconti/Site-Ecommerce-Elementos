<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8" />
<title>Consulta</title>
</head> 
<body>
<! -- Código realizado por Beatriz Franco e Anna Macari -->

<?php
include "conexao.php"; 
$nome=$_POST["nome"];
$email=$_POST["email"];
$idcliente=$_POST["idcliente"];
$telefone=$_POST["telefone"];
$ddd=$_POST["ddd"];
$cep=$_POST["cep"];
$cpf=$_POST["cpf"];
$sql="UPDATE cliente 
SET
nome = '$nome',
email = '$email', 
telefone = '$telefone',
ddd = '$ddd',
cep = '$cep',
cpf = '$cpf'
WHERE idcliente = $idcliente;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
    echo "<script type='text/javascript'>alert('Gravação OK!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuario2.php?idcliente=".$linha["idcliente"]."'>";
    pg_close($conecta);
}
else
{
    echo "<script type='text/javascript'>alert('Erro na gravação!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuario2.php?idcliente=".$linha["idcliente"]."'>";
    pg_close($conecta);
    echo $sql;
}
?> 
</body>
</html>
