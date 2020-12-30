<?php
include "conexao.php"; 

$nome=$_POST["nome"];
$nome_imagem=$_POST["nome_imagem"];
$descricao=$_POST["descricao"];
$idproduto=$_POST["idproduto"];
$quantidade=$_POST["quantidade"];
$cor=$_POST["cor"];
$tamanho=$_POST["tamanho"];
$material=$_POST["material"];
$preco=$_POST["preco"];
$sql="UPDATE produto 
SET
nome = '$nome',
nome_imagem = '$nome_imagem',
descricao = '$descricao', 
quantidade= '$quantidade',
tamanho= '$tamanho',
material= '$material',
preco= '$preco',
cor = '$cor'
WHERE idproduto = $idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
    echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php'>";
}
else
{
    echo "<script type='text/javascript'>alert('Erro na gravação !!!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php'>";	
}	

pg_close($conecta);
echo "A conexÃ£o com o banco de dados foi encerrada!"
?> 
 
