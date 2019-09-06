<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "studentcenter";

  $dbcon = mysqli_connect($host,$username,$password,$dbname);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  try{
    $dbconn = new mysqli($host,$username,$password,$dbname);
  }catch(Exception $e){
    error_log($e->getMessage());
    //should be a message a typical user could understand
    exit('Error connecting to database');
    header("Refresh:2;../others/404.html");
  }
?>
