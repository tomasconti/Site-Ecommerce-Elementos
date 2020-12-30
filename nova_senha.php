<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>confirma senha</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<! -- Código Beatriz Franco e Ana Vieira -->
    <div class="login">
        <div class="login_in">
            <center><div class="titulo">RESTAURAR SENHA</div></center><br>
            <form method="POST" action="salva_senha.php">
                <div class="label-float">
                    <input type="hidden" name="id" id="login_login" value=<?php echo base64_decode($_GET['id']);  ?>> <br>
                    <input type="password" name="senha" id="login_login" required placeholder="" maxlength="20" autocomplete="off">
                </div>

                <br>
                <center><a href="login.html"><input type="button" value="Voltar"></a>&nbsp;<input type="submit" name="button" id="button" value="Salvar"><br><br></center>
            </form>  
        </div>
    </div>
</body>
</html>


