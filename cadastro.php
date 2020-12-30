<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>cadastro</title>
    <link rel="stylesheet" href="design_index.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<! -- Código realizado por Beatriz Franco e Anna Macari e Interface feita por Felipe Franzin-->

<div class="login">
        <div class="formulario">
                <center><img src="cadastro_preto.png" width="200px"></center>
                <form action="insere_login.php" method="get">
                    <font size="4" face="arial"><br><br>  
                    <input  id="nome_usuario" name="nome" size="40" placeholder="Nome completo do Usuário*" maxlength="255" required><br><br>
                    <div id="dois">
                        <div>
                            <input type="text" id="login" name="login" placeholder="Login*" size="40" maxlength="255" required>
                     </div>
                        <div class="telefone">
                            <input maxlength="2" name="ddd" id="ddd" pattern="[0-9]{2}" placeholder="DDD" title="Digite dois números" required/>&nbsp;
                            <input type="tel" id="tel" maxlength="15" name="telefone" pattern="[0-9]{4,6}-[0-9]{3,4}" placeholder="telefone ex:xxxxx-xxxx" required/>
                        </div>
                    </div><br>
                    <input type="email" id="email" placeholder="E-mail*" name="email" size="40" required><br><br>
                    
                    <div id="dois">
                    <div>
                        <div class="senhaforca">
                            <input type="password" name="senhaForca" placeholder="Senha*" id="senhaForca" class="senha_forca" onkeyup="validarSenhaForca()">
                        </div><br>
                        <div id="erroSenhaForca"></div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        
                    <script src="forca_senha.js"></script>
                        
                    <font color="red">
                    <input type="password" name="senha2" id="inputSenha2" size="100" maxlength="255" placeholder="Confirmar senha*" required='true'/>
                    </font>
                </div><br>
                    <div id="dois">           
                        <font color="black">
                            <input type="text" name="cep" id="cep" required pattern= "\d{5}-?\d{3}" placeholder="CEP* ex:xxxxx-xxx"/>                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="CPF* ex:xxx.xxx.xxx-xx" required> 
                        </font>
                    </div><br><br><br>

                    <center><br><a href="index.php"> <input type="button" value="Voltar" class="botao"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="button" id="inputSubmit" value="Cadastrar"> </center>
                    </form> 
                    </div>

           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        
             <script src="forca_senha.js"></script>
    </div></div>
	<script>
  	$(function(){
		$("#inputSubmit").click(function(){
      		var senhaForca = $("#senhaForca").val();
     		var senha2 = $("#inputSenha2").val();
      		if(senhaForca != senha2){
        		event.preventDefault();
      			alert("Senhas diferentes!");
      }
    });
  });
</script>

    </body>
</html>