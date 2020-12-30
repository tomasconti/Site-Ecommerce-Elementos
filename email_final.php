<!DOCTYPE html>
<html lang="pt-br"> 
    <head>
       
        <meta charset="UTF-8">
        
    </head>

    <body>
  <?php
	include "conexao.php";
    session_start();
        foreach($_SESSION['dados'] as $produto){
        $idproduto=$produto['idproduto'];
        $email=$produto['email'];
        $nome=$produto['nome'];
        $quantidade=$produto['quantidade'];
        $preco=$produto['preco'];
        $subtotal=$produto['subtotal'];  
            
        $sql="SELECT * FROM cliente WHERE excluido='n' AND email='$email'";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        
        require_once('src/PHPMailer.php');
        require_once('src/SMTP.php');
        require_once('src/Exception.php');

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        $id= $_SESSION['idcliente'];
        $code=base64_encode($id);

        
        if($qtde>0)
        {
            $mail = new PHPMailer(true);
            try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mascaras.elementos@gmail.com';
            $mail->Password = 'elementos123';
            $mail->Port = 587;

            $mail->setFrom('mascaras.elementos@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Elementos: Compra Realizada';
            $mail->Body = "Sua compra foi realizada com sucesso!<br><br>
            Nome:".$nome."
            Quantidade:".$quantidade."
            Preço:".$preco."
            Total:".$subtotal."
            Clique<a href='http://200.145.153.175/anavieira/elementos/historico_compras.php?id=$code'> aqui</a> para ver seu histórico de compras<br><br>
            Agradecemos à preferência!";
            if($mail->send()) {
               echo "<script type='text/javascript'> alert('Compra realizada com sucesso. Enviamos os dados da mesma por email!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.html'>";
                unset($_SESSION['carrinho']);
            } else {
                 echo "<script type='text/javascript'> alert('Não foi possível finalizar sua compra, tente novamente: $mail->ErrorInfo')</script>";
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.php'>";
            }
        } catch (Exception $e) {
            echo "<script type='text/javascript'> alert('Não foi possível finalizar sua compra, tente novamente: $mail->ErrorInfo')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinho.php'>";
        }
        }
       
    pg_close($conecta);
        ?>
        
</body>
    
</html>