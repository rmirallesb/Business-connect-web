<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/favicon.png"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/w3.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Business Connect - Mensajes privados</title>
  </head>

  <body>

    <?php

    session_start();
    $usuario = $_SESSION['userweb'];

    if(isset($_SESSION['userweb']))
    {

      $servername = "localhost";
      $username = "root";
      $password = "mysql";
      $dbname = "bcdb";

      $conn = new mysqli($servername, $username, $password, $dbname);
      mysql_connect($servername,$username,$password);
      mysql_select_db(bcdb);

      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
      }

      $querymp = "SELECT PM.title, PM.message, PM.author, PM.datetime FROM Privatemessages PM WHERE PM.receiver = '".$usuario."';";
      $result1 = $conn->query($querymp);

      $query3 = "SELECT COUNT(message) FROM Privatemessages WHERE receiver = '".$usuario."';";
      $result3 = mysql_query($query3);

      $messagenum = mysql_fetch_array($result3);
      $messagesprint = 0;

      if ($messagenum[0] == 0){
        $messagesprint = "";
      }else{
        $messagesprint = $messagenum[0];
      }

    ?>

    <header>

        <a href="main.php"><img id="img-logo" src="../img/logo.png"></a>

        <p1>business connect</p1>

        <form action="inserttext.php" id="leftmenu">
            <input type="submit" class="button-header" value=" Publicar "/>
        </form>

        <form action="mainmp.php" id="leftmenu">
            <input type="submit" class="button-header" value="<?php echo "$messagesprint Mensajes "?>"/>
        </form>

        <form action="logout.php" id="rightmenu">
            <input type="submit" class="button-header" value=" Cerrar sesión "/>
        </form>

        <p2 id="rightmenu">Usuario: <?php echo "$usuario" ?></p2>

    </header>
    <body>

        <div id="all" class="w3-container">

          <?php

            echo '<div id="divbtitle1"><p3>Mensajes privados</p3></div>';

            ?>

            <div class="sendmessage" class="w3-row-padding">
              <form action="insertsendpm.php" method="POST">
                <input type="text" name="receiver" maxlength="20" required placeholder="Usuario destino" class="receivermsg">
                <input type="text" name="title" maxlength="20" required placeholder="Titulo" class="titlemsg"><br>
                <textarea type="text" name="message" maxlength="140" required placeholder="Mensaje" class="textmsgmp"></textarea>
                <input type="submit" name="Post" class="login login-submit" value="Enviar" id="btn-msg">
              </form>
            </div>

            <?php

            while($row = $result1->fetch_assoc()) {?>

          <div id="messagebox" class="w3-row-padding">

          <?php

          echo '<div id="divtop"><p5>Autor: </p5><p6>' .$row["author"]. '</p6>,&nbsp;<p5>Publicado: </p5><p6>' .$row["datetime"]. '</p6></div>';
          echo '<div id="divmessage"><p7>Título: </p7><p8>' . $row["title"]. '</p8><br><p7>Mensaje: </p7><p8>' . $row["message"]. '</p8></div>';

                $rowmessage = $row["message"];

            ?>

              <form action="deletemp.php" method="POST">
                <input type="hidden" name="rowidvarmp" value="<?php echo '' .$rowmessage ?>" />
                  <input type="submit" class="button-header" value="Eliminar"/>
              </form>

          </div>

          <?php }?>

        </div>

    <?php

      /*$conn->close();*/
    }else
    {
     echo "Debes de loguearte para ver el contenido del sitio.";
     echo '<meta http-equiv="Refresh" content="2;url=index.php">';
    }
    ?>

  </body>
	</body>
</html>
