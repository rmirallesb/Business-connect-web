<?php
  require("mainmp.php");

  $delmp = $_POST['rowidvarmp'];

  $i=1;

  if($i=1){
    mysql_query("DELETE FROM Privatemessages WHERE message = '".$delmp."';");
      $i+=1;
  };

  echo '<meta http-equiv="Refresh" content="2;url=mainmp.php">';
?>
