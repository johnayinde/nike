<?php
// $servername = "216.117.152.174";
//   $username = "khsuser";
//   $password = "khs20170711";
//   $dbname = "khsenuguorg";
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "djconsul_site";
  
  //create connection
  //$connect = new mysqli($servername, $username, $password, $dbname);
  
  //check connection
  // if ($connect->connect_error){
  //   die("connection failed: " . $connect->connect_error);
  // }

    $connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
  echo "Connection failed";
}
 
?>