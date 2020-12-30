<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="design_index.css" />
</head>
<body>
<div class="login">
        <?php
    include "conexao.php";
    session_start();
    if(isset($_SESSION['user']))
    {
	
        $login=$_SESSION['user'];
        $sql="SELECT * from cliente WHERE excluido='n' AND login='$login'";
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_num_rows($resultado);
                                
        if($linhas>0)
        {
            $linha=pg_fetch_array($resultado);
            if($linha["classificacao"] == "administrador")
            {
                echo "<div class='formulario'>
                            <center><img src='usuario.png' height='40px'></center>
                            <form>
                                <font size='4' face='arial'><br>
                                <div id='dois2'>
                                    <input  id='usuario' value='".$linha["idcliente"]."' readonly>
                                    <input  id='usuario' value='".$linha["nome"]."' readonly>
                                </div><br>
                                <div id='dois2'>
                                    <div>
                                        <input type='text' id='usuario' value='".$linha["login"]."' readonly>
                                    </div>
                                    <div class='telefone'>
                                        <input name='ddd' id='ddd2' value='".$linha["ddd"]."' readonly>&nbsp;
                                        <input type='tel' id='tel2' value='".$linha["telefone"]."' readonly>
                                    </div>
                                </div><br>
                                <div id='dois2'>
                                    <input type='email' id='usuario' value='".$linha["email"]."' readonly>
                                    <input type='password' name='senhaForca' id='usuario' value='".$linha["senha"]."' readonly>
                                </div><br>                      
                                <div id='dois2'>
                                    <input type='text' name='cep' id='usuario' value='".$linha["cep"]."' readonly>
                                    <input type='text' id='usuario' name='cpf' value='".$linha["cpf"]."' readonly>
                                </div><br>
                                <center><a href='adm_alterar_adm.php'> Alterar</a></center>
                                <center><a href='adm_usuario.php'> Alterar usuários</a>
                                <center><a href='adm_adm.php'> Alterar administradores</a></center>
                                <center><a href='adm_criarcliente.php'> Adicionar Usuários</a></center>
                                <center><a href='adm_produtos.php'> Alterar produtos</a></center>
                                <center><a href='adm_criarprodutos.php'> Criar produtos</a></center>
                                <center><a href='adm_estatisticas.php'> Estatísticas</a></center>
                                <center><a href='adm_venda.php'> Vendas</a></center><br>
                                <center><a href='index.php'><input type='button' value='Voltar'><br></a>"; 
            }
            else
            {
                    echo "<div class='login'>
                               <div class='formulario'>
                                <center><img src='usuario.png' height='40px'></center>
                                <form>
                                    <font size='4' face='arial'><br><br>  
                                    <div id='dois2'>
                                        <input  id='usuario' value='".$linha["idcliente"]."' readonly>
                                        <input  id='usuario' value='".$linha["nome"]."' readonly>
                                    </div><br>
                                    <div id='dois2'>
                                        <div>
                                            <input type='text' id='usuario' value='".$linha["login"]."' readonly>
                                        </div>
                                        <div class='telefone'>
                                            <input name='ddd' id='ddd2' value='".$linha["ddd"]."' readonly>&nbsp;
                                            <input type='tel' id='tel2' value='".$linha["telefone"]."' readonly>
                                        </div>
                                    </div><br>
                                    <div id='dois2'>
                                        <input type='email' id='usuario' value='".$linha["email"]."' readonly>
                                        <input type='password' name='senhaForca' id='usuario' value='".$linha["senha"]."' readonly>
                                    </div><br>                      
                                    <div id='dois2'>
                                        <input type='text' name='cep' id='usuario' value='".$linha["cep"]."' readonly>
                                        <input type='text' id='usuario' name='cpf' value='".$linha["cpf"]."' readonly>
                                    </div><br><br><br>
                                    <center><a href='index.php'><input type='button' value='Voltar'></a>&nbsp;
                                    <a href='confirma_senha.html?idcliente=".$linha["idcliente"]."'>      <input type='button' id='button' value='Alterar'</a></center><br> <br>
                                    <center><a href='historico_compras.php?idcliente=".$linha["idcliente"]."'>      Histórico de compras</a><br></center></div>"; 
            }
	   }	
    }?>
</div>
    </body>
</html>
