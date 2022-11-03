<?php

  $con=mysqli_connect("localhost","root","","seguranca_dados");

  if(mysqli_connect_error()){
    echo"<script>alert('Não é possível conectar ao banco de dados');</script>";
    exit();
  }

?>