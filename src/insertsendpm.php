<?php
  session_start();

  mysql_connect('localhost','root','mysql');
  $db = "bcdb";
  mysql_select_db($db);

  $author = $_SESSION['userweb'];
  $receiver = $_POST['receiver'];
  $title = $_POST['title'];
  $message = $_POST['message'];

  $query1 = "INSERT INTO `Privatemessages` (`author`,`receiver`,`title`,`message`) VALUES ('".$author."','".$receiver."','".$title."','".$message."');";

  if (mysql_query($query1) === TRUE) {
    echo '<meta http-equiv="Refresh" content="3;url=main.php">';
  }else{
    echo "Error al enviar el mensaje";
    echo '<meta http-equiv="Refresh" content="2;url=index.php">';
  }


?>
