
    <!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>INDEX</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
 <! -- Código realizado por Anna Macari e interface por Ana Vieira -->
        
       
            <center><div class="titulo">PRODUTOS</div></center><br>
             <div id="filtros">
            <form action="adm_pesquisa_mascara.php" method="get">
                <font face="arial"><b>Nome:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="nome" size="40" maxlength="100">
                <b>Descricao:</b>   
                <input type="text" id="categoria" name="descricao" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Cor:</b>  
                <input type="text" id="categoria" name="cor" size="40" maxlength="100">
                          <b>Material:</b>   
                <input id="categoria" type="text" name="material" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Preço Máximo:</b>  
                R$  <input id="categoria" type="number" min="0" name="preco" value="a">
                <br>
                <br>
                &nbsp;<br><input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>
           
            <?php
include "conexao.php";
$nome = $_GET["nome"];
$descricao = $_GET["descricao"];

$material = $_GET["material"];
$cor = $_GET["cor"];
$preco = $_GET["preco"];
if($preco == "")
{
	$preco = 100000;
}
	$sql="SELECT * FROM produto WHERE UPPER(nome) LIKE UPPER('$nome%') INTERSECT 
	SELECT * FROM produto WHERE UPPER(descricao) LIKE UPPER('$descricao%') INTERSECT
	SELECT * FROM produto WHERE UPPER(cor) LIKE UPPER('$cor%') INTERSECT
	SELECT * FROM produto WHERE UPPER(material) LIKE UPPER('$material%') INTERSECT
	SELECT * FROM produto WHERE preco <= '$preco';";
	$resultado= pg_query($conecta, $sql);
	$qtde=pg_affected_rows($resultado);

	if ($qtde > 0)
	{
        echo "<div class='produtosLoja'>";
        $num=0;
		for ($cont=0; $cont < $qtde; $cont++)
		{
			$Linha=pg_fetch_array($resultado);
				$foto = $Linha["nome_imagem"];
                                echo "<br>Nome: ".$Linha['nome'];
 				echo '<br><img src="'.$foto.'" width="200" height="200"><br>';
                                echo "<br>Descrição: ".$Linha['descricao'];
                                echo "<br>Quantidade: ".$Linha['quantidade'];
                                echo "<br>Cor: ".$Linha['cor'];
                                echo "<br>Tamanho: ".$Linha['tamanho'];
                                echo "<br>Material: ".$Linha['material'];
                                echo "<br>Preço: ".$Linha['preco'];
				echo "<br>Excluído: ".$Linha['excluido'];

                                if($Linha["excluido"] == "n")
				{
					 echo "<br><br><a href=\"adm_produtos.php?excluirproduto=1&id=".$Linha['idproduto']."\">Excluir</a>";
						echo "<br><br><a href='editar_produtos.php?idproduto=".$Linha["idproduto"]."'> Editar</a><br><br>";				}
                                else
				{ 
					echo "<br><br><a href=\"adm_produtos.php?recuperarproduto=1&id=".$Linha['idproduto']."\">Recuperar</a>";

                    }
            if($_GET['excluirproduto']==1)
                        {
                            $idproduto=$_GET['id'];
                            $sql="UPDATE produto SET excluido = 's' WHERE  idproduto = $idproduto";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                                echo "Exclusão realizada com sucesso";
                            else
                                echo "Não foi possível realizar exclusão";
                        }
			if($_GET['recuperarproduto']==1)
                        {
                            $idproduto=$_GET['id'];
                            $sql="UPDATE produto SET excluido = 'n' WHERE  idproduto = $idproduto";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                                echo "Recuperação realizada com sucesso";
                            else
                                echo "Não foi possível realizar recuperação";
                        }

		} 
        echo "</div>";
    }
	else
	   echo "Não foi encontrado nenhum produto!!!<br><br>";
	pg_close($conecta);

?>   

        
        
    </body>
</html>
    
     