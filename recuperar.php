<!DOCTYPE html>
<html lang="pt-br"> 
    <head>
       
        <meta charset="UTF-8">
        
    </head>

    <body>
  <?php
	include "conexao.php";
    /*
	$email=$_POST['email'];
	$sql="SELECT * from cliente WHERE excluido='n' AND email='$email';";
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_num_rows($resultado);
        if($linhas>0)
	{
		include "PHPMailer-master/PHPMailerAutoload.php";
		date_default_timezone_set('Etc/UTC');
		$mail = new PHPMailer(); 
                // Método de envio 
                $mail->IsSMTP(); 
                // Enviar por SMTP 
                $mail->Host = "smtp.gmail.com"; 
		// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
                $mail->Port = 465; 
                $mail->SMTPSecure = 'ssl';
                 $mail->SMTPAuth = true; 
		$mail->Username = 'mascaras.elementos@gmail.com';
                $mail->Password = 'elementos123';
		$mail->From = "mascaras.elementos@gmail.com";
		$mail->FromName = "Elementos";
		$mail->AddAddress($email);
		$mail->CharSet = 'UTF-8'; 
 // Assunto da mensagem 
                $mail->Subject = "Redefinir senha"; 
// Corpo do email 
                $mail->msgHTML("<html>de: Elementos<br/>email: mascaras.elementos@gmail.com<br/>mensagem: Link para redefinir a senha:  </html>");
		      $mail->AltBody = "Link para redefinição de senha: ";
            $enviar = $mail->Send();
	    echo $enviar; 

                                // Exibe uma mensagem de resultado 
                if($enviar)
                {
                	echo "<script type='text/javascript'> alert('E-mail foi enviado com sucesso, se não encontrá-lo cheque o seu spam')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.html'>";
                }
		else
                {
                        echo "<script type='text/javascript'> alert('Não foi possível enviar o e-mail, tente novamente mais tarde: $mail->ErrorInfo')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esqueceu_senha.html'>";
                } 
	}
	else
	{
        	echo"<script type='text/javascript'> alert('Esse e-mail não está cadastrado')</script>";
        	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esqueceu_senha.html'>";
	}
?> */
        $email=$_POST['email'];
        $sql="SELECT * FROM cliente WHERE excluido='n' AND email='$email'";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        
        require_once('src/PHPMailer.php');
        require_once('src/SMTP.php');
        require_once('src/Exception.php');

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        session_start();
        $code= $_SESSION['idcliente'];
        

        
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
            $mail->Subject = 'Elementos: Recuperar Senha';
            $mail->Body = "Deseja redefinir a senha?<br>Clique<a href='http://200.145.153.175/anavieira/elementos/confirmaSenha.php?id=$code'> aqui</a>";
            if($mail->send()) {
               echo "<script type='text/javascript'> alert('E-mail foi enviado com sucesso, se não encontrá-lo cheque o seu spam')</script>";
                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.html'>";
            } else {
                 echo "<script type='text/javascript'> alert('Não foi possível enviar o e-mail, tente novamente mais tarde: $mail->ErrorInfo')</script>";
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esqueceu_senha.html'>";
            }
        } catch (Exception $e) {
            echo "<script type='text/javascript'> alert('Não foi possível enviar o e-mail, tente novamente mais tarde: $mail->ErrorInfo')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esqueceu_senha.html'>";
        }
        }
       
    pg_close($conecta);
        ?>
        
</body>
    
</html>