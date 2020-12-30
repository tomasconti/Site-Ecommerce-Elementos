<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Insere dados no banco testeDB1 do PostgreSQL</title>
        <link rel="stylesheet" href="design_principal.css" />
        <link rel="stylesheet" href="design_login.css" />
    </head>
    <body>
<! -- Código realizado por Beatriz Franco e Anna Macari -->

        <div class="logo">
            <img src="soganaflix.png" width="250px">
        </div>
        <div class="molde">
            <div class="elementos">
                <?php
                include "conexao_bd.php"; //O include anexa o script de conexão aqui!
                /*Dados enviados do formulário form_insere_prod.html*/
                $usuario=$_POST['usuario'];
                $nome=$_POST['nome'];
                $senha=$_POST['senha'];
                $excluido='N';
                // abaixo, string sql:
                $sql="insert into cadastro
                values('$usuario','$nome','$senha','$excluido')";
                $resultado=pg_query($conecta,$sql);
                $linhas=pg_affected_rows($resultado);
                if ($linhas > 0)
                {
                    echo "Produto gravado<br><br>
                    <a href='form_cadastro_usuario.html'>Cadastrar outro usuário<a><br><br>
                    <a href='form_login.html'>Login<a><br><br>";

                }                
                else
                {
                    echo "Erro na gravação<br><br>
                    <a href='form_cadastro_usuario.html'>Tentar novamente<a><br><br>
                    <a href='form_login.html'>Login<a><br><br>";

                }        
                // Fecha a conexão com o PostgreSQL
                pg_close($conecta);
                ?>
            </div>
    </div>
    </body>
</html>
