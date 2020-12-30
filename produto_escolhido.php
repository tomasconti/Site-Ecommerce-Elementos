<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>INDEX</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<! --Código realizado por Anna Macari e Ana Vieira -->
    <center><div class="mae">
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
                            echo"Convidado";
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
        <div class="principal">
            <?php
            include "conexao.php";
 		$id = $_GET["linha"];
            $sql="SELECT * FROM produto WHERE excluido='n' AND idproduto = '$id' ORDER BY idproduto;";
            $resultado= pg_query($conecta, $sql);
        $linha=pg_fetch_array($resultado);

                echo "<div class='produto_escolhido'>";
                $foto = $linha["nome_imagem"];  
                echo "<p><br>
                <div class='produto_e'><img src=" . $foto . " width='200' height='200'></div>
                <div class='produto_d'>
                    <table>
                    <tr><th align=left>Nome:</th><td>".$linha["nome"]."</th><tr>
                    <tr><th align=left valign=top>Descrição:</th><td>".$linha["descricao"]."</th><tr>
                    <tr><th align=left>Cor:</th><td>".$linha["cor"]."</th><tr>
                    <tr><th align=left>Material:</th><td>".$linha["material"]."</th><tr>
                    <tr><th align=left>Preço:</th><td>".$linha["preco"]."</th><tr>
                    <tr><th align=left>Tamanho:</th><td>".$linha["tamanho"]."</th><tr>
                    </table><br><br>
                    <center><a href='produtos.php'><input type='button' value='Voltar'></a>&nbsp&nbsp<a id='car2' href='carrinho.php?acao=add&idproduto=".$linha["idproduto"]."'><input type='button' id='carrinho2' value='Adicionar ao carrinho' /></a><center></p></div>
                </div>
                
                ";
            
                
            
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
    </div></center>
   
    </body>