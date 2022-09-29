<?php
require("Connection.php");

if(isset($_GET['email']) && isset($_GET['v_code']))
{
    $query="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
              $update="UPDATE `registered_users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
              if(mysqli_query($con,$update)){
                echo"
                  <script>
                    alert('Verificação Confirmada!');
                    window.location.href='index.php';
                  </script>
                ";
              }
              else{
                echo"
                  <script>
                    alert('Não é possivel realizar a consulta');
                    window.location.href='index.php';
                  </script>
                ";
              }
            }
            else{
                echo"
                  <script>
                    alert('Email já registrado!');
                    window.location.href='index.php';
                  </script>
                ";
            }
        }
    }
    else{
        echo"
          <script>
            alert('Não é possivel realizar a consulta');
            window.location.href='index.php';
          </script>
        ";
    }
}

?>