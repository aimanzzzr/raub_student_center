<?php
  include('php/dbconn.php');
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($dbconn,$_POST['adminusername']);
    $password = password_hash($_POST['adminpassword'],PASSWORD_DEFAULT);
    $phonenum = mysqli_real_escape_string($dbconn,$_POST['adminphonenum']);
    $adminemail = mysqli_real_escape_string($dbconn,$_POST['adminemail']);

    //PREPARE STATEMENT
    $sql = $dbconn->prepare("INSERT INTO admin(adminUserName,adminPassword,adminPhoneNum,adminEmail)VALUES(?,?,?,?)");
    $sql->bind_param("ssss",$username,$password,$phonenum,$adminemail);
    $sql->execute();
    $sql->close();
  }
?>
