<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>Criar Novo</title>
    <link rel="stylesheet" href="design_index.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="login">
        <div class="formulario">
            <center><div class='titulo'>CRIAR PRODUTO</div></center>
                    <form action="adm_insereproduto.php" method="get">
                    <font size="4" face="arial"><br><br>  
                        
                    <div id="dois2">
                        <input type="text" id="usuario" name="nome" size="40" placeholder="Nome" maxlength="255" required>&nbsp;&nbsp;
                        <input type="text" name="nome_imagem" placeholder="Nome do arquivo da imagem" size="40" id="usuario" required>
                    </div>
                    <br>
                    <div id="dois2">
                        <div>
                             <input type="numer" name="preco" placeholder="Valor" size="40" id="usuario" required>
                        </div>
                        <div>
                                <input type="number" name="quantidade" id='usuario'size="40" placeholder="Quantidade" required>&nbsp;
                        </div>
                    </div>
                    <br>
                    <div id="dois2">
                        <input type="text" id="usuario"  name="cor" size="40" placeholder="Cor" maxlength="255" require >
                        <input type='text'  id='usuario' name="material" size="40" placeholder="Material" maxlength="255" required>
                    </div><br>
                    <input type="text" id="nome_descricao2" name="descricao" size="40" placeholder="Descrição" maxlength="255" required>
                     
                    
 		
                        <center><br><a href="usuario2.php"> <input type="button" value="Voltar" class="botao"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="button" id="inputSubmit" value="Cadastrar"> </center>
                        </font></form> 
                </div>

                          
                </div>
	
    </body>
</html>