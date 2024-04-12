<?php
   $dbConn = new mysqli('localhost', 'unn_w20010687', 'Th3Cak31sAL13', 'unn_w20010687');

   if ($dbConn->connect_error) {
      echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
      exit;
   }
?>
