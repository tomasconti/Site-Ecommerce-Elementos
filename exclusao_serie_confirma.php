<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>cadastro</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<div class="login">
        <div class="formulario">
                <center><img src="cadastro_preto.png" width="200px"></center>
                <form action="insere_login.php" method="get">
                    <font size="4" face="arial"><br><br>  
                    <input  id="nome_usuario" name="nome" size="40" placeholder="Nome completo do Usuário" maxlength="255" required><br><br>
                    <div id="dois">
                        <div>
                            <input type="text" id="login" name="login" placeholder="Login" size="40" maxlength="255" required>
                        </div>
                        <div class="telefone">
                            <input maxlength="2" name="ddd" id="ddd" pattern="[0-9]{2}" placeholder="DDD" title="Digite dois nÃºmeros" required/>&nbsp;
                            <input type="tel" id="tel" maxlength="15" name="telefone" pattern="[0-9]{4,6}-[0-9]{3,4}" placeholder="telefone ex:xxxxx-xxxx" required/>
                        </div>
                    </div><br>
                    <input type="email" id="email" placeholder="E-mail" name="email" size="40" required><br><br>

                    <table border="0" width="100%" cellpadding="10">
                        <tr>
                            <td width="50%" valign="top">
                                <div class="form-group row">
                                    <font size="4" face="arial">
                                    <b><label class="col-sm-2 col-form-label"></label></b>
                                    <div class="col-sm-10">
                                        <input type="password" name="senhaForca" class="form-control" id="senhaForca" size="100" placeholder="Senha" onkeyup="validarSenhaForca()" maxlength="255" required>
                                    </div>
                                    </font>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <div id="erroSenhaForca"></div>
                                    </div>
                                </div>
                            </td>
                            
                            <td width="50%" valign="top">
                                <font color="red"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="password" name="senha2" id="inputSenha2" size="100" maxlength="255" required='true' placeholder="Confirmar senha"/></font>
                            </td>
                        </tr>
                    </table>
    <!--<div id="ImpSenha"></div>
    <div id="ImpForcaSenha"></div> -->
                        
                    <div id="dois">           
                        <font color="black">
                                <input type="text" name="cep" id="cep" required pattern= "\d{5}-?\d{3}" placeholder="CEP ex:xxxxx-xxx"/>
                                <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="CPF ex:xxx.xxx.xxx-xx" required> 
                        </font>
                    </div><br><br><br>

                    <center><br><input type="reset" value="Voltar" class="botao">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="button" id="inputSubmit" value="Cadastrar"> </center>
                    </form> 
                    </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="personalizado.js"></script>
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
            <a href="index.php">Voltar</a> 
        </div>
    </body>
</html>