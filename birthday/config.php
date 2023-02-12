<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "birthday_crom_job";

try{
  $conn = new mysqli($host, $user, $pass, $dbname);
}catch(Exception $e){
  $e->getMessage();
  $e->getFile();
  $e->getLine();
}

?>