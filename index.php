<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>INDEX</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<! -- Código e interface realizados por todos os integrantes -->

    <center><div class="mae">
          <a name="home"></a>
        <div class="topo">
            <div class="cabecalho">
                <a href="index.php"> <img class="logo" src="logo_mascara.png" width="120px"></a>
                <form action="pesquisa_mascara.php">
                <input type="search" name="busca" class="busca" placeholder="Buscar">
		      </form>

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
                        {
                            echo "Convidado";
                        }
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
            <div class="titulo"><br>
            <center>HOME
              </center>
              </div>
            <br><br>
            <div class="img_principal">
                <img src="mascara_princ.png" width="900"><br>
                <div class="txt">
                    Em tempos de pandemia, o uso de máscaras é indispensável. Por isso, temos diversos  modelos, tamanhos e estilos para você!
                </div>
            </div><br>
            <div class="img_sec">
               <div id="img">
                   <img src="mascara1.png" height="220px">
                   <br><br>
                    máscara cirúrgica
                   </div>   
                <div id="img">
                   <img src="mascara2.png" height="220px">
                   <br><br>
                    máscaras básicas
               </div> 
                <div id="img">
                   <img src="mascara3.png" height="220px">
                   <br><br>
                    máscara unicórnio
               </div> 
            </div><br>
            <div class="video">
                <iframe width="500px" height="270px" src="https://www.youtube.com/embed/12ksyCj-L3s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="txt_video">
                    O vídeo apresentará os diferentes tipos de <br>máscaras e suas respectivas efetividade
                    na <br>prevenção ao covid-19
                </div>
            </div>
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