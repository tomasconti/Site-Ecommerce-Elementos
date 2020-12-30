<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
        <link rel="stylesheet" href="design_index.css" />
</head>
<body>
 <! -- Código realizado por Anna Macari -->
    <div class="adm">
        <a name="cima"></a>
        <div class="infos">
            <div class="titulo">
            <center>VENDAS</center></div><br><br>
            <center>
            <div id="filtros">
            <form action="adm_pesquisa_venda.php" method="get">
                <font face="arial"><b>Usuário:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="login" size="40" maxlength="100">
                               <br>
                &nbsp;<br><a href='usuario2.php'><input type='button' value='Voltar'></a>&nbsp;<input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>
                 <br><a href="#baixo"><img src="seta_baixo.png" height="40px"></a>
            </center>
            <br>
            <?php
                    include "conexao.php";
                    session_start();
                            if(isset($_SESSION['user']))
                            {
				                $login=$_SESSION['user'];
        			             $sql="SELECT * FROM historicovendas ORDER BY id_historico;";
				
                                $resultado= pg_query($conecta, $sql);
                                $qtde=pg_num_rows($resultado);
                                echo "<div class='produtosLoja'>";
                                for($i=0; $i<$qtde; $i++)
                                {

                                    $Linha=pg_fetch_array($resultado);
                                    echo "<div id='usu'><p align='left'><br><strong>Data:</strong> ".$Linha['datavenda'];
                                    echo "<br><strong>Login:</strong> ".$Linha['login'];
                                    echo "<br><strong>Nome:</strong> ".$Linha['nome'];
                                    echo "<br><strong>Quantidade:</strong> ".$Linha['quantidade'];
                                    echo "<br><strong>Total: </strong>".$Linha['subtotal'];
                                    echo "<br><br></p></div>";
                               }   
                               echo "</div>";

				        }
                		else
                            pg_close($conecta);

		                        ?>  
		 <br><center><a href="#cima"><img src="seta_cima.png" height="40px"></a></center>
            <br><br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br></center><br>
        </div>    
    </div>
    </body>
</html>
    
     
