<?php 
  require('connection.php'); 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login-register.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>

<div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>Login de Usuário</span>
          <button type="reset" onclick="popup('login-popup')"><ion-icon id="fechar" name="close"></ion-icon></button>
        </h2>
        <input type="text" placeholder="email ou nome" name="email_username" required>
        <input type="password" placeholder="senha" name="password" required>
        <button type="submit" class="login-btn" name="login">Entrar</button>
      </form>
      <div class="forgot-btn">
        <button type="button" onclick="forgotPopup()"><a href="recupera-password.php">Esqueceu a senha ?</a></button>
      </div>
    </div>
  </div>

  <div class="welcome">
    <h1>Que bom ter você de volta!</h1>
  </div>

  <div class="container-login">
      <img id="icone" src="img/imagem-login.svg">
  </div>
 

<script src="login-register.js"></script>
</body>
</html>