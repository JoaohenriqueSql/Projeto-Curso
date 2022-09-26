<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>FEEDBACK</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<!--mensagem de alerta-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--mensagem de alerta final-->

</head>

<body>

<!--header inicio-->
<div class="row header">
<div class="col-lg-6">
<span class="logo">Sistema Online de Segurança</span></div>
<div class="col-md-2">
</div>
<div class="col-md-4">
<?php
 include_once 'dbConnection.php';
session_start();
  if((!isset($_SESSION['email']))){
echo '<a href="#" class="pull-right sub1 btn title3" style="border-radius:0%" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Conecte-se</a>&nbsp;';}
else
{
echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Sair</a>&nbsp;';}
?>

<a href="index.php" style="border-radius:0%" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
</div></div>

<!--iniciar sessão modal-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Conecte-se</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Entrada de texto-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Digite seu E-mail" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Entrada de senha-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Coloque sua senha" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Conecte-se</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.conteúdo modal -->
  </div><!-- /.diálogo modal -->
</div><!-- /.modal -->
<!--entrar modal fechado-->

<!--header fim-->

<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-image:url(image/icn2.jpg); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:black">Envie seu Comentário/Sugestão</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

</div><div class="col-md-1"></div></div>

<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Nome:</b><br /><br /><br /><b>Assunto</b></div>
<div class="col-md-9">
<!-- Entrada de texto-->
<div class="form-group">
  <input id="name" name="name" placeholder="Digite seu nome" class="form-control input-md" type="text" required><br />    
  <input id="name" name="subject" placeholder="Digite o assunto" class="form-control input-md" type="text" required>    

</div>
</div>
</div><!--Fim da linha-->

<div class="row">
<div class="col-md-3"><b>Endereço de email:</b></div>
<div class="col-md-9">
<!-- Entrada de texto-->
<div class="form-group">
  <input id="email" name="email" placeholder="Digite seu e-mail" class="form-control input-md" type="email" required>    
 </div>
</div>
</div><!--Fim da linha-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Escreva comentários aqui..." required></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';}?>
</div><!--col-md-6 fim-->
<div class="col-md-3"></div></div>
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
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">Contato</h4>
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
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">CONECTE-SE</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login"  value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>-->
    </div><!-- /.conteúdo modal -->
  </div><!-- /.diálogo modal -->
</div><!-- /.modal -->
<!--footer fim-->


</body>
</html>
