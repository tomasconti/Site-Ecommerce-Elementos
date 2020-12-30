<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Finalizar Compra</title>
</head>
<body>
     <! -- Código realizado por Anna Macari e Beatriz Franco -->
    <?php
    include "conexao.php";
    session_start();
    foreach($_SESSION['dados'] as $produto){
        $idproduto=$produto['idproduto'];
        $email=$produto['email'];
        $nome=$produto['nome'];
        $quantidade=$produto['quantidade'];
        $preco=$produto['preco'];
        $subtotal=$produto['subtotal'];
        $sql  = "INSERT INTO historicovendas VALUES(
            DEFAULT,                                
            $idproduto, 
            '$email', 
	     NOW(),
            '$nome', 
            $quantidade, 
            $preco,
            $subtotal);";
        $resultado=pg_query($conecta, $sql);
        $sql  = "UPDATE produto SET quantidade = quantidade - $quantidade WHERE quantidade>=0 AND idproduto=$idproduto;";
        $resultado=pg_query($conecta, $sql);
	$res = pg_query($conecta, $sql);        
    }
    
        $linhas=pg_affected_rows($resultado);

        if ($linhas > 0){
            pg_close($conecta);
            echo "<script type='text/javascript'> alert('Finalização realizada com sucesso!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.php'>";
            unset($_SESSION['carrinho']);
        } 
        else{
            pg_close($conecta);
            echo "<script type='text/javascript'> alert(' Erro na finalização!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.php'>"; 
        }

    
    ?>
    
    </body>
</html>