<?php
conectarBanco ();
function conectarBanco(){
    $severname = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "login";
    $port = 3307;
    $conn = new mysqli($severname,$username,$password,$dbname,$port);
    if($conn->connect_error){
        die ("Conexão falhou" . $conn->connect_error);
    }
  $conn->set_charset("utf8");
  return $conn;

}