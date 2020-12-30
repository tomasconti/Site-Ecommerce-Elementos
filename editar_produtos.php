 <!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Grava produtos </title>
    <link rel="stylesheet" href="design_index.css" />
</head> 
<body> 

 <?php
include "conexao.php"; 
$idproduto=$_GET["idproduto"];
$sql="SELECT * FROM produto WHERE idproduto=$idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 )
{
echo "Produto não foi encontrado  !!!<br><br>";
exit;
}
$linha = pg_fetch_array($resultado);
?>

    <div class="login">
        <div class="usuario_infos">
            <div class="formulario">
                <center><div class='titulo'>ALTERA PRODUTOS</div></center><br><br>
                <form action="grava_produto_editado.php" method="post">
                    <div id="dois2">
                <input type="text" id="usuario" name="idproduto" 
                value="<?php echo $linha[idproduto]; ?>" readonly>&nbsp;&nbsp;
                <input type="text" name="nome" id="usuario"
                value="<?php echo $linha[nome]; ?>" >
            </div>
            <br>
            <div id="dois2">
                <div>
                     <input type="text" name="nome_imagem" id="usuario" value="<?php echo $linha[nome_imagem]; ?>">
                </div>
                <div>
                        <input type="text" name='quantidade' id='usuario' value="<?php echo $linha[quantidade]; ?>">&nbsp;
                </div>
            </div>
            <br>
            <div id="dois2">
                <input type="text" id='usuario'  name="cor" 
                 value="<?php echo $linha[cor]; ?>" >
                <input type='text'  id='usuario' name="material" value="<?php echo $linha[material]; ?>">
            </div><br>
            <div id="dois2">
                <input type="text" id='usuario'  name="tamanho" 
                value="<?php echo $linha[tamanho]; ?>" >
                <input type="text" name="preco" id='usuario' value="<?php echo $linha[preco]; ?>" >
                
            </div>
                    <br>
                <input type="text" id='nome_descricao'  name="descricao" 
                value="<?php echo $linha[descricao]; ?>" ><br><br><br>
            
            <center><a href='adm_produtos.php'><input type='button' value='Voltar'></a>&nbsp; 
            <input type='submit' id='button' value='Gravar'></center><br><br>
                </form>
            </div>
        </div>
    </div>
  </body>
    </html> 