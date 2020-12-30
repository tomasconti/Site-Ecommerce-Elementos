<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>DEV</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<! -- Código e interface realizados por Tomás Conti-->

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
          <div class="principaldev">
              <div class="titulo"><br>
            <center><b> DESENVOLVIMENTO </b>
              </center>
              </div>
              <br>
                <div class="devs">
                    <img src="02ana.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b>02</b>
                    &nbsp;&nbsp;
                  <b> Ana Beatriz Pereira Vieira</b>
                </div>
              <hr><br>
              
              <div class="devs">
                    <img src="05anna.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b> 05 </b> 
                  &nbsp;&nbsp;
                  <b>Anna Elisa Peixoto Macari</b>
                </div>
                <hr><br>
              
               <div class="devs">
                    <img src="06beatriz.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b>06</b>
                    &nbsp;&nbsp;
                  <b> Beatriz Souza Franco </b>
                </div>
              <hr> <br>
              
               <div class="devs">
                    <img src="10felipe.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b>10</b>
                    &nbsp;&nbsp;
                  <b> Felipe Delgado Franzin</b>
                </div>
              
              <hr> <br>
               <div class="devs">
                    <img src="24livia.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b>24</b>
                    &nbsp;&nbsp;
                  <b> Livia Fonseca de Almeida</b>
                </div>
              <br> <hr>
              
               <div class="devs">
                    <img src="33tomas.jpg" height="150px" width="150px">
                    &nbsp;&nbsp;<b>33</b>
                    &nbsp;&nbsp;
                  <b> Tomás Ferreira Conti</b>
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
         
         </div>
    </body>
</html>