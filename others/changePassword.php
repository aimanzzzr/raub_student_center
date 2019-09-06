<?php
  include("../php/dbconn.php");
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($dbconn,$_POST['username']);
    $password = mysqli_real_escape_string($dbconn,$_POST['password']);
    $confirmp = mysqli_real_escape_string($dbconn,$_POST['confirmpassword']);

    $sql = $dbconn->prepare("SELECT * FROM useracc WHERE userName = ?");
    $sql->bind_param("s",$username);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->num_rows;
    if($row==0){
      header("Location:forgot-password.html");
    }else{
      $dataUser = $result->fetch_assoc();
      if($password = $confirmp){
        $newpassword = password_hash($password,PASSWORD_DEFAULT);
        $sql = $dbconn->prepare("UPDATE useracc SET userPassword = ? WHERE userID = ?");
        $sql->bind_param("ss",$newpassword,$dataUser['userID']);
        $sql->execute();
        $sql->close();
      }
    }
  }
?>
