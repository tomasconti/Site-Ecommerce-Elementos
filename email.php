<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>confirma senha</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<! -- Código realizado por Beatriz Franco e Tomás Conti-->

    <div class="login">
        <div class="login_in">
            <center><div class="titulo">RESTAURAR SENHA</div></center><br>
            <form method="POST" action="recuperar.php">
                <input type="email" placeholder="Email" id="login_login" name="email" class="form-control">
                &nbsp;<br>
                <center><a href="login.html"><input type="button" value="Voltar"></a>&nbsp;<input type="submit" name="button" id="button" value="Enviar"><br><br></center>
            </form>
            <?php
            include "recuperar.php";
            ?>
        </div>
    </div>
</body>
</html>