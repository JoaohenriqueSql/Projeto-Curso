<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema Online de Segurança</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("O nome deve ser preenchido.");return false;}var z =document.forms["form"]["college"].value;if (z == null || z == "") {alert("Faixa etária deve ser preenchida.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Não é um endereço de e-mail válido.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("A senha deve ser preenchida");return false;}if(a.length<6 || a.length>25){alert("As senhas devem ter de 6 a 25 caracteres.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("As senhas devem corresponder.");return false;}}
</script>


</head>

<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Questionário de Segurança digital</span></div>
<div class="col-md-2 col-md-offset-4">
<a href="#" class="pull-right btn sub1" style="border-radius:0%" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Conecte-se</b></span></a></div>
<!--iniciar sessão modal-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1 text-center"><span style="color:black"><b>LOGIN DE USUÁRIO</b></span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Email" class="form-control input-md" type="email" required>
    
  </div>
</div>


<!-- Entrada de senha-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Senha" class="form-control input-md" type="password" required>
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Entrar</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.conteúdo modal -->
  </div><!-- /.diálogo modal -->
</div><!-- /.modal -->
<!--entrar modal fechado-->

</div><!--header linha fechada-->
</div>

<div class="bg1">
<div class="row">

<div class="col-md-7"></div>
<div class="col-md-4 panel">
<!-- formulário de login começa -->  
  <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
<fieldset>

<p class="text-center"><b>Registrar agora</b></p>

<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Nome completo" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Gênero" class="form-control input-md" >
   <option>Selecionar sexo</option>
  <option value="Homem">Homem</option>
  <option value="Mulher">Mulher</option> 
  <option value="X">Prefiro não dizer</option></select>
  </div>
</div>

<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="college" placeholder="Faixa Etária" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="insira um Email" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Numero para Contato" class="form-control input-md" type="number">
    
  </div>
</div>


<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Senha" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" placeholder="Confirmar Senha" class="form-control input-md" type="password">
    
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub btn btn-danger" value="Criar"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 fim-->
</div></div>
</div><!--container fim-->

<!--Footer inicio-->
<div class="row footer">

<div class="col-md-4 box">
<a href="#" data-toggle="modal" data-target="#login">Login de administrador</a></div>
<div class="col-md-4 box">
<a href="#" data-toggle="modal" data-target="#developers">Desenvolvedores</a>
</div>
<div class="col-md-4 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>
<!-- Modal para desenvolvedores-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Desenvolvedores</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="image/CAM00121.jpg" width=100 height=100 alt="Sunny Prakash Tiwari" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a style="color:#202020; font-family:'typo' ; font-size:18px; text-decoration:none" title="Find on Facebook">Seu nome Aqui</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Seu contato</h4>
		<h4 style="font-family:'typo' ">Email</h4>
		<h4 style="font-family:'typo' ">Sua Atuação</h4></div></div>
		</p>
      </div>
    
    </div><!-- /.conteúdo modal -->
  </div><!-- /.diálogo modal -->
</div><!-- /.modal -->

<!--Modal para login de administrador-->
	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title"><span style="color:black;font-family:'typo' "><center>LOGIN ADMINISTRADOR</center></span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="E-mail do administrador" class="form-control" required/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Senha" class="form-control" required/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Entrar" class="btn btn-primary" style="border-radius:0%" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.conteúdo modal -->
  </div><!-- /.diálogo modal -->
</div><!-- /.modal -->
<!--footer fim-->


</body>
</html>
