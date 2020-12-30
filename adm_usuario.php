<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="design_index.css" />
</head>    

<body>
 <! -- Código realizado por Beatriz Franco e interface por Felipe Franzin -->
    <div class="adm">
        <a name="cima"></a>
        <div class="infos">
            <div class="titulo">
            
            <center><img src="usuarios.png" height="40px"></center>
            </div>
            <br><br>
            <center><div id="filtros">
            <form action="adm_pesquisa_usuario.php" method="get">
                <font face="arial"><b>Nome:</b>&nbsp;&nbsp;&nbsp;    
                <input id="categoria" type="text" name="nome" size="40" maxlength="100">
                <b>Login:</b>   
                <input type="text" id="categoria" name="login" size="40" maxlength="100">&nbsp;&nbsp;&nbsp;
                <b>Email:</b>  
                <input type="text" id="categoria" name="email" size="40" maxlength="100"><br>&nbsp;&nbsp;&nbsp;
                 &nbsp;<br><a href='usuario2.php'><input type='button' value='Voltar'></a>&nbsp;<input type="submit" name="button" id="button" value="Pesquisar"><br><br></font>
            </form>
                </div>
            <br><a href="#baixo"><img src="seta_baixo.png" height="40px"></a></center>
            
            <br>

            <?php
                include "conexao.php";

                $sql="SELECT * FROM cliente WHERE classificacao='clientes' ORDER BY idcliente;";
                $resultado= pg_query($conecta, $sql);
                $qtde=pg_num_rows($resultado);
            
                echo "<div class='produtosLoja'>";
                for($i=0; $i<$qtde; $i++)
                {
                    $Linha=pg_fetch_array($resultado);
                    
                    echo "<div id='usu'><p align='left'><br><strong>Nome:</strong> ".$Linha['nome'];
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
				        echo "<br><br><a href=\"adm_usuario.php?excluircliente=1&id=".$Linha['idcliente']."\">Excluir</a>";
                        echo "<br><a href='editar_usuario.php?idcliente=".$Linha["idcliente"]."'> Editar</a><br>"; 
 				    }
                    else
				    { 
				        echo "<br><br><br><a href=\"adm_usuario.php?recuperarcliente=1&id=".$Linha['idcliente']."\">Recuperar</a><br>";
                    }
                    echo "<br><a href=\"adm_usuario.php?adicionaradmin=1&id=".$Linha['idcliente']."\">Adicionar como admin</a><br><br>"; 
                    echo "</center></p></div>";
                }
                echo "</div>";
                            
                
                if($_GET['excluircliente']==1)
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
                if($_GET['adicionaradmin']==1)
                {
                    $idcliente=$_GET['id'];
                    $sql="UPDATE cliente SET classificacao = 'administrador' WHERE  idcliente = $idcliente";
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

    ?>
            <br><center><a href="#cima"><img src="seta_cima.png" height="40px"></a></center>
            <br><br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br></center>
            <br>
            
        </div>
        <a name="baixo"></a>
    </div>
</body>


    