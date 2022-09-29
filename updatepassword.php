<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de senha</title>
</head>
<style rel="stylesheet" type="text/css">
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: sans-serif;
  }
  form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #dbdbdb;
    box-shadow: 2px 5px 30px 5px #000000;
    width: 350px;
    color: #fff;
    border-radius: 5px;
    padding: 20px 25px 30px 25px;
  }
  form h3 {
    margin-bottom: 15px;
    color: #000000;
  }

  form input {
    width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #00d9ff;
    border-radius: 0;
    padding: 5px 0;
    font-weight: 550;
    font-size: 14px;
    outline: none;
  }
  form button {
    font-weight: 550;
    font-style: 15px;
    color: white;
    background-color: #380079;
    padding: 4px 10px;
    border-radius: 12px;
    border: none;
    outline: none;
  }
</style>
<body>
    
<?php 

  require("connection.php");

  if(isset($_GET['email']) && isset($_GET['reset_token']))
  {
    date_default_timezone_set('Asia/kolkata');
    $date=date("Y-m-d");
    $query="SELECT * from `registered_users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
    $result=mysqli_query($con,$query);
    if($result)
    {
      if(mysqli_num_rows($result)==1)
      {
        echo"
          <form method='POST'>
            <h3>Criar nova senha</h3>
            <input type='password' placeholder='Nova Senha' name='Password'>
            <button type='submit' name='updatepassword'>ATUALIZAR</button>
            <input type='hidden' name='email' value='$_GET[email]'>
          </form>
        ";
      }
      else
      {
        echo"
          <script>
            alert('Link inválido ou expirado');
            window.location.href='index.php';
          </script>
        "; 
      }
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

?>


<?php 

  if(isset($_POST['updatepassword']))
  {
    $pass=password_hash($_POST['Password'],PASSWORD_BCRYPT); #Senha CRIPTOGRAFADA
    $update="UPDATE `registered_users` SET `password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
    if(mysqli_query($con,$update))
    {
      echo"
        <script>
          alert('Senha atualizada com sucesso');
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

?>


</body>
</html>