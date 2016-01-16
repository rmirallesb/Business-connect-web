<?php
    session_start();
        @$conexion=mysql_connect("localhost","root","mysql") or die ("No
        se pudo conectar con el servidor");
        mysql_select_db("bcdb",$conexion) or die
        ("No se pudo seleccionar la BBDD");
    $user = $_POST['user'];
    $encryptionpass = $_POST['password'];
    $password = sha1(md5($encryptionpass));
    $query = "SELECT * FROM users WHERE user = '".$user."' AND password = '".$password."';";
    $resultado = mysql_query($query);
    if (mysql_num_rows($resultado) == 1){
        $fila = mysql_fetch_array($resultado);
                $usuario = $fila['user'];
                $_SESSION['userweb'] = $usuario;
        echo '<meta http-equiv="Refresh" content="0;url=main.php">';
    }else{
      echo '<meta http-equiv="Refresh" content="2;url=index.php">';
      ?>
      <script>
        alert("Login incorrecto");
      </script>
      <?php
    }
?>
