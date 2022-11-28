<?php
  require("connection.php");

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  function sendMail($email,$reset_token)
  {
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);

    try {
        //Configurações do Servidor
        $mail->isSMTP();                                            //Enviar usando SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Definir o servidor SMTP para enviar através
        $mail->SMTPAuth   = true;                                   //Ativar autenticação SMTP
        $mail->Username   = 'seguranca.projeto.tcc@gmail.com';                 //Nome de usuário SMTP
        $mail->Password   = 'wxqpimmtqoitijdc';                               //Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Ativar criptografia TLS implícita
        $mail->Port       = 465;                                    //Porta TCP para se conectar; use 587 se você definiu `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('seguranca.projeto.tcc@gmail.com', 'Site Projeto');
        $mail->addAddress($email);     //Adicionar um destinatário
  
        //Conteúdo
        $mail->isHTML(true);                                  //Definir formato de e-mail para HTML
        $mail->Subject = 'Link de redefinição de senha de Projeto Segurança da Informação TCC';
        $mail->Body    = "Recebemos uma solicitação sua para redefinir sua senha! <br>
        Clique no link abaixo: <br>
          <a href='http://localhost/desinic/updatepassword.php?email=$email&reset_token=$reset_token'>
          Redefinir senha
          </a>";
        /*alterar o endereço http://localhost/login/updatepassword.php para
        http://localhost/nome da sua pasta ou link aqui/updatepassword.php
        para encaminhamento quando houver alterações no link ou nome de pasta!*/
        
    
        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
  }

  
  if(isset($_POST['send-reset-link']))
  {
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query="UPDATE `registered_users` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
            {
              echo"
                <script>
                  alert('Link de redefinição de senha enviado para o seu Email!');
                  window.location.href='index.php';
                </script>
              "; 
            }
            else
            {
              echo"
                <script>
                  alert('Servidor caiu! tente mais tarde');
                  window.location.href='index.php';
                </script>
              "; 
            }
        }
        else
        {
            echo"
              <script>
                alert('Email não cadastrado!');
                window.location.href='index.php';
              </script>
            ";  
        }
    }
    else
    {
        echo"
          <script>
            alert('não pode executar a consulta');
            window.location.href='index.php';
          </script>
        ";
    }
  }

?>