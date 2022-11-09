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

<!-- campo modal registrar-se -->
  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>Criar Conta</span>
          <button type="reset" onclick="popup('register-popup')" href="index.php"><ion-icon id="fechar" name="close"></ion-icon></button>
        </h2>
        <input type="text" placeholder="Nome completo" name="fullname" required>
        <input type="text" placeholder="Nome de usuário" name="username" required>
        <input type="email" placeholder="E-mail" name="email" required>
        <input type="password" placeholder="Senha" name="password" required>
        <button type="submit" class="register-btn" name="register">Criar</button>
      </form>
    </div>
  </div>

<script src="login-register.js"></script>
</body>
</html>