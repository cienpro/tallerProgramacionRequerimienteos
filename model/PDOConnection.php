<?php

class PDOConnection 
{

  function getConnection(){
    $host = "localhost";
    $db = "tallerProgramacion";
    $user = "root";
    $password = "";
    $connection = new PDO("mysql:host=$host;dbname=$db;",$user,$password);
    return $connection;
  }
}

?>
