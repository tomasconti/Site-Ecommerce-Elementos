<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
        <link rel="stylesheet" href="design_index.css" />
</head>
<body>
 <! -- Código realizado por Anna Macari -->
    <div class="adm">
        <div class="infos">
            <div class="titulo">
            <center><img src="historico.png" height="40px">&nbsp;DE COMPRAS</center><br></div>
            <?php
                 include "conexao.php";
                 session_start();
                if(isset($_SESSION['user']))
                {
                    $login=$_SESSION['user'];
                    $sql="SELECT * FROM historicovendas WHERE login = '$login' ORDER BY id_historico;";
                    $resultado= pg_query($conecta, $sql);
                    $qtde=pg_num_rows($resultado);
                    
                    echo "<div class='produtosLoja'>";
                    for($i=0; $i<$qtde; $i++)
                    {
                        $Linha=pg_fetch_array($resultado);
                        echo "<div id='usu'><p align='left'><br><strong>Data:</strong> ".$Linha['datavenda'];
                        echo "<br><strong>Nome:</strong> ".$Linha['nome'];
                        echo "<br><strong>Quantidade:</strong> ".$Linha['quantidade'];
                        echo "<br><strong>Total:</strong> ".$Linha['subtotal']."</p><br></div>"; 
                    }  
                    echo "</div>";
                }
                else
                    pg_close($conecta);
             ?>  
        <br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br><br></center><br><br>
 
        </div>
    </div>
 
    </body>
</html>
    
     