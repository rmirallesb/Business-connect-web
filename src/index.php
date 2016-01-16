<?php
session_start();
if(isset($_SESSION['userweb']))
{
@header('Location: main.php');
}
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Business Connect - Login</title>
    <link rel="icon" type="image/png" href="../img/favicon.png"/>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body><br/><br/>
  <div class="login-box">
    <h2>
        <img src="../img/logo.png" align="middle"></img><br/><br/>
        Login
    </h2>
    <form id="form" action="login.php" method="POST">
      <input type="text" name="user" required autocomplete="off" autofocus="autofocus" required placeholder="Usuario">
      <input type="password" name="password" placeholder="Contraseña">
      <input type="submit" name="login" class="login login-submit" value="Entrar">
    </form>

    <div class="login-register">
      <a href="register_user.html">Registro de Usuario</a> · <a href="register_business.html">Registro de Negocio</a>
    </div>
  </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  </body>
</html>
