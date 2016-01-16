<?php
  require("main.php");

  $deltext = $_POST['rowidvar'];

  $i=1;

  if($i=1){
    mysql_query("DELETE FROM Texts WHERE id = '".$deltext."';");
      $i+=1;
  };

  echo '<meta http-equiv="Refresh" content="2;url=main.php">';
?>
