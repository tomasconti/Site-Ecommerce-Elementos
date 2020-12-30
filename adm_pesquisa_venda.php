
    <!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>INDEX</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
 <! -- Código realizado por Anna Macari -->
        
       
            <center><div class="titulo">PRODUTOS</div></center><br>
            <div id="filtros">
            <form action="adm_pesquisa_venda.php" method="get">
                <font face="arial"><b>Usuário:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="login" size="40" maxlength="100">
                                <br>
                &nbsp;<br><input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>           
            <?php
include "conexao.php";
$login = $_GET["login"];
	$sql="SELECT * FROM historicovendas WHERE UPPER(login) LIKE UPPER('$login%');";
	$resultado= pg_query($conecta, $sql);
	$qtde=pg_affected_rows($resultado);

	if ($qtde > 0)
	{
        echo "<div class='produtosLoja'>";
        $num=0;
		for ($cont=0; $cont < $qtde; $cont++)
		{
		
				 $Linha=pg_fetch_array($resultado);
                                echo "<br>Data: ".$Linha['datavenda'];
				                echo "<br>Login: ".$Linha['login'];
                                echo "<br>Nome: ".$Linha['nome'];
                                echo "<br>Quantidade: ".$Linha['quantidade'];
                                echo "<br>Total: ".$Linha['subtotal']; 
				echo "<br>";
                               
                    }
                    echo "</div>";
    }
	else
	   echo "Não foi encontrado nenhum produto!!!<br><br>";
	pg_close($conecta);

?>   

        
        
    </body>
</html>
    
      