<?php 

require('connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$v_code)
{
  require ("PHPMailer/PHPMailer.php");
  require ("PHPMailer/SMTP.php");
  require ("PHPMailer/Exception.php");

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();                                            //Enviar usando SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Defina o servidor SMTP para enviar através
    $mail->SMTPAuth   = true;                                   //Ativar autenticação SMTP
    $mail->Username   = 'seguranca.projeto.tcc@gmail.com';                     //Nome de usuário SMTP
    $mail->Password   = 'wxqpimmtqoitijdc';                               //Senha SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Ativar criptografia TLS implícita
    $mail->Port       = 465;                                    //Porta TCP para se conectar; use 587 se você definiu `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('seguranca.projeto.tcc@gmail.com', 'Tech Link');
    $mail->addAddress($email);

    //Conteúdo 
    $mail->isHTML(true);                                  //Definir formato de e-mail para HTML
    $mail->Subject = 'Verificacao de Email - Seguranca da Informacao';
    $mail->Body    = "Seja Bem Vindo!
    Clique no link abaixo para verificar o endereço de e-mail
    <button 
    style='background-image: linear-gradient(-45deg, #00052c, #17007c, #5300b3);
            border-radius: 30px;
            border: none;
            height: 50px;
            width: 190px;
            
            button:hover {
              transform: scale(1.1);
              transition: all 0.3s;
            }
            '
    ><a href='http://localhost/desinic/verify.php?email=$email&v_code=$v_code'
    style='
    color: #ffffff;   
    text-decoration: none;
    font-family: sans-serif;
    font-size: 20px;
    ' >Verificar</a></button>";
    //OBSERVAÇÃO o email enviado pode ser considerado como SPAN, verifique a caixa de SPAN!

    $mail->send();
    return true;
  } 
  catch (Exception $e){
      return false;
  }
}

#para login
if(isset($_POST['login']))
{
  $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
  $result=mysqli_query($con,$query);

  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['is_verified']==1)
      {      
      if(password_verify($_POST['password'],$result_fetch['password']))
      {
        $_SESSION['logged_in']=true;
        $_SESSION['username']=$result_fetch['username'];
        header("location: index.php");
      }
      else
      {
        echo"
          <script>
            alert('Senha Incorreta');
            window.location.href='index.php';
          </script>
        ";
      }
    }
    else{
      echo"
        <script>
          alert('Email não Verificado - Verifique a caixa de SPAN');
          window.location.href='index.php';
        </script>
      ";
    }
  }
  }
  else
  {
    echo"
      <script>
        alert('Não é possível executar a consulta');
        window.location.href='index.php';
      </script>
    ";
  }
}


#para Registro
if(isset($_POST['register']))
{
  $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
  $result=mysqli_query($con,$user_exist_query);

  if($result)
  {
    if(mysqli_num_rows($result)>0) #ele será executado se o nome de usuário ou e-mail já estiver em uso
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['username']==$_POST['username'])
      {
        #erro para nome de usuário já cadastrado
        echo"
          <script>
            alert('$result_fetch[username] - nome de usuário já Utilizado');
            window.location.href='index.php';
          </script>
        ";
      }
      else
      {
        #erro para e-mail já cadastrado
        echo"
          <script>
            alert('$result_fetch[email] - E-mail já Registrado');
            window.location.href='index.php';
          </script>
        "; 
      }
    }
    else #ele será executado se ninguém tiver usado nome de usuário ou e-mail antes
    {
      $password=password_hash($_POST['password'],PASSWORD_BCRYPT); #Senha CRIPTOGRAFADA
      $v_code=bin2hex(random_bytes(16));

      $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0')";

      if(mysqli_query($con,$query)&& sendMail($_POST['email'],$v_code))
      {
        #se os dados foram inseridos com sucesso
        echo"
          <script>
            alert('Registro Realizado');
            window.location.href='index.php';
          </script>
        ";
      }
      else 
      {
        #se os dados não puderem ser inseridos
        echo"
          <script>
            alert('Servidor fora do ar!');
            window.location.href='index.php';
          </script>
        ";
      }
    }
  }
  else
  {
    echo"
      <script>
        alert('Não é possível executar a consulta!');
        window.location.href='index.php';
      </script>
    ";
  }
}

?>