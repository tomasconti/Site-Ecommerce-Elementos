 <!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Grava administradores </title>
    <link rel="stylesheet" href="design_index.css" />
</head> 
<body>
 <a href="adm_usuario.php">Voltar</a> 

 <?php
include "conexao.php"; 
$idcliente=$_GET["idcliente"];
$sql="SELECT * FROM cliente WHERE idcliente=$idcliente;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 )
{
echo "Administrador não foi encontrado  !!!<br><br>";
exit;
}
$linha = pg_fetch_array($resultado);
?>
<div class="login">
        <div class="usuario_infos">
            <div class="formulario">
                <center><div class='titulo'>EDITAR CLIENTE</div></center><br><br>
                <form action="grava_adm_editado.php" method="post">
                    <div id="dois2">
                <input type="text" id="usuario" name="idcliente" 
                value="<?php echo $linha[idcliente]; ?>" readonly>&nbsp;&nbsp;
                <input type="text" name="nome" id="usuario"
                value="<?php echo $linha[nome]; ?>" >
            </div>
            <br>
            <div id="dois2">
                <div>
                     <input type="text" name="login" id="usuario" value="<?php echo $linha[login]; ?>" readonly>
                </div>
                <div class='telefone'>
                        <input name='ddd' id='ddd2' value="<?php echo $linha[ddd]; ?>">&nbsp;
                        <input type='tel' name="telefone" id='tel2' value="<?php echo $linha[telefone]; ?>" >
                </div>
            </div>
            <br>
            <div id="dois2">
                <input type="text" id='usuario'  name="email" 
                 value="<?php echo $linha[email]; ?>" >
                <input type='password' placeholder="senha" id='usuario' readonly>
            </div><br>
            <div id="dois2">
                <input type="text" id='usuario'  name="cep" 
                value="<?php echo $linha[cep]; ?>" >
                <input type="text" id='usuario'  name="cpf" 
                value="<?php echo $linha[cpf]; ?>" >
            </div><br><br><br>
            
            <center><a href='adm_adm.php'><input type='button' value='Voltar'></a>&nbsp; 
            <input type='submit' id='button' value='Gravar'></center><br><br>
                    
                    
                
                    
                </form>
            </div>
        </div>
    </div>

  </body>
    </html> 
  