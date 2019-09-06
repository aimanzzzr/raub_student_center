<?php
  session_start();
  include("./php/dbconn.php");
  include("php/checksession.php");
  if(isset($_SESSION['userSession'])){
    $sql = "UPDATE useracc SET userSession = '' WHERE userID = '$userID'";
    $query = mysqli_query($dbconn,$sql);
  }else if(isset($_SESSION['adminSession'])){
    $sql = "UPDATE admin SET adminSession = '' WHERE adminID = '$adminID'";
    $query = mysqli_query($dbconn,$sql);
  }
  mysqli_close($dbconn);
  session_unset();
  session_destroy();
  header('Location:index.html');
?>
