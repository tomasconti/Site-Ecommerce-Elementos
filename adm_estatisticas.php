<!--
Programado por: Luana Rodrigues da Silva e Lima
Criação:05/11/2020
Última alteração: 08/11/2020
-->
<!DOCTYPE html>
<html lang="pt-br">
   
    <head>
       
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="design_index.css">
    </head>

    <body>
       <div class="adm">
        <div class="infos">
		
 <?php
    include "conexao.php";
    session_start();
    if(isset($_SESSION['user']))
    {
	
        $login=$_SESSION['user'];
        $sql="SELECT * from cliente WHERE excluido='n' AND login='$login'";
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_num_rows($resultado);

                        if($linhas>0 )
                        {
                           
                            {
                            
                            
                            
                            $soma=0;
                            $total=0;
                            $receitaQuery=pg_query("SELECT * FROM historicovendas;");
                            $receita=pg_fetch_all($receitaQuery);
                            
                            foreach($receita as $sub){
                                $soma+=$sub['subtotal'];
                                
                                
                            }
                                echo "<center><img src='estatisticas.png' height='40px'><br><strong>Receita total:</strong> R$$soma</center><br>";
                            $qcaes=0;
                            $qriverdale=0;
                            $qtouch=0;
                            $qferro=0;
                            $qfriends=0;
                            $qjardim=0;
                            $qflamingo=0;
                            $qmilitar=0;
                            $qsmile=0;
                            $qcaveira=0;
                            
                            $compraQuery=pg_query("SELECT * FROM historicovendas;");
                            $compras=pg_fetch_all($compraQuery);
                            foreach($compras as $compra){
                                $prodQuery=pg_query("SELECT * FROM historicovendas WHERE idproduto= $compra[idproduto];");
                                $prod=pg_fetch_array($prodQuery);
                                
                                if($prod['idproduto']=='19'){
                                    $qcaes+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='8'){
                                    $qriverdale+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='24'){
                                    $qtouch+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='11'){
                                    $qferro+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='3'){
                                    $qfriends+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='18'){
                                    $qjardim+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='26'){
                                    $qflamingo+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='17'){
                                    $qmilitar+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='4'){
                                    $qsmile+=$compra['quantidade'];
                                }
                                
                                if($prod['idproduto']=='13'){
                                    $qcaveira+=$compra['quantidade'];
                                }
                                $total= $qcaes + $qriverdale + $qtouch + $qferro + $qfriends + $qjardim + $qflamingo + $qmilitar + $qsmile= + $qcaveira;
                                
                            
                            }
                                
                                
                                
                            echo"<div class='produtosLoja'>";
                            echo "<div id='usu'><br><center><h3>Compras por máscaras: <br><br></h3></center>
                            <p align='left'><br>
                            <strong>Cães + Queijos:</strong> $qcaes                            
			    <strong>Riverdale: </strong> $qriverdale<br>
                            <strong>Don’t Touch Me: </strong> $qtouch<br>
                            <strong>Homem de Ferro: </strong> $qferro<br>
                            <strong>Friends: </strong> $qfriends<br>
                            <strong>Jardim no Verão: </strong> $qjardim<br>
                            <strong>Flamingo: </strong> $qflamingo<br>
                            <strong>Militar: </strong> $qmilitar<br>
                            <strong>Smile: </strong> $qsmile<br>
                            <strong>Caveira: </strong>  $qcaveira<br><br></p></div><br>
                            ";
                                
                            $qcaes=number_format(($qcaes/$total)*100,2);
                            $qriverdale=number_format(($qriverdale/$total)*100,2);
                            $qtouch=number_format(($qtouch/$total)*100,2);
                            $qferro=number_format(($qferro/$total)*100,2);
                            $qfriends=number_format(($qfriends/$total)*100,2);
                            $qjardim=number_format(($qjardim/$total)*100,2);
                            $qflamingo=number_format(($qflamingo/$total)*100,2);
                            $qmilitar=number_format(($qmilitar/$total)*100,2);
                            $qsmile=number_format(($qsmile/$total)*100,2);
                            $qcaveira=number_format(($qcaveira/$total)*100,2);   
                                echo "
                            <br><div id='usu'><br><center><h3>Porcentagem de preferência <br>dos clientes: <br></h3></center>
                            <br><p align='left'><strong>Cães + Queijos:</strong> $qcaes%
			    <strong>Riverdale: </strong> $qriverdale%<br>
                            <strong>Don’t Touch Me: </strong> $qtouch%<br>
                            <strong>Homem de Ferro: </strong> $qferro%<br>
                            <strong>Friends: </strong> $qfriends%<br>
                            <strong>Jardim no Verão: </strong> $qjardim%<br>
                            <strong>Flamingo: </strong> $qflamingo%<br>
                            <strong>Militar: </strong> $qmilitar%<br>
                            <strong>Smile:</strong> $qsmile%<br>
                            <strong>Caveira: </strong>  $qcaveira%<br><br></p></div>
                            ";
                                
                            echo"</div>";
                            
                            
                            }
                            
                            
                            echo "<br><br><center><a href='usuario2.php'><input type='button' value='Voltar'></a><br></center></div>";
                               
                              
                        }
                        
                        else
                        {
                            echo "Não rolou";
                        }
                        
    
                    }
                    
                    else
                    {
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
                    }
                ?>
    </body>
</html>