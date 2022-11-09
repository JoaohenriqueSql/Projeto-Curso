<?php 
  require('connection.php'); 
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <!-- campo modal recuperar senha -->
  <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
      <form method="POST" action="forgotpassword.php">
        <h2>
          <span>Alterar Senha</span>
          <button type="reset" onclick="popup('forgot-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail" name="email">
        <button type="submit" class="reset-btn" name="send-reset-link">Enviar Link</button>
      </form>
    </div>
  </div>

<script src="login-register.js"></script>
</body>
</html>