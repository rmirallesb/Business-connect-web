<?php
    mysql_connect('localhost','root','mysql');
    $db = "bcdb";
    mysql_select_db($db);

    $business_title = $_POST['business_title'];
    $encriptionbusspass = $_POST['business_password'];
    $business_password = sha1(md5($encriptionbusspass));

    $query = "INSERT INTO `Business` (`business_title`,`business_password`) VALUES ('".$business_title."','".$business_password."');";

    if (mysql_query($query) === TRUE) {
      echo '<meta http-equiv="Refresh" content="0;url=index.php">';
      ?>
      <script>
        alert("Empresa registrada");
      </script>
      <?php
    } else {
      echo '<meta http-equiv="Refresh" content="2;url=register_business.html">';
      ?>
      <script>
        alert("Error en el registro al registrar el negocio");
      </script>
      <?php
    }
?>
