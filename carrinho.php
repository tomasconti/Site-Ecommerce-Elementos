<?php

/*
Extraído de:
http://www.davidchc.com.br/video-aula/php/carrinho-de-compras-com-php/
vídeo aula de:https://www.youtube.com/watch?v=CBzfcl-Qk1c

Adaptado por Profa. Ariane Scarelli para banco de dados PostgreSQL (ago/2016)
BD: TesteBD1
Tabela: produto
*/
        
      session_start();

        $idproduto=_GET['idproduto'];
      if(isset($_SESSION['user']))
      {
        include "conexao.php";
        $email=$_SESSION['user'];
        $sq="SELECT * FROM cliente WHERE excluido = 'n' AND email='$email'";
        $result= pg_query($conecta, $sq);
        $x= pg_fetch_array($result);

          if(!isset($_SESSION['carrinho'])){
             $_SESSION['carrinho'] = array();
          }

          //adiciona produto

          if(isset($_GET['acao'])){

             //ADICIONAR CARRINHO
             if($_GET['acao'] == 'add'){
                $idproduto = intval($_GET['idproduto']); // Código do produto que vem da página index.php
                if(!isset($_SESSION['carrinho'][$idproduto])){
                   $_SESSION['carrinho'][$idproduto] = 1;
                }else{
                   $_SESSION['carrinho'][$idproduto] += 1;
                }
             }

             if($_GET['acao'] == 'sub'){
                $idproduto = intval($_GET['idproduto']); // Código do produto que vem da página index.php
                if(($_SESSION['carrinho'][$idproduto]) > 1){
                    $_SESSION['carrinho'][$idproduto] -= 1;
                }
            }

             //REMOVER CARRINHO
             if($_GET['acao'] == 'del'){
                $idproduto = intval($_GET['idproduto']);
                if(isset($_SESSION['carrinho'][$idproduto])){
                   unset($_SESSION['carrinho'][$idproduto]);
                }
             }

             if($_GET['acao'] == 'fim'){
                unset($_SESSION['carrinho']);
            }

             //ALTERAR QUANTIDADE
             if($_GET['acao'] == 'up'){
                if(array($_POST['prod'])){
                   foreach($_POST['prod'] as $idproduto => $quantidade){
                      $idproduto  = intval($idproduto);
                      //desprezar a parte decimal
                      $quantidade = intval($quantidade);
                      if(!empty($quantidade) && $quantidade > 0){
                         $_SESSION['carrinho'][$idproduto] = $quantidade;
                      }else{
                         unset($_SESSION['carrinho'][$idproduto]);
                      }
                   }
                }
             }

             // Modifica a url para remover qualquer uma das ações: add, del ou up, evita que a ação seja
             // processada novamente caso a página seja recarregada
             header("location:./carrinho.php");

          }
      }
      else
      {          
            echo "<script type='text/javascript'>alert('Precisa estar logado para ter acesso à essa página!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.html'>";
            pg_close($conecta);

      }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar</title>
        <link rel= "stylesheet" type= "text/css" href= "design_index.css"/>
    </head>

            <div class='login'>  
                <div class="carrinhoo">
                    <font face="arial">
                        <center><div class="titulo">CARRINHO DE COMPRAS</div></center>
                    <table id="tabela_carrinho">
                    <form action="?acao=up" method="post"> <!---------------------------------------- -->
                    <thead>
                        <tr class="informacao">
                            <th width="244">Produto</th>
                            <th width="100">Quantidade</th>
                            <th width="100">Preço</th>
                            <th width="100">SubTotal</th>
                            <th width="80">Remover</th>
                        </tr>
                        </thead>    
                        
                    <tbody>
                        <?php
                            
                            
                        if(count($_SESSION['carrinho']) == 0)
                        {
                            ?><h2><?php echo 'Não há produtos no carrinho!';?> </h2><?php
                        }
                        else
                        {
                            
                            $total = 0;
                            $_SESSION['dados'] = array();
                            foreach($_SESSION['carrinho'] as $idproduto => $quantidade)
                            { // Início do FOREACH
                                $sql = "SELECT * FROM produto WHERE idproduto=$idproduto AND excluido='n' ORDER BY nome";
                                $res = pg_query($conecta, $sql);
                                $regs = pg_num_rows($res);
                                
                                if($regs>0)
                                {
                                    $linha = pg_fetch_array($res);
                                    $nome = $linha['nome'];
                                    $preco = $linha['preco'];
                                    $sub = $preco * $quantidade;
                                    $total += $sub;
                                    
                                }
                                
                                ?>
                                        
                                        <tr><td><?php echo $nome; ?></td>
                                        <td><a href=" <?php echo '?acao=sub&idproduto='.$idproduto.''; ?> " >-</a>
                                        <input type="text" size="1" name= "<?php echo $quantidade ?>" value="<?php echo $quantidade ?>"readonly/>  
                                        <?php if($quantidade<$linha['quantidade']){?>
                                        <a href=" <?php echo '?acao=add&idproduto='.$idproduto.''; ?> " >+</a>
                                        <?php 
                                            }
                                            else{?>
                                                <a>+</a>
                                            <?php
                                            }?></td>
                                            <td>R$<?php echo $preco; ?></td>
                                            <td>R$<?php echo $sub;   ?></td>
                                        
                                            <td><a href=" <?php echo '?acao=del&idproduto='.$idproduto.''; ?> " >Remover</a></td>
                                    
                                    <?php 
                                                                    
                                    array_push(
                                    $_SESSION['dados'],
                                        array(
                                            'idproduto' => $idproduto,
                                            'email' => $email,
                                            'nome' => $nome,
                                            'quantidade' => $quantidade,
                                            'preco' => $preco,
                                            'subtotal' => $sub
                                        )
                                    );
                                    ?>
                                    
                        <?php
                                    
                                    
                                }// Término do FOREACH
                                
                               
                            $total = number_format($total, 2, ',', '.');?>
                            <h2><?php echo '<tr class="total"><td colspan="4"><strong>Total</strong></td><td> R$ '.$total.'</td></tr>'; ?></h2><?php
                        }//FECHA ELSE
                        ?>
                        </tbody><br><br>
                        </form>
                        <table> 
                            <br>
                            <center><a href="produtos.php"><input type="button" id="carrinho2" value="Continuar Comprando"></a>
                            <form method="post" action="finalizacompra.php" >
                                        <input type='hidden' name="quantidade" value="<?php echo $quantidade; ?>">
                                        <input type='hidden' name="idproduto" value="<?php echo $idproduto; ?>" >  
                                         <button id="carrinho3" type="submit" href="acao='fim'"></button>  
                                         
                                </form>   
                                <br><a href="finalizacompra.php"><input type="button" id="carrinho3" value="Finalizar Compra"></a></center>
                        </table>
                        <br><br>
                    </table>
                    </font>
                </div>
            </div>
    
</body>
</html>
        
        