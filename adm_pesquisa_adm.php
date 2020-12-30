 <!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
        <link rel="stylesheet" href="design_index.css" />
</head>
<body>

    <div class="adm">
        <div class="infos">
            <center><div class="titulo">ADMINISTRADORES</div></center><br>
             <center><div id="filtros">
            <form action="adm_pesquisa_adm.php" method="get">
                <font face="arial">
                <b>Nome:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="nome" size="40" maxlength="100">
                <b>Login:</b>   
                <input type="text" id="categoria" name="login" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Email:</b>  
                <input type="text" id="categoria" name="email" size="40" maxlength="100"><br>&nbsp;&nbsp;&nbsp;
                 &nbsp;<br><input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
            </div>
            </center>
            <br>
           
<?php
    include "conexao.php";
    $nome = $_GET["nome"];
    $login = $_GET["login"];
    $email = $_GET["email"];
    $sql="SELECT * FROM cliente WHERE classificacao= 'administrador' AND UPPER(nome) LIKE UPPER('$nome%') INTERSECT 
         SELECT * FROM cliente WHERE classificacao= 'administrador' AND UPPER(login) LIKE UPPER('$login%') INTERSECT
         SELECT * FROM cliente WHERE classificacao= 'administrador' AND UPPER(email) LIKE UPPER('$email%');";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_affected_rows($resultado);

        if ($qtde > 0)
        {
            echo "<div class='produtosLoja'>";
            for ($cont=0; $cont < $qtde; $cont++)
            {
                $Linha=pg_fetch_array($resultado);
                    echo "<div id='usu'><p  align='left'><br><strong>Nome:</strong> ".$Linha['nome'];
                    echo "<br><strong>Login: </strong>".$Linha['login'];
                    echo "<br><strong>Email:</strong> ".$Linha['email'];
                    echo "<br><strong>Telefone:</strong> ".$Linha['telefone'];
                    echo "<br><strong>DDD:</strong> ".$Linha['ddd'];
                    echo "<br><strong>CEP:</strong> ".$Linha['cep'];
                    echo "<br><strong>CPF:</strong> ".$Linha['cpf'];
                    echo "<br><strong>Classificação:</strong> ".$Linha['classificacao'];
                    echo "<center>";

                    
                    if($Linha["excluido"] == "n")
                    {
                        echo "<br><br><a href=\"adm_adm.php?excluiradmin=1&id=".$Linha['idcliente']."\">Excluir</a>";
                        echo "<br><a href='editar_adm.php?idcliente=".$Linha["idcliente"]."'> Editar</a><br>"; 
                    }
                    else
                    { 
                        echo "<br><br><br>Admin Excluído<br>";
                    }
                    echo "<br><a href=\"adm_adm.php?removeradmin=1&id=".$Linha['idcliente']."\">Adicionar como cliente</a><br><br>"; 
                    echo "</center></p></div>";

            }
            echo "</div>";  
                if($_GET['excluiradmin']==1)
                        {
                            $idcliente=$_GET['id'];
                            $sql="UPDATE cliente SET excluido = 's' WHERE  idcliente = $idcliente";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                                echo "Exclusão realizada com sucesso";
                            else
                                echo "Não foi possível realizar exclusão";
                        }
                        if($_GET['removeradmin']==1)
                        {
                            $idcliente=$_GET['id'];
                            $sql="UPDATE cliente SET classificacao = 'clientes' WHERE  idcliente = $idcliente";
                            $resultado=pg_query($conecta,$sql);
                            $linhas=pg_affected_rows($resultado);
                            if($linhas>0)
                                echo "Alteração realizada com sucesso";
                            else
                                echo "Não foi possível realizar alteração";
                        }
			if($_GET['recuperarcliente']==1)
                            {
                                $idcliente=$_GET['id'];
                                $sql="UPDATE cliente SET excluido = 'n' WHERE  idcliente = $idcliente";
                                $resultado=pg_query($conecta,$sql);
                                $linhas=pg_affected_rows($resultado);
                                if($linhas>0)
                                    echo "Recuperação realizada com sucesso";
                                else
                                    echo "Não foi possível realizar recuperação";
                            }

                                echo "</div>";
            } 
        
            
        
        else
           echo "Não foi encontrado nenhum administrador!!!<br><br>";
        echo "<br><br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br></center>
            <br>";
        pg_close($conecta);

?>   
            
        
        </div>
    </div>
       
        
    </body>
</html>
    
      
