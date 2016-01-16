<?php
    session_start();

    mysql_connect('localhost','root','mysql');
    $db = "bcdb";
    mysql_select_db($db);

    $usuario = $_SESSION['userweb'];
    $text = $_POST['text'];

    $query1 = "SELECT business_title FROM Users WHERE user = '".$usuario."';";
    $resultado = mysql_query($query1);

    if (mysql_num_rows($resultado) == 1){
        $fila = mysql_fetch_array($resultado);
          $business = $fila['business_title'];

        $query2 = "INSERT INTO `Texts` (`text`,`business_title`,`user`) VALUES ('".$text."','".$business."','".$usuario."');";

        if (mysql_query($query2) === TRUE) {
          echo '<meta http-equiv="Refresh" content="0;url=main.php">';
        }else{
          echo "Error al enviar el mensaje";
          echo '<meta http-equiv="Refresh" content="2;url=main.php">';
        }
    }else{
      echo "Error en el registro al comprobar empresa";
      echo '<meta http-equiv="Refresh" content="2;url=index.php">';
    }
?>
