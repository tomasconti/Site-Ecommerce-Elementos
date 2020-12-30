<!DOCTYPE html>
<html lang="pt-br">
        
<head>
    <meta charset="utf-8">
    <title>Esqueceu a senha?</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
        
<body>
     <div class="login">
        <div class="login_in">
         <center><div class="titulo">RESTAURAR SENHA</div></center><br>
            <form method="POST" action="novaSenha.php">
			<?php
				session_start();
				$_SESSION['id']=$_GET['id'];
                        ?>
                            <input type="password" name="senha" id="login_login" required placeholder="Nova Senha" maxlength="20" autocomplete="off">

                        <br><br><br>
                <center><a href="login.html"><input type="button" value="Voltar"></a>&nbsp;<input type="submit" name="button" id="button" value="Salvar"><br><br></center>
            </form>  
         </div>    
        
    </div>  
</body>
</html>