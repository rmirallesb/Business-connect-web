<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/favicon.png"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/w3.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Business Connect</title>
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

      $query1 = "SELECT U.business_title FROM Users U WHERE U.user = '".$usuario."';";
      $result1 = mysql_query($query1);

      $row1 = mysql_fetch_array($result1);
        $business = $row1['business_title'];

      $query2 = "SELECT T.id, T.text, T.user, T.business_title, T.datetime FROM Texts T WHERE T.business_title = '".$business."' ORDER BY T.datetime DESC;";
      $result2 = $conn->query($query2);

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

            echo '<div id="divbtitle1"><p3>Negocio: </p3><p4>' .$row1["business_title"]. '</p4></div>';

            while($row = $result2->fetch_assoc()) {

          ?>

          <div id="messagebox" class="w3-row-padding">

          <?php

                echo '<div id="divtop"><p5>Autor: </p5><p6>' .$row["user"]. '</p6>,&nbsp;<p5>Publicado: </p5><p6>' .$row["datetime"]. '</p6></div>';
                echo '<div id="divmessage"><p9>' . $row["text"]. '</p9></div>';

              if($row["user"] == $usuario){
                $rowid = $row["id"];

          ?>

              <form action="deletequery.php" method="POST">
                  <input type="hidden" name="rowidvar" value="<?php echo '' .$rowid ?>" />
                  <input type="submit" class="button-header" value="Eliminar"/>
              </form>

              <?php
              }
              ?>

          </div>

          <?php }?>

        </div>

    <?php

      }else{
       echo "Debes de loguearte para ver el contenido del sitio.";
       echo '<meta http-equiv="Refresh" content="2;url=index.php">';
      }

    ?>

  </body>

	</body>

  <footer>

  </footer>

</html>
