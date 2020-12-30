<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Insere dados no banco testeDB1 do PostgreSQL</title>
    </head>
    <body>
        <?php
            include "conexao_bd.php"; //O include anexa o script de conexão aqui!
            /*Dados enviados do formulário form_insere_prod.html*/
            $titulo=$_POST['titulo'];
            $genero=$_POST['genero'];
            $ano=$_POST['ano'];
            $pais=$_POST['pais'];
            $classificacao=$_POST['classificacao'];
            $sinopse=$_POST['sinopse'];
            $excluido='N';
            // abaixo, string sql:
            $sql="insert into serie
            values(nextval('cod_serie'),'$titulo','$genero','$ano','$pais','$sinopse','$classificacao','$excluido')";
            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            $cod_serie = $linhas[cod_serie];
            if ($linhas > 0)                
                header('location:form_serie.html');
            else
                echo "<script type='text/javascript'>alert('O título inserido já existe, tente novamente')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=form_serie.html'>";
            // Fecha a conexão com o PostgreSQL
            pg_close($conecta);
        ?> 
    </body>
</html>
