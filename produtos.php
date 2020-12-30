<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>INDEX</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
    <center><div class="mae_produtos">
        <a name="home"></a>
        <div class="topo">
            <div class="cabecalho">
                <a href="index.php"> <img class="logo" src="logo_mascara.png" width="120px"></a>
                <input type="search" name="busca" class="busca" placeholder="Buscar">
                <div class="opcao">
                    <div>
                    <a href="carrinho.php"><img src="icone_carrinho.png" width="40px" height="40px"><br><p>CARRINHO</p></a></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div><a href='usuario2.php'><img src='icone_usuario.png' width='40px' height='40px'><br><p>
                    
                    <?php
                    include "conexao.php";
                    session_start();
                            if(isset($_SESSION['user']))
                            {
                                $login=$_SESSION['user'];
                                $sql="SELECT nome from cliente WHERE excluido='n' AND login='$login'";
                                $resultado=pg_query($conecta,$sql);
                                $linhas=pg_num_rows($resultado);

                                if($linhas>0)
                                {
                                    $linha=pg_fetch_array($resultado);
                                    $first = explode(" ", $linha['nome']);
                                    $primeiro_nome = $first[0];

                                    echo $primeiro_nome;
                                }
                            }
                        else 
                            echo "Convidado";
                    ?>
                    </p></a></div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div>
                    <?php
                    include "conexao.php";
                    session_start();
                            if(isset($_SESSION['user']))
                            {
                                echo '<a href="logout.php"><img class="logout_icone" src="icone_logout.png" width="40px" height="40px"><br><p>LOGOUT</p></a>';
                            }
                    else
                    {
                        echo '<a href="login.html"><img class="login_icone" src="icone_login.png" width="40px" height="40px"><br><p">LOGIN</p></a>';
                    }
                        ?></div>
                </div>
            </div>
            <div class = "menu">
                <ul>
                    <li><a href = "index.php" ><img src="home.png" height="20px"> </a></li>
                    <li><a href = "produtos.php" ><img src="produtos.png" height="20px"></a></li>
                    <li><a href = "desenvolvimento.php" ><img src="desenvolvimento.png" height="20px"></a></li>
                    <li><a href = "cadastro.php" ><img src="cadastro.png" height="20px"></a></li>
                </ul>
            </div>
        </div>
        <div class="principal_produtos"><br>
            <center><div class="titulo">PRODUTOS</div></center><br>
            
            <div id="filtros">
            <form action="pesquisa_mascara.php" method="get">
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
                &nbsp;<br><input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>
            
            <br>
            <?php
            include "conexao.php";
            $sql="SELECT * FROM produto WHERE excluido='n' ORDER BY idproduto;";
            $resultado= pg_query($conecta, $sql);
            $quantidade=pg_affected_rows($resultado);

            if ($quantidade > 0)
            {
                echo "<div class='produtosLoja'>";
                $num=0;
                for ($cont=0; $cont < $quantidade; $cont++)
                {
                    $linha=pg_fetch_array($resultado);
                    $foto = $linha["nome_imagem"]; 
                    $valor = number_format($linha['preco'], 2, ',', '.');

                    echo '<a id="prod" href="produto_escolhido.php?linha='.$linha["idproduto"].'">
                    <br>
                    <img src="'.$foto.'" width="200" height="200"><br>
                    <p><b>Máscara '.$linha['nome'].'</b><br>
                    <b>R$'.$valor.'</b></p><br><br><br>
                    </a>';
                    
                }
                echo "</div>";
            }
            else
                echo "<p>Não foi encontrado nenhum produto!!!<br><br></p>";
            pg_close($conecta);
            ?>
        </div>
        <div class="rodape">
            <div class = "menu">
                    <ul>
                        <li><a href = "index.php" ><img src="home.png" height="20px"> </a></li>
                        <li><a href = "produtos.php" ><img src="produtos.png" height="20px"></a></li>
                        <li><a href = "desenvolvimento.php" ><img src="desenvolvimento.png" height="20px"></a></li>
                        <li><a href = "cadastro.php" ><img src="cadastro.png" height="20px"></a></li>
                    </ul>
                </div>
            <div class="integrantes">
                <br>
                <div id="nomes">
                    02 Ana Beatriz Vieira <br> 10 Felipe Franzin
                </div>
                <div id="nomes">
                    05 Anna Elisa Macari <br> 24 Lívia Fonseca
                </div>
                <div id="nomes">
                    06 Beatriz Franco <br> 33 Tomás Conti
                </div>
                <br>
                 <a href="#home">Voltar ao topo</a>
            </div>
        </div>
        </div>
    </center>
    </body>
</html>
    
    