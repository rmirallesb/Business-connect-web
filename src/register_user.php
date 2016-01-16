<?php
    mysql_connect('localhost','root','mysql');
    $db = "bcdb";
    mysql_select_db($db);

    $user = $_POST['user'];
    $encryptionpass = $_POST['password'];
    $password = sha1(md5($encryptionpass));
    $email = $_POST['email'];
    $business_title = $_POST['business_title'];
    $encriptionbusspass = $_POST['business_password'];
    $business_password = sha1(md5($encriptionbusspass));

    $query1 = "SELECT id FROM business WHERE business_title = '".$business_title."' AND business_password = '".$business_password."';";
    $resultado = mysql_query($query1);

    if (mysql_num_rows($resultado) == 1){

        $query2 = "INSERT INTO `Users` (`user`,`password`,`email`,`business_title`) VALUES ('".$user."','".$password."','".$email."','".$business_title."');";

        if (mysql_query($query2) === TRUE) {
          echo '<meta http-equiv="Refresh" content="0;url=index.php">';
          ?>
          <script>
            alert("Registro completado");
          </script>
          <?php
        }else{
          echo '<meta http-equiv="Refresh" content="2;url=register_user.html">';
          ?>
          <script>
            alert("Error en el registro al registrarse");
          </script>
          <?php
        }
    }else{
      echo "Error en el registro al comprobar empresa";
      echo '<meta http-equiv="Refresh" content="2;url=index.php">';
    }
?>
