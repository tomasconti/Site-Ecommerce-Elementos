<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8" />
<title>Consulta</title>
</head> 
<body>
<! -- Código feito por Anna Macari e Beatriz Franco e interface por Ana Vieira, Felipe Franzin e Tomás Conti -->
<?php
include "conexao.php";
$login = $_GET["login"];
$senha = $_GET["senha"];
$sql="SELECT * FROM cliente WHERE excluido='n' AND LOWER(login) = LOWER('$login') AND senha = md5('$senha');";
$resultado= pg_query($conecta, $sql);
$qtde=pg_num_rows($resultado);
if ($qtde > 0)
{
	for ($cont=0; $cont < $qtde; $cont++)
	{
		$linha=pg_fetch_array($resultado);
        echo "<script type='text/javascript'> alert('Você está conectado como: ".$linha["nome"]."')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";	
    }
	session_start();
	$_SESSION['user']=$login;
}
else
{    
    echo "<script type='text/javascript'>alert('O login não existe ou a senha está incorreta!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.html'>";
    pg_close($conecta);
}
?>   
 
</body>
</html>   

