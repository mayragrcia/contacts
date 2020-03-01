<?php
   require_once("config.php");

   $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
   if ($mysqli->connect_errno) {
       die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
   } else {
      //echo $mysqli->host_info . "\n";
   }
?>
