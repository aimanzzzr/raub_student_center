<?php
  include('../php/dbconn.php');
  if(isset($_POST['submit'])){
    $studentnum = mysqli_real_escape_string($dbconn,$_POST['studentnumber']);
    $username = mysqli_real_escape_string($dbconn,$_POST['username']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $userbio = mysqli_real_escape_string($dbconn,$_POST['userbio']);
    $interest = mysqli_real_escape_string($dbconn,$_POST['interest']);
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("SELECT studentID FROM student WHERE studentNumber = ?");
    $sql->bind_param("s",$studentnum);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->num_rows;
    $sql->close();
    if($row==0){
      echo "UNSUCCESSFUL!";
      header("location:registerUser.php");
    }else{
      $dataStudent = $result->fetch_assoc();
      //PREPARED STATEMENT
      $sql = $dbconn->prepare("INSERT INTO useracc(userName,userPassword,userBio,userInterest,studentID)VALUES(?,?,?,?,?)");
      $sql->bind_param("sssss",$username,$password,$userbio,$interest,$dataStudent['studentID']);
      $sql->execute();
      header("Location:registerUser.php");
    }

  }
?>
