<!DOCTYPE html>
<html lang="pt-br"> 
<head> 
<meta charset="utf-8" />
<title>Conexão com o Banco de Dados</title>
</head>
<body>
<! -- Código realizado por Anna Macari -->

<?php
$conecta = pg_connect("host=localhost port=5432 dbname=b05annamacari user=b05annamacari password=bebebatata");
if (!$conecta)
{
echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
exit;
}
?>    
</body>
</html> 