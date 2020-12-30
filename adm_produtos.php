<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>      
 <! -- Código realizado por Anna Macari e interface por Ana Vieira, Tomás Conti e Felipe Franzin -->   
    <div class="adm">
        <a name="cima"></a>
        <div class="infos">
            <div class="titulo">
            <center>PRODUTOS</center>
            </div><br><br>
            <center>
            <div id="filtros">
            <form action="adm_pesquisa_mascara.php" method="get">
                <font face="arial"><b>Nome:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="nome" size="40" maxlength="100">
                <b>Descricao:</b>   
                <input type="text" id="categoria" name="descricao" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Cor:</b>  
                <input type="text" id="categoria" name="cor" size="40" maxlength="100"><br><br>
              
                <b>Material:</b>   
                <input id="categoria" type="text" name="material" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Preço Máximo:</b>  
                R$  <input id="categoria" type="number" min="0" name="preco" value="a">
                <br>
                <br>
                &nbsp;<br><a href='usuario2.php'><input type='button' value='Voltar'></a>&nbsp;<input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>
                <br><a href="#baixo"><img src="seta_baixo.png" height="40px"></a>
            </center>
            
            <br>
            <?php
            include "conexao.php";                   
                            $sql="SELECT * FROM produto ORDER BY idproduto;";
                            $resultado= pg_query($conecta, $sql);
                            $qtde=pg_num_rows($resultado);

                            echo "<div class='produtosLoja'>";
                            for($i=0; $i<$qtde; $i++)
                            {

                                $Linha=pg_fetch_array($resultado);
                                $foto = $Linha["nome_imagem"];
                                
                                echo "<div id='usu'><p align='left'><br><strong>Nome:</strong> ".$Linha['nome'];
                                echo '<br><img src="'.$foto.'" width="200" height="200"><br>';
                                echo "<br><strong>Descrição:</strong> ".$Linha['descricao'];
                                echo "<br><strong>Quantidade:</strong> ".$Linha['quantidade'];
                                echo "<br><strong>Cor:</strong> ".$Linha['cor'];
                                echo "<br><strong>Tamanho:</strong> ".$Linha['tamanho'];
                                echo "<br><strong>Material:</strong> ".$Linha['material'];
                                echo "<br><strong>Preço:</strong> ".$Linha['preco'];
                                echo "<br><strong>Excluído:</strong> ".$Linha['excluido'];
                                
                                echo "<center>";
                                if($Linha["excluido"] == "n")
                                {
                                    echo "<br><br><a href=\"adm_produtos.php?excluirproduto=1&id=".$Linha['idproduto']."\">Excluir</a>";
                                    echo "<br><a href='editar_produtos.php?idproduto=".$Linha['idproduto']."'> Editar</a><br><br>"; 
                                }
                                else
                                { 
                                    echo "<br><br><br><a href=\"adm_produtos.php?recuperarproduto=1&id=".$Linha['idproduto']."\">Recuperar</a><br><br>";
                                }
                                echo "</center></p></div>";
                            }
                            echo "</div>";

                       
                        if($_GET['excluirproduto']==1)
                        {
                            $idproduto=$_GET['id'];
                            $sql="UPDATE produto SET excluido = 's' WHERE  idproduto = $idproduto";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                            {
                                echo "<script type='text/javascript'>alert('Exclusão realizada com sucesso')</script>";
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php?idcliente=".$linha["idcliente"]."'>";
                            }
                            else
                            {
                                echo "<script type='text/javascript'>alert('Não foi possível excluir')</script>";
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php?idcliente=".$linha["idcliente"]."'>";
                            }
                                
                        }
			if($_GET['recuperarproduto']==1)
                        {
                            $idproduto=$_GET['id'];
                            $sql="UPDATE produto SET excluido = 'n' WHERE  idproduto = $idproduto";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                            {
                                echo "<script type='text/javascript'>alert('Recuperação realizada com sucesso')</script>";
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php?idcliente=".$linha["idcliente"]."'>";
                            }
                            else
                            {
                                echo "<script type='text/javascript'>alert('Não foi possível realizar recuperação')</script>";
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=adm_produtos.php?idcliente=".$linha["idcliente"]."'>";
                            }
			
                        }
	
            ?>
        
            <br><center><a href="#cima"><img src="seta_cima.png" height="40px"></a></center>
            <br><br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br></center>
            <br>
        </div>
        <a name="baixo"></a>
    </div>
    </body>
</html>
    
    