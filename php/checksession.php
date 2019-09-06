<?php
  include('dbconn.php');
  session_start();
  $userID = null;
  $adminID = null;
  if(isset($_SESSION['userSession'])){
    //GET SESSION INFO
    $userSession = $_SESSION['userSession'];
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("SELECT * FROM useracc WHERE userSession = ?");
    $sql->bind_param('s',$userSession);
    $sql->execute();
    $result = $sql->get_result();
    if($result->num_rows === 0){
      $sql->close();
      header("Location:../index.html");
    }else{
      $data = $result->fetch_assoc();
      $userID = $data['userID'];
      $sql->close();
    }
  }else if(isset($_SESSION['adminSession'])){
    //GET SESSION INFO
    $adminSession = $_SESSION['adminSession'];
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("SELECT * FROM admin WHERE adminSession = ?");
    $sql->bind_param('s',$adminSession);
    $sql->execute();
    $result = $sql->get_result();
    if($result->num_rows===0){
      $sql->close();
      header("Location:../index.html");
    }else{
      $data = $result->fetch_assoc();
      $adminID = $data['adminID'];
      $sql->close();
    }
  }else{
    header("Location:../index.html");
  }
?>
