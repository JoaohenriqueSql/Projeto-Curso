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
    <title>Tech Link</title>
    <link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="CSS/top-to-scroll.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </head>

  <body>
    <header>
      <nav>
        <a class="logo" href="/">Tech Link</a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="#">Início</a></li>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Projetos</a></li>
          <li><a href="#">Contato</a></li>
          <?php 
    
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo"
                <div class='user'>
                Olá $_SESSION[username] | <a href='logout.php' style='color: red; text-transform: uppercase;'>SAIR <ion-icon name='chevron-forward'></ion-icon> </a>
                </div>
              ";
            }
            else
            {
              echo"
              <div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\"><a href='login.php'>Entrar <ion-icon name='arrow-forward'></ion-icon> </a></button>
                <button type='button' onclick=\"popup('register-popup')\"><a href='register.php'>Registrar-se</a></button>
              </div>
              ";

            }

          ?>
        </ul>
      </nav>
    </header>

  <div id="wave">  
	<img src="img/wave.svg">
  </div>

<!--Fim-->
    <script src="JS/script.js"></script>
  </body>
</html>