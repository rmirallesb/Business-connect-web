<?php
session_start();
$_SESSION["userweb"]=$usuario;
unset($_SESSION["userweb"]);
echo '<meta http-equiv="Refresh" content="0;url=index.php">';
?>
