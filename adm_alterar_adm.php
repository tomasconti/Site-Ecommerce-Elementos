 <!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8" />
<title>login</title>
<link rel="stylesheet" href="design_index.css" />
</head> 
<body>

<?php
include "conexao.php";
    $login;
    session_start();
    if (isset($_SESSION['user']))
    {
	   $login=$_SESSION['user'];
    }
    $sql="SELECT * FROM cliente WHERE excluido='n' AND login='$login';";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);
    $linha = pg_fetch_array($resultado);

?>
    <div class="login">
            
        <div class='formulario'>
            <center><div class='titulo'>ALTERAR</div></center><br><br>
        <form action="grava_usuario_alterado.php" method="post">
            <div id="dois2">
                <input type="text" id="usuario" name="idcliente" 
                value="<?php echo $linha['idcliente']; ?>" readonly>&nbsp;&nbsp;
                <input type="text" name="nome" id="usuario"
                value="<?php echo $linha['nome']; ?>" >
            </div>
            <br>
            <div id="dois2">
                <div>
                     <input type="text" id="usuario" value="<?php echo $linha['login']; ?>" readonly>
                </div>
                <div class='telefone'>
                        <input name='ddd' id='ddd2' value="<?php echo $linha['ddd']; ?>">&nbsp;
                        <input type='tel' name="telefone" id='tel2' value="<?php echo $linha['telefone']; ?>" >
                </div>
            </div>
            <br>
            <div id="dois2">
                <input type="text" id='usuario'  name="email" 
                 value="<?php echo $linha['email']; ?>" >
                <input type='password' placeholder="senha" id='usuario' readonly>
            </div><br>
            <div id="dois2">
                <input type="text" id='usuario'  name="cep" 
                value="<?php echo $linha['cep']; ?>" >
                <input type="text" id='usuario'  name="cpf" 
                value="<?php echo $linha['cpf']; ?>" >
            </div><br><br><br>
            
            <center><a href='usuario2.php?idcliente=".$linha["idcliente"]."'><input type='button' value='Voltar'></a>&nbsp;
            <a href='grava_usuario_alterado.php?idcliente=".$linha["idcliente"]."'>      
            <input type='submit' id='button' value='Alterar'></a></center><br><br>
                    
        </form>
        </div>
    </div>
    </body>
    </html>