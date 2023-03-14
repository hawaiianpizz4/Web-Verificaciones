<?php
include("/var/www/html/ventaspdv/formVivienda/Control/connection.php");
  $query1=$dbconn->prepare("SELECT * FROM images");
  $query1->execute();
  $data1=$query1->fetchAll();
?>